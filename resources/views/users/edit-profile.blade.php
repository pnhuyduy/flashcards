@extends('layouts.default')

@section('title', 'Edit profile')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="py-4 text-center">
            <h2>Edit profile</h2>
          </div>
          <form action="{{ route('user.update', $user->username) }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="form-group">
              <label class="font-weight-bold" for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$user->name}}" required="required" autofocus="autofocus" autocomplete="name" placeholder="Enter name">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label class="font-weight-bold" for="name">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{$user->username}}" required="required" autocomplete="username" placeholder="Enter Username">
              @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label class="font-weight-bold" for="name">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$user->email}}"required="required" autocomplete="email" placeholder="Enter Email Address">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-outline-primary font-weight-bold btn-block">Update profile</button>
          </form>
        </div>
      </div>
    </div>
@endsection
