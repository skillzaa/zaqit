@extends('layouts.createForm')
@section('content')

<div class="container">
@include('includes.questionsQuery')
    <h2>Manage Question</h2>
<div>
    Current Page:<span class="text-danger">
        {{($data['questions']->currentPage())}}
        </span>
    Total  Pages:<span class="text-danger">
        {{($data['questions']->lastPage())}}
        </span>
    Per Page:<span class="text-danger">
        {{($data['questions']->perPage())}}
        </span>
    Total:<span class="text-danger">
        {{($data['questions']->total())}}
        </span>
</div>
    {{(is_null($data['questions']))?"":$data['questions']->links()}}
<table class="table table-striped table-dark">
<thead>
    <tr>
        <td>id</td>
        <td>Question</td>
        <td>Subject</td>
        <td>Level</td>
        <td>Difficulty</td>
        <td>Edit</td>
    </tr>
</thead>

@foreach($data['questions'] as $key => $value)
<tbody>
    <tr>

<td><span>{{$value->id}}</span></td>
<td><span>{{$value->question}}</span></td>
<td><span>{{$value->subject->name}}</span></td>
<td><span>{{$value->level->name}}</span></td>
<td><span>{{$value['difficulty']}}</span></td>

        <td><a class="btn btn-sm btn-primary"
            href="{{ URL('/question/'.$value['id'] )}}">
            Edit</a></td>

<td>
    <form method="POST"
    action="{{ URL::to('question/'.$value['id']) }}"
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
