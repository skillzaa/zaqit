@extends('layouts.createForm')

@section('content')


<div class="container">
    <h2>Add a Paper</h2>

<form method="POST" action="{{ URL::to('/paper/') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
    Name</label>
<div class="col-sm-9">
<input name="name" type="text" class="form-control" id="name" placeholder="Paper Name">
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
    Time in Minutes:</label>
<div class="col-sm-9">
<input name="minutes" type="number" class="form-control"  placeholder="">
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Display Heading :</label>
<br/>
<div class="col-sm-9">
<select name="display_heading_id" id="" class="form-control">
    @foreach($data['displayHeadings'] as $key => $value)
    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
    @endforeach
</select>
</div>
</div>

        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Create Paper</button>
            </div>
        </div>
    </form>


@endsection
