@extends('layouts.default')

@section('title', 'Decks')

@section('content')
  @include('includes.profile')

  <div class="content pt-2">
    <div class="container">
      @include('includes.users-nav')
      <div class="d-flex justify-content-between align-items-center pt-4">

        <h5 class="mx-1">Decks</h5>
        @auth
          @if (Auth::user()->id == $user->id)
            <a href="{{ route('decks.create-a-deck') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add deck</a>
          @endif
        @endauth

      </div>
      <hr class="mt-1 mb-4">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger" role="alert">
          {{ session('error') }}
        </div>
      @endif
      <div class="row">
        @foreach ($decks as $deck)
          <div class="col-sm-6 col-md-3 col-lg-3 d-flex align-items-stretch mb-4">
            <div class="card shadow-sm" style="width: 100%">
              <a href="{{ route('decks.show-a-deck', ['id' => $deck->id ])}}" class="card-link text-dark">
                <div class="card-header">
                  @if ($deck->status == 'Public')
                    <h5><i class="fas fa-eye"></i> Public</h5>
                  @else
                    <h5><i class="fas fa-eye-slash"></i> Private</h5>
                  @endif
                </div>
                <div class="card-body">
                  <h3 class="card-title text-info">{{ $deck->name }}</h3>
                </div>
              </a>
              @guest
                <div class="card-footer">
                  <div class="float-left">
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              @endguest

              @auth
                @if (Auth::user()->id == $user->id)
                  <div class="card-footer">
                    <div class="float-right">
                      <div class="status">

                      </div>
                      <a href="{{ route('decks.edit-a-deck', ['id' => $deck->id ]) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i> Edit</a>
                      <button type="submit" class="btn btn-sm btn-danger" data-deckid="{{ $deck->id }}" data-toggle="modal" data-target="#deleteDeck"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                  </div>
                @endif
              @endauth

            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  @include('includes.modals.decks.delete-deck')

@endsection

@section('scripts')
  <script type="text/javascript">
  $(document).ready(function () {
    $('#deleteDeck').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var deck_id = button.data('deckid')
      var modal = $(this)
      modal.find('.modal-body #deck_id').val(deck_id);
    })
  });

  </script>

@endsection
