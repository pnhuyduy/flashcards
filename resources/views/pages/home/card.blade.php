<div class="col-sm-6 col-md-3 col-lg-3 d-flex align-items-stretch mb-4">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{ $deck->name }}</h5>
      <p class="card-text">{{ $deck->description }}</p>
      <a href="{{ route('decks.show-a-deck', $deck->id )}}" class="stretched-link"></a>
    </div>
  </div>
</div>
