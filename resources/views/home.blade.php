@extends('layouts.app')
@section('content')
@include('home2')
<div class="container">
<ul class="list-group">
@foreach($data['headings'] as $k=>$v)
<li class="list-group-item active">Topic: {{$v['name']}}</li>
        @if(count($v['papers'])==0)
        <li class="list-group-item">No Paper Found.</li>
        @else
            @foreach($v['papers'] as $kk=>$vv)
<li class="list-group-item"><a
    href="{{url('/test/'.$vv['id'])}}">
    {{$vv['name']}}</a></li>
            @endforeach
        @endif

@endforeach
</ul>
</div>
@include('includes.footer')
@endsection
