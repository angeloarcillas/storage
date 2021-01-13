@extends('../main')

@section('title','Contact')

@section('content')
    <h2>Contact</h2>
        @if (session('fail'))
        <div class="alert alert-danger" role="alert">
            {{ session('fail') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
@endsection

