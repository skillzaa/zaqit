@extends('layouts.createForm')
@section('content')

<div class="container">

    <h2>Manage Question</h2>
<table class="table table-striped table-dark">
<thead>
    <tr>
        <td>Question</td>
        <td>Edit</td>
    </tr>
</thead>
@foreach($data as $key => $value)
<tbody>
    <tr>
        <td>{{$value['question']}}(<span class="text-danger">id:{{$value['id']}})</span></td>
        <td><a class="btn btn-sm btn-primary"
            href="{{ URL('/question/'.$value['id'] )}}">
            Edit</a></td>
    </tr>
</tbody>
@endforeach
</table>
{{$data->links()}}
@endsection
