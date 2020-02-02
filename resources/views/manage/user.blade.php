@extends('layouts.createForm')
@section('content')

<div class="container">
    @include('includes.btnbar')
    <h2>Manage Students</h2>
@include('includes.paginationBarGen')    
{{$data['data']->links()}}
<table class="table table-striped table-dark">
<thead>
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Role</td>
        <td>Edit</td>
    </tr>
</thead>
@foreach($data['data'] as $key => $value)
<tbody>
    <tr>
        <td>{{$value['name']}}</td>
        <td>{{$value['email']}}</td>
        <td>{{$value['role']}}</td>
<td><a class="btn btn-sm btn-primary" href="{{URL('student/'.$value['id'])}}">Edit</a></td>


</tr>
</tbody>
@endforeach
</table>

@endsection
