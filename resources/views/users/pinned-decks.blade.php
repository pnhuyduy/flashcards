@extends('layouts.default')

@section('title', 'Decks')

@section('content')
  @include('includes.profile')

  <div class="content pt-2">
    <div class="container">
      @include('includes.users-nav')
      <div class="d-flex justify-content-between align-items-center pt-4">
        <h5 class="mx-1">Decks</h5>
        <a href="create-deck.html" class="btn btn-primary"><i class="fas fa-plus"></i> Add deck</a>
      </div>
      <hr class="mt-1 mb-4">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="card shadow-sm" style="width: 100%">
            <div class="card-body">
              <a href="deck.html" class="card-link text-dark">
                <h3 class="card-title text-info">Deck name</h3>
                <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </a>
            </div>
            <div class="card-footer">
              <a href=""><span class="badge badge-dark"><i class="fas fa-thumbtack"></i> Pinned</span></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="card shadow-sm" style="width: 100%">
            <div class="card-body">
              <a href="deck.html" class="card-link text-dark">
                <h3 class="card-title text-info">Deck name</h3>
                <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </a>
            </div>
            <div class="card-footer">
              <a href=""><span class="badge badge-dark"><i class="fas fa-thumbtack"></i> Pinned</span></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="card shadow-sm" style="width: 100%">
            <div class="card-body">
              <a href="deck.html" class="card-link text-dark">
                <h3 class="card-title text-info">Deck name</h3>
                <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </a>
            </div>
            <div class="card-footer">
              <a href=""><span class="badge badge-dark"><i class="fas fa-thumbtack"></i> Pinned</span></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="card shadow-sm" style="width: 100%">
            <div class="card-body">
              <a href="deck.html" class="card-link text-dark">
                <h3 class="card-title text-info">Deck name</h3>
                <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </a>
            </div>
            <div class="card-footer">
              <a href=""><span class="badge badge-dark"><i class="fas fa-thumbtack"></i> Pinned</span></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="card shadow-sm" style="width: 100%">
            <div class="card-body">
              <a href="deck.html" class="card-link text-dark">
                <h3 class="card-title text-info">Deck name</h3>
                <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </a>
            </div>
            <div class="card-footer">
              <a href=""><span class="badge badge-dark"><i class="fas fa-thumbtack"></i> Pinned</span></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="card shadow-sm" style="width: 100%">
            <div class="card-body">
              <a href="deck.html" class="card-link text-dark">
                <h3 class="card-title text-info">Deck name</h3>
                <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </a>
            </div>
            <div class="card-footer">
              <a href=""><span class="badge badge-dark"><i class="fas fa-thumbtack"></i> Pinned</span></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="card shadow-sm" style="width: 100%">
            <div class="card-body">
              <a href="deck.html" class="card-link text-dark">
                <h3 class="card-title text-info">Deck name</h3>
                <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </a>
            </div>
            <div class="card-footer">
              <a href=""><span class="badge badge-dark"><i class="fas fa-thumbtack"></i> Pinned</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
