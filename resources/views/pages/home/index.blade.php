@extends('layouts.default')

@section('title', 'Home')

@section('content')
<div class="container px-5">
  <div class="mt-5">
    <div class="d-flex justify-content-between align-items-end">
      <h5 class="text-uppercase">Recently Decks</h5>
      <a href="" class="text-dark text-underline">See all</a>
    </div>
    <div class="row mt-3">
      @foreach ($recentDecks as $deck)
        @include('pages.home.card')
      @endforeach
    </div>
  </div>
</div>
@endsection
