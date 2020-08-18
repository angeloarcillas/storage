@extends('layouts.app')


@section('title', $article->title)

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Edit Article</div>
      </div>
        <div class="card-body">
          <form action="{{ $article->path() }}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-group">
              <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}">
            </div>

            <div class="form-group">
              <label>Body</label>
                <textarea name="body" class="form-control" rows="5">{{ $article->body }}</textarea>
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