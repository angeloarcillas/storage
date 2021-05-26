@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

      <div class="col-6 border border-dark">
        <img src="/storage/{{ $post->image }}"
        alt="" width="100%" height="100%" class="">
      </div>

      <div class="col-1"></div>

      <div class="col">
        <h2><a href="/profile/{{ $post->user->profile->id }}">{{ $post->user->profile->title }}</a> </h2>
        <p>{{ $post->caption }}</p>
      </div>
      
    </div>
  </div>
@endsection
