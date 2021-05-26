@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Home</h2>
    <a href="/profile/{{ auth()->user()->id }}">Profile</a>
    <a href="/post">post</a>
  </div>
@endsection
