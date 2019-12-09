<?php

namespace App\Http\Controllers\Card;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Card;

class CardController extends Controller
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
        //
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
          'front_card' => 'required|max:255',
          'back_card' => 'required|max:255',
        ]);

        $newCard = new Card;
        $newCard->front = $request->front_card;
        $newCard->back = $request->back_card;
        $newCard->deck()->associate($request->deck_id);
        $newCard->user()->associate(Auth::user());

        $newCard->save();

        return back()->with('status', 'Card added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
          'front_card' => 'required|max:255',
          'back_card' => 'required|max:255',
        ]);

        $card = Card::find($request->card_id);
        $card->front = $request->front_card;
        $card->back = $request->back_card;

        $card->save();
        $card->touch();

        return back()->with('status', 'Card updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $card = Card::findOrFail($request->card_id);
        if (Auth::check()) {
          if (Auth::user()->id == $card->user_id) {

            $card->delete();
            return back()->with('status', 'Card deleted!');
          } else {

            return back()->with('error', 'You are not authorized!');
          }
        } else {

          return redirect()->route('login');
        }
    }
}
