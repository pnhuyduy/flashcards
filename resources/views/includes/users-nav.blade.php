<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ Route::is('user.overview') ? 'active' : '' }}" href="{{ route('user.overview', ['user' => $user->username]) }}">Overview</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Route::is('user.decks') ? 'active' : '' }}" href="{{ route('user.decks', ['user' => $user->username]) }}">Decks</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Route::is('user.pinned-decks') ? 'active' : '' }}" href="{{ route('user.pinned-decks', ['user' => $user->username]) }}">Pinned</a>
  </li>
</ul>
