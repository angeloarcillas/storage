@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="/storage/{{ $profile->profile_img ?? '/uploads/default.jpg'}}" alt="profile image" width="100%" height="100%" class="rounded-circle w-100">
        </div>
        <div class="col ml-5">
            <div class="row justify-content-between">
                <h2 class="mb-0">{{ $profile->title ?? '' }}

                  <follow-button class="d-inline" user-id="{{ $profile->id }}" follows="{{ $follows }}"></follow-button>
                </h2>
                {{-- policy-method, user --}}
                @can ('update', $profile)

                <a href="/post/create">Add New Post</a>
                @endcan
            </div>
            @can ('update', $profile)
            <div class="row mb-2">
              <a href="/profile/{{ $profile->id }}/edit">Edit Profile</a>
            </div>
            @endcan
            <div class="row">
                <span><strong>{{ $postCount }}</strong> post </span>
                <span class="mx-2"><strong>{{ $followersCount }}</strong> followers </span>
                <span><strong>{{ $followingCount }}</strong> following </span>
            </div>
            <div class="row">
                <p class="mb-0 mt-3"><strong>{{$profile->user->email}}</strong> </p>
            </div>
            <div class="row">
                <p class="my-0">{{ $profile->description ?? '' }}</p>
            </div>
            <div class="row">
                <a href="{{ $profile->url ?? ''}}">{{ $profile->url ?? ''}}</a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="btn-group mx-auto">
            <a class="border-top border-dark btn-sm py-2 px-5 mr-3" href="#post">Post</a>
            <a class="btn btn-outline-info btn-sm py-2 px-5" href="#tagged">Tagged</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-10 d-flex justify-content-around flex-wrap">
                @foreach ($profile->user->posts as $post)
                <a href="/post/{{ $post->id }}">
                    <div class="border border-success m-2" style="max-width:200px;">
                        <img src="  /storage/{{ $post->image }}" alt="post image" width="100%" height="80%">
                        <p class="text-center">{{$post->caption }}</p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col">

            </div>
        </div>
    </div>

</div>
@endsection
