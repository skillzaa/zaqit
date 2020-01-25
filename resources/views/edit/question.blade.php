@extends('layouts.createForm')
@section('content')
<div class="container">
<h2>EDIT</h2>

<form method="post" action="{{ URL::to('/question/'.$data['question']['id']) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
   Subjects :</label>
   <br/>
<div class="col-sm-9">
    <select name="subject_id" id="" class="form-control">
        @foreach($data['subjects'] as $key => $value)
        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
        @endforeach
    </select>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
   Level :</label>
   <br/>
<div class="col-sm-9">
    <select name="level_id" id="" class="form-control">
        @foreach($data['levels'] as $key => $value)
        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
        @endforeach
    </select>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
   Difficulty :</label>
   <br/>
<div class="col-sm-9">
    <select name="difficulty" id="" class="form-control">
        <option value="easy">Easy</option>
        <option value="medium">Medium</option>
        <option value="hard">Hard</option>
    </select>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
    Question :</label>
<div class="col-sm-9">
<textarea name="question" rows="5"   class="form-control" id="question">{{$data['question']['question']}} </textarea>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
    Option 1:</label>
<div class="col-sm-9">
<input name="option1" type="text" class="form-control" id="option1" value="{{$data['question']['option1']}}">
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
   Option 2:</label>
<div class="col-sm-9">
<input name="option2" type="text" class="form-control" id="option2" placeholder="Option two"
value="{{$data['question']['option2']}}">
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
   Option 3:</label>
<div class="col-sm-9">
<input name="option3" type="text" class="form-control" id="option3" placeholder="Option three"
value="{{$data['question']['option3']}}">
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
   Option 4:</label>
<div class="col-sm-9">
<input name="option4" type="text" class="form-control" id="option4" placeholder="Option four"
value="{{$data['question']['option4']}}">
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
   Correct Option:</label>
<div class="col-sm-9">
<input name="correctOption" type="number" min="1" max="4" class="form-control" id="correctOption"
value="{{$data['question']['correctOption']}}">
</div>
</div>

<div class="form-group row">
    <label for="titleid" class="col-sm-3 col-form-label">
        Explanation :</label>
    <div class="col-sm-9">
    <textarea name="explanation" rows="5"   class="form-control" id="explanation">{{$data['question']['explanation']}}></textarea>
    </div>
    </div>


        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Update Question</button>
            </div>
        </div>
    </form>

@endsection
