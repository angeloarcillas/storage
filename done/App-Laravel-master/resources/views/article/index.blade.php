@extends('layouts.app')


@section('title', "Articles")

@section('content')
<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between">
    <p class="disabled">Articles</p>
    <a href="/articles/create" class="btn btn-primary active">Create Article</a>
  </li>

  @forelse ($articles as $article)
  <li class="list-group-item">
    <a href="{{ $article->path() }}">{{ $article->title }}</a>
  </li>
  
  @empty
  <p class="d-flex justify-content-center align-items-center">No associated Article</p>
  @endforelse
</ul>
@endsection