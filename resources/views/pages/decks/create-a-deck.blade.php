@extends('layouts.default')

@section('title', 'Add deck')

@section('content')
  <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="py-4 text-center">
              <h2>Create a new deck</h2>
            </div>
            <form method="POST" action="{{ route('decks.store-a-deck') }}">
              @csrf

              <div class="form-group mb-3">
                <label class="small font-weight-bold">Enter a deck name</label>
                <input type="text" class="form-control @error('deck_name') is-invalid @enderror" id="deck-name" name="deck_name" placeholder="e.g &quot;JavaScript fundamentals&quot;">

                @error('deck_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group mb-3">
                <label class="small font-weight-bold">Enter a deck description <span class="text-muted">(Optional)</span></label>
                <textarea type="text" class="form-control @error('deck_description') is-invalid @enderror" id="deck-description" name="deck_description" rows="4" placeholder="e.g &quot;A collection of basic JavaScript&quot;" value=""></textarea>

                @error('deck_description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="statusPublic" name="status" class="custom-control-input @error('status') is-invalid @enderror" value="{{ old('status', 'Public') }}" required="required">
                  <label class="custom-control-label" for="statusPublic">Public</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="statusPrivate" name="status" class="custom-control-input @error('status') is-invalid @enderror" value="{{ old('status', 'Private') }}" required="required">
                  <label class="custom-control-label" for="statusPrivate">Private</label>
                </div>
                @error('status')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary btn-block py-2 w-100">Create Deck</button>
            </form>
          </div>
        </div>
      </div>
@endsection
