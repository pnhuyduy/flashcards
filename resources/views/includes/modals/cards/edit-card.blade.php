<div class="modal fade" id="editCard" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('cards.update-a-card')}}" method="POST">
        <div class="modal-body">
          @csrf
          <input type="hidden" id="card_id" name="card_id" value="">
          <div class="form-group mb-3">
            <label class="small font-weight-bold">Enter front card</label>
            <textarea class="form-control" id="frontCard" name="front_card" placeholder="e.g &quot;What is the difference between mutable and immutable objects?&quot;"></textarea>
          </div>
          <div class="form-group mb-3">
            <label class="small font-weight-bold">Enter back card</label>
            <textarea class="form-control" id="backCard" name="back_card" rows="4" placeholder="e.g &quot;A mutable object can be changed after it's created, while an immutable object cannot be changed.&quot;" value=""></textarea>
          </div>
          <button type="submit" class="btn btn-success btn-block w-100">Update Card</button>
        </div>

      </form>


    </div>
  </div>
</div>
