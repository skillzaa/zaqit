@extends('layouts.createForm')
@section('content')
<div class="container">
<h2>Edit Student</h2>

<form method="POST" action="{{ URL::to('/student/'.$data['data']['id']) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT')

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Name</label>
<div class="col-sm-9">
<input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{$data['data']['name']}}">
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Email</label>
<div class="col-sm-9">
<span class="form-control">{{$data['data']['email']}}</span>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Role</label>
<div class="col-sm-9">
<select class="form-control" name="role" id="">
    <option
    {{($data['data']['role']=="student")? " selected " : ""}}
    value="student">Student</option>
    <option
    {{($data['data']['role']=="teacher")? " selected " : ""}}
    value="teacher">Teacher</option>
    <option value="supervisor"
    {{($data['data']['role']=="supervisor")? " selected " : ""}}
    >Supervisor</option>
</select>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Enabled/Disabled</label>
<div class="col-sm-9">

<select class="form-control" name="enabled" id="">
    <option value="1"
    {{($data['data']['enabled']=="1")? " selected " : ""}}
    >Enabled</option>
    <option value="0"
    {{($data['data']['enabled']=="0")? " selected " : ""}}
    >Disabled</option>
</select>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Test Allowed</label>
<div class="col-sm-9">

<input type="number" name="testsAllowed" class="form-control" value="{{$data['data']['testsAllowed']}}">
</div>
</div>

@if(($data['data']['role'] == "teacher") || ($data['data']['role'] == "supervisor"))

<div class="form-group row">
    <label for="titleid" class="col-sm-3 col-form-label">
       Subject Authorised :</label>
       <br/>
    <div class="col-sm-9">
        <select name="subject_id" id="" class="form-control">
            @foreach($data['subjects'] as $key => $value)
            <option value="{{ $value['id'] }}"

{{($value['id'] == $data['data']['subject_id'])? 'selected': ''}}
            >{{ $value['name'] }}</option>
            @endforeach
        </select>
    </div>
    </div>

@endif

    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>

@endsection
