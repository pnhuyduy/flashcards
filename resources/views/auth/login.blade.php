@extends('layouts.default')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="py-4 text-center">
          <h2>Login</h2>
        </div>
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group">
            <label class="font-weight-bold" for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}" required="required" autofocus="autofocus" autocomplete="username" placeholder="Enter Username">

            @error('username')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required="required" autocomplete="current-password" placeholder="Enter Password">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Remember Me</label>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
          @if (Route::has('password.request'))
            <div class="row py-2">
              <a href="#" class="btn btn-link">Forgot Your Password?</a>
            </div>
          @endif

        </form>
      </div>
    </div>
  </div>
@endsection
