@extends('layouts.default')

@section('title', 'Edit deck')

@section('content')
  <div class="container-fluid bg-light">
    <div class="container container-narrow py-3">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
      <form method="POST" action="{{ route('decks.update-a-deck', ['id' => $deck->id ]) }}">
        @csrf

        <div class="form-group mb-3">
          <label class="small font-weight-bold">Deck name</label>
          <input type="text" class="form-control @error('deck_name') is-invalid @enderror" id="deck-name" name="deck_name" value="{{ $deck->name }}" placeholder="e.g &quot;JavaScript fundamentals&quot;">

          @error('deck_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group mb-3">
          <label class="small font-weight-bold">Deck description <span class="text-muted">(Optional)</span></label>
          <textarea type="text" class="form-control @error('deck_description') is-invalid @enderror" id="deck-description" name="deck_description" rows="4" placeholder="e.g &quot;A collection of basic JavaScript&quot;" value="">{{ $deck->description }}</textarea>

          @error('deck_description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="statusPublic" name="status" class="custom-control-input" @if ($deck->status == 'Public') ? checked : '' @endif value="Public">
              <label class="custom-control-label" for="statusPublic">Public</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="statusPrivate" name="status" class="custom-control-input" @if ($deck->status == 'Private') ? checked : '' @endif value="Private">
                <label class="custom-control-label" for="statusPrivate">Private</label>
              </div>
              @error('status')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <button type="submit" class="btn btn-success py-2 w-25">Update description</button>
          </form>
        </div>
      </div>

      <div class="container container-narrow pt-2">
        <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#addCard" data-deckid="{{ $deck->id }}" ><i class="fas fa-plus"></i> Add a Card</button>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Front</th>
              <th scope="col">Back</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($deck->cards as $card)
              <tr>
                <td class="">{{ $card->front }}</td>
                <td class="">{{ $card->back }}</td>
                <td class="w-25">
                  <button class="btn btn-info" data-toggle="modal" data-target="#editCard" data-cardid="{{ $card->id }}" data-frontcard="{{ $card->front }}" data-backcard="{{ $card->back }}"><i class="fas fa-pencil-alt"></i> Edit</button>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#deleteCard" data-cardid="{{ $card->id }}"><i class="fas fa-trash"></i> Delete</button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        @include('includes.modals.cards.add-new-card')
        @include('includes.modals.cards.edit-card')
        @include('includes.modals.cards.delete-card')

      @endsection

      @section('scripts')
        <script type="text/javascript">
        $(document).ready(function () {
          $('#addCard').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var deck_id = button.data('deckid')
            var modal = $(this)

            modal.find('.modal-body #deck_id').val(deck_id);
          });

          $('#editCard').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var card_id = button.data('cardid')
            var front_card = button.data('frontcard')
            var back_card = button.data('backcard')
            var modal = $(this)

            modal.find('.modal-body #card_id').val(card_id);
            modal.find('.modal-body #frontCard').val(front_card);
            modal.find('.modal-body #backCard').val(back_card);
          });

          $('#deleteCard').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var card_id = button.data('cardid')
            var modal = $(this)

            modal.find('.modal-body #card_id').val(card_id);
          });
        });

        </script>

      @endsection
