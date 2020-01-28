<div class="form-group row">
<div class="col-sm-3">
    <h3>Delete a Subject</h3>
</div>
<div class="col-sm-9">
<table  class="table table-striped table-dark">
    <tr>
        <td>Id</td>
        <td>Subject</td>
        <td>Level</td>
        <td>Difficulty</td>
        <td>Delete</td>
    </tr>

@foreach($data['data']->paperItems as $k=>$v)

        <tr>
            <td>
            <span>{{$v['id']}}</span>
            </td>
            <td>
            <span>{{$v['subject']->name}}</span>
            </td>
            <td>
                <span>{{$v['difficulty']}}</span>
            </td>
            <td>
                <span>{{$v['level']->name}}</span>
            </td>
            <td>
            <a class="btn btn-sm btn-danger"
            href="{{URL::to('/paper/deleteItem/'. $data['data']['id']."/".$v['id'])}}">
            Delete</a>
            </td>
        </tr>

    </div>
    </div>
    </form>

@endforeach
</table>
</div>
</div>
