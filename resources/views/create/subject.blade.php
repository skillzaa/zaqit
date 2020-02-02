@extends('layouts.createForm')

@section('content')


<div class="container">
    <h2>Add a Subject</h2>

<form method="POST" action="{{ URL::to('/subject/') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
    Subject Title</label>
<div class="col-sm-9">
<input name="name" type="text" class="form-control" id="name" placeholder="Subject Name">
</div>
</div>

        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Create Subject</button>
            </div>
        </div>
    </form>
@include('includes.itemsInstructions')
@endsection
