@extends('main')

@section('content')
    <h2>Welcome</h2>
    {{-- isset() --}}
    @isset($post)
    {{ $post }}
    @endisset

    {{-- get request path --}}
{{ Request::path() }}
@endsection