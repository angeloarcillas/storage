@extends('../main')

@section('title','Projects')

@section('content')
    <h2>Projects</h2>

    <ul>
    @foreach ($projects as $project)
        <li><a href="/project/{{ $project->id }}">{{ $project->title }}</a></li>
    @endforeach
    </ul>
    
@endsection