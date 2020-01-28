@extends('layouts.createForm')
@section('content')
<div class="container">
<h2>Edit Student</h2>

<form method="POST" action="{{ URL::to('/user/'.$data['id']) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT')

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Name</label>
<div class="col-sm-9">
<input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{$data['name']}}">
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Email</label>
<div class="col-sm-9">
<span class="form-control">{{$data['email']}}</span>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Role</label>
<div class="col-sm-9">
<span class="form-control">{{$data['role']}}</span>
<select class="form-control" name="role" id="">
    <option
    {{($data['role']=="student")? " selected " : ""}}
    value="student">Student</option>
    <option
    {{($data['role']=="teacher")? " selected " : ""}}
    value="teacher">Teacher</option>
    <option value="supervisor"
    {{($data['role']=="supervisor")? " selected " : ""}}
    >Supervisor</option>
</select>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Enabled/Disabled</label>
<div class="col-sm-9">
<span class="form-control">{{$data['Enabled']? 'True':'False'}}</span>
<select class="form-control" name="enabled" id="">
    <option value="1">Enable</option>
    <option value="0">Disable</option>
</select>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Test Allowed</label>
<div class="col-sm-9">
<span class="form-control">{{$data['testsAllowed']}}</span>
<input type="number" class="form-control">
</div>
</div>

    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Edit Subject</button>
        </div>
    </div>
</form>

@endsection
