@extends('layouts.app')
@section('content')

<div class="container">
<p class="error">{{$data['msg']}}</p>
</div>
@include('includes.footer')
@endsection
