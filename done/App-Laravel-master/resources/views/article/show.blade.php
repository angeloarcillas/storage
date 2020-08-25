@extends('layouts.app')


@section('title', $article->title)

@section('content')
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col">
            <h2 class="card-title">{{ $article->title }}</h2>
          {{-- <h5>{{ $article->excerpt }}</h5> --}}
          </div>
          <div class="col-2">
            <a href="/articles" class="btn btn-outline-primary px-5">Articles</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <p>{{ $article->body }}</p>
      </div>

      @foreach ($article->tags as $tag)
      <a href="/articles?tag={{$tag->name}}">{{$tag->name}}</a>
      @endforeach

      <div class="card-footer">
        <div class="d-flex justify-content-end">
          <a href="{{ $article->path() }}/edit" class="btn btn-primary">Edit</a>

          <form action="/articles/{{ $article->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger ml-2">Delete</button>
          </form>
        </div>
      </div>
</div>
@endsection