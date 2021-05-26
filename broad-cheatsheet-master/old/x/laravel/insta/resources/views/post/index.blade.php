@extends('layouts.app')

@section('content')
<div class="container mx-5">
    <div class="d-flex">

        @foreach ($posts as $post)
        <a href="/post/{{ $post->id }}">
            <div class="border border-success m-2" style="max-width:200px;">
                <img src="  /storage/{{ $post->image }}" alt="post image" width="100%" height="80%">
                <p class="text-center">{{$post->caption }}</p>
            </div>
        </a>
        @endforeach
        
    </div>
    {{ $posts->links() }}
</div>
@endsection
