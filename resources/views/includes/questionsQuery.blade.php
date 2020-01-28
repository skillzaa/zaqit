<button class="btn btn-sm btn-primary" id="hideLink">Query</button>
<div id="hide">
<form method="POST" action="{{ URL::to('/question/tripplePost') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Where Subjects =</label>
<br/>
<div class="col-sm-9">
<select name="subject_id"  class="form-control">
    <option value="any">Any</option>
    @foreach($data['subjects'] as $key => $value)
    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
    @endforeach
</select>
</div>
</div>


<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Where Level =</label>
<br/>
<div class="col-sm-9">
<select name="level_id"  class="form-control">
    <option value="any">Any</option>
    @foreach($data['levels'] as $key => $value)
    <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
    @endforeach
</select>
</div>
</div>

<div class="form-group row">
<label for="titleid" class="col-sm-3 col-form-label">
Where Difficulty =</label>
<br/>
<div class="col-sm-9">
<select name="difficulty"  class="form-control">
    <option value="any">Any</option>
    <option value="easy">Easy</option>
    <option value="medium">Medium</option>
    <option value="hard">Hard</option>
</select>
</div>
</div>


<button type="submit" class="btn btn-sm btn-success">Search</button>
</form>

</div><!--hide-->


