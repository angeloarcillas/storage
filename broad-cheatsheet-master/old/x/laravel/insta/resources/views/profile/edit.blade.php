@extends('layouts.app')

@section('content')
  @include('errors.error')
<div class="container">
    <form class="" action="/profile/{{ $profile->id }}" method="post" enctype="multipart/form-data">
      @method('PATCH')
      @csrf

      <div class="form-group">
        <label>Title:</label>
        <input type="text" name="title" value="{{ $profile->title }}" class="form-control">
      </div>
      <div class="form-group">
        <label>Description:</label>
        <input type="text" name="description" value="{{ $profile->description }}" class="form-control">
      </div>
      <div class="form-group">
        <label>URL:</label>
        <input type="text" name="url" value="{{ $profile->url }}" class="form-control">
      </div>
      <div class="form-group">
        <label>Image:</label>
        <input class="px-5 py-2 border border-dark d-block" type="file" name="profile_img">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Save</button>
      </div>
    </form>
</div>
@endsection
