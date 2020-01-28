<div>
<form method="POST" action="{{ URL::to('/paper/addItem') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<input type="hidden" name="id" value={{$data['data']->id}}>
<div class="form-group row">
    <div class="col-sm-3">
        <h3>Add A Subject</h3>
    </div>
<div class="col-sm-9">
<table  class="table table-striped table-light">
    <tr>
        <td>Subject</td>
        <td>Level</td>
        <td>Difficulty</td>
    </tr>
    <tr>
        <td>
            <select name="subject" id="" class="form-control">
                @foreach($data['subjects'] as $key => $value)
                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select name="level" id="" class="form-control">
                @foreach($data['levels'] as $key => $value)
                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select name="difficulty" id="" class="form-control">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>
        </td>
    </tr>
</table>
</div>
</div>

<div class="form-group row">
    <div class="offset-sm-3 col-sm-9">
        <button type="submit" class="btn btn-success">Add Subject to Paper</button>
    </div>
</div>
</form>

</div>
<hr/>
