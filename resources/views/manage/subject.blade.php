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
        <td><button class="btn btn-sm btn-primary">Edit</button></td>
        <td><button class="btn btn-sm btn-danger">Delete</button></td>
    </tr>
</tbody>
@endforeach
</table>
{{$data->links()}}
@endsection
