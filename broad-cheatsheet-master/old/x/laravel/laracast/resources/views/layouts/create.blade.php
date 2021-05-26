@extends('../main')

@section('title','create')

@section('content')

<h2>Create Project</h2>

 <form action="/project" method="POST">
    @csrf

    <div class="form-group">
        <input class="form-control {{ $errors->has('title')? 'border-danger' : ''}}" type="text" name="title" placeholder="Title"  >
    </div>

    <div class="form-group">
        <textarea class="form-control danger {{ $errors->has('description')? 'border-danger' : ''}}" name="description" cols="30" rows="10" placeholder="Description">{{ old('description') }}</textarea>
    </div>

    <button class="btn btn-primary" type="submit">Save</button>    
</form>   

@include('includes/error')

@endsection