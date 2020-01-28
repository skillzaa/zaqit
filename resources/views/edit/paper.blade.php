@extends('layouts.createForm')

@section('content')

<div class="container">
<h2><u>Edit Paper</u></h2>
<form method="POST" action="{{ URL::to('/paper/'.$data['data']->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
<div class="form-group row">
    <div class="col-sm-3">
        <h3>Name</h3>
    </div>
<div class="col-sm-9">
<input name="name" type="text" class="form-control" id="name" placeholder="Paper Name" value="{{$data['data']->name}}">
</div>
</div>

        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </form>
<hr>
@include('includes.addPaperItem')
@include('includes.deletePaperItem')
@endsection
