<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
/*
|--------------------------------------------------------------------------
| FRONT END
|--------------------------------------------------------------------------
*/

/*
User routes
*/

Route::get('/avatar/{username}', 'ProfileController@avatar')->name('avatar');

Route::group([
  'prefix' => '/{user}',
  'as' => 'user.'
], function () {

  Route::get('/overview', 'ProfileController@showOverview')->name('overview');
  Route::get('/decks', 'ProfileController@showDecks')->name('decks');
  Route::get('/pinned', 'ProfileController@showPinnedDecks')->name('pinned-decks');
  Route::get('/edit', 'ProfileController@edit')->middleware('auth')->name('edit');
  Route::post('/update', 'ProfileController@update')->middleware('auth')->name('update');


});

/*
Decks routes
*/

Route::group([
  'prefix' => '/deck',
  'as' => 'decks.',
  'middleware' => 'web',
], function () {

  Route::get('/new', 'Deck\DeckController@create')->middleware('auth')->name('create-a-deck');
  Route::post('/new', 'Deck\DeckController@store')->middleware('auth')->name('store-a-deck');
  Route::get('/edit/{id}', 'Deck\DeckController@edit')->name('edit-a-deck');
  Route::post('/edit/{id}', 'Deck\DeckController@update')->middleware('auth')->name('update-a-deck');
  Route::delete('/delete', 'Deck\DeckController@destroy')->middleware('auth')->name('delete-a-deck');
  Route::get('/{id}', 'Deck\DeckController@show')->name('show-a-deck');

});

/*
Decks routes
*/

Route::group([
  'as' => 'cards.',
  'middleware' => 'auth',
], function () {

  Route::post('/new', 'Card\CardController@store')->name('store-a-card');
  Route::post('/update', 'Card\CardController@update')->name('update-a-card');
  Route::delete('/delete', 'Card\CardController@destroy')->name('delete-a-card');
});
