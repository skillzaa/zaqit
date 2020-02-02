@extends('layouts.createForm')
@section('content')

<div class="container">

    <h2>Manage Papers</h2>
@include('includes.paginationBarGen')
    {{(is_null($data['data']))?"":$data['data']->links()}}
<table class="table table-striped table-dark">
<thead>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
</thead>

@foreach($data['data'] as $key => $value)
<tbody>
    <tr>

<td><span>{{$value->id}}</span></td>
<td><span>{{$value->name}}</span></td>


        <td><a class="btn btn-sm btn-primary"
            href="{{ URL('/paper/'.$value['id'] )}}">
            Edit</a></td>

<td>
    <form method="POST"
    action="{{ URL::to('paper/'.$value['id']) }}"
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

@endsection


<script type="text/javascript" src="{{ URL::asset('resources/js/hide.js') }}"></script>
