@extends('layouts.app')

@section('title', 'Create Article')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Create Article</div>
      </div>
      <div class="card-body">

        <form action="/articles" method="POST">
          @csrf
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
              value="{{ old('title') }}">

            @error('title')
            <p class="invalid-feedback"> {{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" cols="20"
              rows="5">{{ old('body') }}</textarea>

            @error('body')
            <p class="invalid-feedback"> {{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label>Tags</label>
            <select name="tags[]" multiple class="custom-select">

              @foreach ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
            </select>

            @error('tags')
            <p class="invalid-feedback"> {{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection