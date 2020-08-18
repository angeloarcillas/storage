@extends('../main')
@section('title','Edit')

@section('content')

    <h2>Edit Project</h2>

    <form method="POST" action="/project/{{ $project->id }}">
        @method('PATCH')
        @csrf

        <div class="form-group">
                <input class="form-control" type="text" name="title" value="{{ $project->title }}"/>
        </div>

        <div class="form-group">
            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $project->description }}</textarea>
        </div>

        <button class="btn btn-primary" type="submit">Update</button>
    </form>

    <form action="/project/{{ $project->id }}" method="post">
        @method('DELETE')
        @csrf

        <button class="btn btn-danger" type="submit">Delete</button>
    </form>

    @include('includes/error')
@endsection