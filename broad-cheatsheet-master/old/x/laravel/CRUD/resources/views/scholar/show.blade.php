@extends('layouts.app')

@section('title','evangel - Show')

@section('content')
  <div class="jumbotron clearfix">
<h2 class="text-uppercase">Personal Information</h2>
<br>
<div class="row">
    <div class="col-12 col-md-2 border border-primary">

    </div>
    <div class="col">
        <h6>Name:</h6>
        <p>{{ $scholar->last_name.','.$scholar->first_name }}</p>
        <h6>Email:</h6>
        <p>{{ $scholar->email }}</p>
    </div>
    <div class="col">
        <h6>Age:</h6>
        <p>123</p>
        <h6>Contact no:</h6>
        <!-- add country number -->
        <p><span>+63 - </span>{{ $scholar->contact }}</p>
    </div>
    <div class="col">
        <h6>Date of birth:</h6>
        <p>{{ $scholar->birth_date }}</p>
        <h6>Gender:</h6>
        <p>{{ $scholar->gender }}</p>
    </div>
</div>
<div class="row">
  <div class="col-md-2">

  </div>
  <div class="col">
      <h6>employment:</h6>
      <p>{{ $scholar->employment }}</p>
      <h6>null:</h6>
      <p>null</p>
  </div>
  <div class="col">
    <h6>null:</h6>
    <p>null</p>
      <h6>Guardian Name:</h6>
      <p>{{ $scholar->guardian_name }}</p>


  </div>
  <div class="col">
      <h6>null:</h6>
      <p>null</p>
      <h6>Guardian Contact:</h6>
      <p>{{ $scholar->guardian_contact }}</p>

  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-2">

  </div>
  <div class="col-2">
    <h3 class="text-uppercase">Scholar</h3>
    <p><strong>Type:</strong></p>
    @php
      $temp = explode(",",$scholar->scholar_type);
      $arrNum = count($temp);
      for ($i=0; $i < $arrNum ; $i++) {
        echo "<p>".$temp[$i]."<p>";
      }
    @endphp
  </div>
  <div class="col">
    <br>
    <div class="">
      <strong>Course: </strong>
      <span>{{ $scholar->class_course }}</span>

    </div>
    <div class="">
      <strong>Subject: </strong>
      <span>{{ $scholar->class_subject }}</span>

    </div>
    <div class="">
      <strong>Time: </strong>
      <span>{{ $scholar->class_time }}</span>

    </div>
  </div>
</div>

<div class="mt-5 float-right">

  <a href="#" class="btn btn-primary px-5">Edit</a>
  <a href="#" class="btn btn-danger px-5">Delete</a>
</div>
</div>
@endsection
