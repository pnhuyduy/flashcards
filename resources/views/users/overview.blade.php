@extends('layouts.default')

@section('title', 'Overview')

@section('content')
  @include('includes.profile')

  <div class="content pt-2">
    <div class="container">
      @include('includes.users-nav')
    </div>
  </div>
@endsection
