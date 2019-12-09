<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deck;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $recentDecks = Deck::status(DECK::STATUS_PUBLIC)
                    ->orderBy('created_at', 'desc')
                    ->take(4)
                    ->get();

      return view('pages.home.index', compact('recentDecks'));
    }
}
