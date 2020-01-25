@extends('layouts.createForm')

@section('content')

<div class="container">
    <h2>Add a Level</h2>

<form method="POST" action="{{ URL::to('/level/store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
    Level Name</label>
<div class="col-sm-9">
<input name="name" type="text" class="form-control" id="name" placeholder="Level Name">
</div>
</div>

        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Create Level</button>
            </div>
        </div>
    </form>

<footer class="footer border border-primary">
<div class="container">
<div class="text-muted">Place Do not use Names already used.Already used named will not be accepted.</div>
<div class="text-muted">Please use Alphanumeric characters with spaces and dashes only</div>
<div class="text-muted">Maximum 20 Characters long.</div>
<div class="text-muted">Minimum 3 Characters long.</div>
</div>
</footer>
@endsection
