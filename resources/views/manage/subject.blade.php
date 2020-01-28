@extends('layouts.createForm')
@section('content')

<div class="container">

    <h2>Manage Subjects</h2>
<table class="table table-striped table-dark">
<thead>
    <tr>
        <td>Name</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
</thead>
@foreach($data as $key => $value)
<tbody>
    <tr>
        <td>{{$value['name']}}</td>
<td><a class="btn btn-sm btn-primary" href="{{URL('subject/'.$value['id'])}}">Edit</a></td>

<td>
    <form method="POST"
    action="{{ URL::to('subject/'.$value['id']) }}"
    enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
    </form>
    </td>

</tr>
</tbody>
@endforeach
</table>
{{$data->links()}}
@endsection
