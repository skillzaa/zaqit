@extends('layouts.createForm')
@section('content')
<link rel="stylesheet" href="{{asset('css/test.css')}}">
<div class="container">
<h1>Test</h1>
<div id="title"></div>
<div class="testDiv">
<div id="clockSpan"></div>
    <div id="questionDiv"></div>
    <div id="skippedDiv"></div>
<div id="optionsDiv">
<input data-radioNo="1" class="optionRadio" id="option1" type="radio" name="chosenOption" value="." ><span id="option1Span"></span><br>
<input data-radioNo="2" class="optionRadio" id="option2" type="radio" name="chosenOption" value="." ><span id="option2Span"></span><br>
<input data-radioNo="3" class="optionRadio" id="option3" type="radio" name="chosenOption" value="." ><span id="option3Span"></span><br>
<input data-radioNo="4" class="optionRadio" id="option4" type="radio" name="chosenOption" value="." ><span id="option4Span"></span>
</div>
    <div class="buttonsDiv">
        <button id="skip" class="btn btn-success">Skip</button>
        <button id="back" class="btn btn-success">Previous</button>
        <button  id="next" class="btn btn-success">Next</button>
        <button id="finish" class="btn btn-success">Finish</button>
    </div>
</div>

<form action="/test/check" method="POST">
    {{ csrf_field() }}
<input  id="questions" name="questions" type="hidden" value="{{json_encode($data['questions'])}}">
<input  id="paper" name="paper" type="hidden" value="{{json_encode($data['paper'])}}">
</form>
<script src="{{asset('js/testSupport.js')}}"></script>
<script src="{{asset('js/testMain.js')}}"></script>

<script>


</script>
</div>
@endsection