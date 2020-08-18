@extends('layouts.app')

@section('title', 'Evangel - Applicants List')

@section('content')
<table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
      </tr>
    </thead>
    <tbody>


    @foreach ($applicants as $applicant)
    <tr>
        <th scope="row">{{ $applicant->id }}</th>
        <td>{{ $applicant->first_name }}</td>
        <td>{{ $applicant->last_name }}</td>
        <td><a class="btn btn-primary" href="/scholarship/{{ $applicant->id }}">more</a></td>
    </tr>
    @endforeach

    </tbody>
    </table>
@endsection
