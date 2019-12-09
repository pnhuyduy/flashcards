<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Deck;

class ProfileController extends Controller
{
    public function __construct()
    {
      $this->middleware('web');
    }

    function showOverview($username) {
      $user = User::username($username)->firstOrFail();

      return view('users.overview', compact('user'));
    }

    function showDecks($username) {
      $user = User::username($username)->firstOrFail();
      $decks = $user->decks;

      return view('users.decks', compact('user', 'decks'));
    }

    function showPinnedDecks($username) {
      $user = User::username($username)->firstOrFail();

      return view('users.pinned-decks', compact('user'));
    }

    public function edit($username)
    {
      $user = User::username($username)->firstOrFail();
      if (Auth::check()) {
        if (Auth::user()->id == $user->id) {

          return view('users.edit-profile', compact('user'));
        } else {

          return redirect()->route('user.decks', ['username' => Auth::user()->username])->with('error', 'You are not authorized!');
        }
      } else {

        return redirect()->route('login');
      }



    }

    public function update(Request $request)
    {
      $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
      ]);

      $user = User::findOrFail($request->id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();
      $user->touch();

      return redirect()->route('user.decks', ['username' => Auth::user()->username])->with('status', 'Profile updated!');
    }
}
