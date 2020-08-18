@extends('layouts.app')

@section('content')
@include('errors.error')
<div class="container">
    <form class="" action="/post" method="post" enctype="multipart/form-data">
        @csrf
        <label>Image:</label>
        <br>
        <input type="file" name="image" autofocus>
        <br>
        <label>Caption:</label>
        <input type="text" name="caption" class="form-control">
        <button type="submit" class="btn btn-primary my-2 px-5">Post</button>
    </form>
</div>
@endsection
