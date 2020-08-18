@extends('layouts.app')

@section('title', 'Evangel - Apply Scholarship')

@section('content')

  @include('includes.error')

<form action="/scholarship" method="POST">
    @csrf
    <div class="container">

        <h4>Personal Information</h4>
        <div class="row">
            <div class="col-12 col-md">
                <label for="">First name:</label>
                <input type="text" id="fName" class="form-control {{ $errors->any()? $errors->has("firstName")? "is-invalid" : "is-valid" : ""}}" name="firstName" value="{{ old('firstName') }}" placeholder="First name">
            </div>
            <div class="col">
                <label for="">Last name:</label>
                <input type="text" class="form-control {{ $errors->any()? $errors->has("lastName")? "is-invalid" : "is-valid" : ""}}" name="lastName" value="{{ old('lastName') }}" placeholder="Last name">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <p>Date of Birth:</p>
        <div class="row">
            <div class="form-group col-3 col-md-1">
                <small>Month</small>
                <select class="custom-select" name="month">
                    @for ($i = 1; $i <= 12; $i++) <option class="">{{$i}}</option>
                        @endfor
                </select>

            </div>
            <div class="form-group col-3 col-md-1">
                <small>Day</small>
                <select class="custom-select" name="day">
                    @for ($i = 1; $i <= 31; $i++) <option class="">{{$i}}</option>
                        @endfor
                </select>
            </div>
            <div class="form-group">
                <small>Year</small>
                <select class="custom-select text-center" name="year">
                    @for ($i = 1990; $i <= 2050; $i++) <option class="">{{$i}}</option>
                        @endfor
                </select>
            </div>

            <div class="col-md-2">
                <p>Gender:</p>
                <label class="mr-2"><input type="radio" name="gender" value="male"> Male</label>
                <label class="mr-2"><input type="radio" name="gender" value="female"> Female</label>
            </div>
            <div class="col-12 col-md-3">
                <label>Employment:</label>
                <select class="custom-select" name="employment">
                    <option selected>Open this select menu</option>
                    <option>Onezzzzzzzzzzzzz</option>
                    <option>Twozzzzzzzzzzzzzz</option>
                    <option>Threezzzzzzzzzzzz</option>
                </select>
            </div>
            <div class="col-12 col-md">
                <label for="">Contact Number:</label>
                <input type="text" class="form-control" name="contactNumber" placeholder="+123 0000 000">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md">
                <label for="">Guardian`s Full Name:</label>
                <input type="text" class="form-control" name="guardianName" placeholder="Full name">
            </div>
            <div class="col-12 col-md">
                <label for="">Guardian`s Contact number:</label>
                <input type="text" class="form-control" name="guardianContactNumber" placeholder="+123 0000 000">
            </div>
        </div>

        <hr>
        <h4>Scholar</h4>
        <div class="form-check my-2">
            <label class="form-check-label ml-3">
                <input class="form-check-input" type="checkbox" name="scholarType1" value="type1">Type 1</label>
            <label class="form-check-label ml-3">
                <input class="form-check-input" type="checkbox" name="scholarType2" value="type2">Type 2</label>
            <label class="form-check-label ml-3">
                <input class="form-check-input" type="checkbox" name="scholarType3" value="type3">Type 3</label>
        </div>
        <div class="row">
            <div class="form-group col-12 col-md">
                <label for="">Course:</label>
                <select class="custom-select custom-select-sm" name="classCourse">
                    <option selected>Open this select menu</option>
                    <option>course1zzzzzzzzzzz</option>
                    <option>course2zzzzzzzzzzz</option>
                    <option>course3zzzzzzzzzzzee</option>
                </select>
            </div>
            <div class="form-group col-12 col-md">
                <label for="">Subject:</label>
                <select class="custom-select custom-select-sm" name="classSubject">
                    <option selected>Open this select menu</option>
                    <option>subj1zzzzzzzzzzz</option>
                    <option>subj2zzzzzzzzzzz</option>
                    <option>subj3zzzzzzzzzzzee</option>
                </select>
            </div>
            <div class="form-group col-12 col-md">
                <label for="">Time:</label>
                <select class="custom-select custom-select-sm" name="classTime">
                    <option selected>Open this select menu</option>
                    <option>time1zzzzzzzzzzz</option>
                    <option>time2zzzzzzzzzzz</option>
                    <option>time3zzzzzzzzzzzee</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary px-5 p-2 float-right">Register</button>

    </div>
</form>

@endsection
