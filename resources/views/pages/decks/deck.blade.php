@extends('layouts.default')

@section('title', $deck->name)

@section('content')
  <div class="container-fluid bg-light">
    <div class="container container-narrow py-3">
      <h2>{{ $deck->name }}</h2>
      <p>
        {{ $deck->description }}
      </p>
      @auth
        <a href="#" class="btn btn-dark"><i class="fas fa-thumbtack"></i> Pinned</a>
        @if ($deck->user_id == auth::user()->id)
          <a href="{{ route('decks.edit-a-deck', ['id' => $deck->id]) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
        @endif
      @endauth
    </div>
  </div>

  <div class="container container-narrow pt-2 learning-section">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Study</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Cards ({{ $deck->cards->count() }})</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="cards-section py-4">
          @foreach ($deck->cards as $card)
            <div class="card-row pt-2">
              <div class="card card-bg">
                <div class="card-body">
                  <div class="row w-100">
                    <div class="col-md-6">
                      <p class="font-weight-bold">{{ $card->front }}</p>
                    </div>
                    <div class="col-0 col-md-6">
                      <p>{{ $card->back }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  @endsection
