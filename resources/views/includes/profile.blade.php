<div class="profile">
  <div class="container-fluid bg-light">
    <div class="container d-flex align-items-center py-3">
      <div class="profile-image rounded position-relative">
        <img class="profile-image rounded" src="{{ Avatar::create($user->name)->toBase64() }}" alt="">
      </div>
      <div class="ml-3">
        <h2 class="m-0">{{ $user->name }}</h2>
        <h6 class="text-muted">{{ '@' . $user->username }}</h6>
        @auth
          @if (Auth::user()->id == $user->id)
            <a href="{{ route('user.edit', $user->username) }}" class="btn btn-sm btn-outline-dark">EDIT PROFILE</a>
          @endif
        @endauth
      </div>
    </div>
  </div>
</div>
