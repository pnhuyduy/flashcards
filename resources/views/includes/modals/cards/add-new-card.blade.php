<div class="modal fade" id="addCard" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a new card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('cards.store-a-card')}}" method="POST">
        <div class="modal-body">
          @csrf
          <input type="hidden" id="deck_id" name="deck_id" value="">
          <div class="form-group mb-3">
            <label class="small font-weight-bold">Enter front card</label>
            <textarea class="form-control" id="frontCard" name="front_card" placeholder="e.g &quot;What is the difference between mutable and immutable objects?&quot;" required="required"></textarea>
          </div>
          <div class="form-group mb-3">
            <label class="small font-weight-bold">Enter back card</label>
            <textarea class="form-control" id="backCard" name="back_card" rows="4" placeholder="e.g &quot;A mutable object can be changed after it's created, while an immutable object cannot be changed.&quot;" required="required"></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-block w-100">Create Card</button>
        </div>

      </form>


    </div>
  </div>
</div>
