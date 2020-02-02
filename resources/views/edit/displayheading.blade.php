@extends('layouts.createForm')
@section('content')
<div class="container">
<h2>EDIT</h2>

<form method="POST" action="{{ URL::to('/displayheading/'.$data['id']) }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    @method('PUT')

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Title</label>
<div class="col-sm-9">
<input name="name" type="text" class="form-control" id="name" placeholder="Subject Name" value="{{$data['name']}}">
</div>
</div>

    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Edit Display Heading</button>
        </div>
    </div>
</form>
@include('includes.itemsInstructions')
@endsection
