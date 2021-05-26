@extends('../main')
@section('title','show')
    
@section('content')

    <h2>Article</h2>
    <hr>

    <h3>{{ $project->title }}</h3>
    <p>{{ $project->description }}</p>

    @can('view', $project)
    <a href="/project/{{ $project->id }}/edit">Edit</a>
    @endcan

    @if ($project->tasks->count())
    <div>
        @foreach ($project->tasks as $task)

        <form action="/complete-task/{{ $task->id }}" method="post" class="mt-3">
            @if ($task->completed)
            @method('DELETE')
            @endif

            @csrf

            <label><input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>{{ $task->description }}</label>
        </form>

        @endforeach
    </div>
    @endif
    <hr>

    <h2>New Task:</h2>

    <form action="/project/{{ $project->id }}/task" method="POST">
    @csrf
    
    <div class="form-group">
    <input class="form-control" type="text" name="description">
    </div>
   
    <button class="btn btn-primary" type="submit">Submit</button>

        </form>

   @include('includes/error')
@endsection