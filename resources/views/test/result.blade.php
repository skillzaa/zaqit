@extends('layouts.createForm')
@section('content')

<div id="resultDiv"  class="container">
<h1>Result</h1>

<table  class="table table-striped table-dark">
<tr>
    <td>Subject</td>
    <td>Total Questions</td>
    <td>Correct Answers</td>
    <td>Marks</td>
    <td>%age</td>

</tr>
@foreach($data['data'] as $k=>$v)
    <tr>
        <td>{{$v->subject}}</td>
        <td>{{$v->totalNoOfQuestion}}</td>
        <td>{{$v->correctAnswers}}</td>
        <td>{{$v->correctAnswers}}</td>
        <td>{{intval(($v->correctAnswers/$v->totalNoOfQuestion)*100) . " %"}}</td>
    </tr>
    @endforeach

<tr>
    <td>Grand Total</td>
    <td>{{$data['gtq']}}</td>
    <td>{{$data['gta']}}</td>
    <td>{{$data['gta']}}</td>
    <td>{{intval($data['gtt']). " %"}}</td>
</tr>
</table>
<script>

</script>
</div>
@endsection
