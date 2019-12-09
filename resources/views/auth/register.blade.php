@extends('layouts.default')

@section('content')
  <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="py-4 text-center">
              <h2>Register</h2>
            </div>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-group">
                <label class="font-weight-bold" for="name">Name</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required="required" autofocus autocomplete="name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required="required" autofocus="autofocus" autocomplete="username">

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="email">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" required="required" autofocus="autofocus" autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required="required" autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required="required" autocomplete="new-password">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
          </div>
        </div>
      </div>
@endsection
