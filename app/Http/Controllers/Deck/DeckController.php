<?php

namespace App\Http\Controllers\Deck;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Deck;

class DeckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.decks.create-a-deck');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'deck_name' => 'required|max:50',
        ]);

        $newDeck = new Deck;
        $newDeck->collection_id = '1';
        $newDeck->name = $request->deck_name;
        $newDeck->description = $request->deck_description;
        $newDeck->status = $request->status;
        $newDeck->user()->associate(Auth::user());

        $newDeck->save();

        return redirect()->route('user.decks', ['username' => Auth::user()->username])->with('status', 'Deck created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deck = Deck::findOrFail($id);
        if ($deck->status == DECK::STATUS_PUBLIC) {
          return view('pages.decks.deck', [
            'deck' => $deck,
          ]);
        } else {
          if (Auth::check()) {
            if ($deck->user_id == Auth::user()->id) {
              return view('pages.decks.deck', [
                'deck' => $deck,
              ]);
            }
          } else {

            return abort(404);
          }

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $deck = Deck::findOrFail($id);
      if (Auth::check()) {
        if (Auth::user()->id == $deck->user_id) {

          return view('pages.decks.edit-deck', compact('deck'));
        } else {

          return redirect()->route('user.decks', ['username' => Auth::user()->username])->with('error', 'You are not authorized!');
        }
      } else {

        return redirect()->route('login');
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validatedData = $request->validate([
        'deck_name' => 'required|max:255',
      ]);
      $deck = Deck::findOrFail($id);
      $deck->name = $request->deck_name;
      $deck->description = $request->deck_description;
      $deck->status = $request->status;

      $deck->save();
      $deck->touch();

      return back()->withInput()->with('status', 'Deck updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deck = Deck::findOrFail($request->deck_id);
        if (Auth::check()) {
          if (Auth::user()->id == $deck->user_id) {

            $deck->delete();
            return back()->with('status', 'Deck deleted!');
          } else {

            return back()->with('error', 'You are not authorized!');
          }
        } else {

          return redirect()->route('login');
        }


    }
}
