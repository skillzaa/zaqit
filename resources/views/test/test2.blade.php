@extends('layouts.app')
@section('content')
<style>
    body{background-color:#e0fce1;}
    #textScreen{border:4px solid silver; min-height:100px;padding:4px;margin:4px;margin-left:10px;}
    #skippedQuestionsDiv{border:4px solid silver; min-height:100px;padding:4px;margin:4px;}

    #testTitleRow{margin:8px;padding:8px;margin-top:20px;font-size:2em;}
    #clockSpan{border-radius:15% ;margin:5px;padding:5px;}
    </style>


    <div id="testDiv">
    <div id="testTitleRow" class="row">
    <div class="col s12">
      Test
    <span id="clockSpan" class="blue white-text"></span>
    </div>
    </div>

    <div class="row">
    <div class="col s8" id="totalQuestions"></div>
    </div>

    <div class="row">
    <div class="col offset-s1 card-content s6" id="textScreen"></div>
    <div class="col s4" id="skippedQuestionsDiv">None</div>
    </div>

    <div class="row">
    <div class="col s12" id="optionsDiv" >

          <label>
            <input id="option1" class="optionsRadio" name="optionsGiven" type="radio" value="1"/>
            <span id="option1Value"></span>
          </label>

          <label>
            <input id="option2" class="optionsRadio" name="optionsGiven" type="radio" value="2"/>
            <span id="option2Value"></span>
          </label>

          <label>
            <input id="option3" class="optionsRadio" name="optionsGiven" type="radio" value="3"/>
            <span id="option3Value"></span>
          </label>

          <label>
            <input id="option4" class="optionsRadio" name="optionsGiven" type="radio" value="4"/>
            <span id="option4Value"></span>
          </label>


    </div>
    </div>

    <div class="row right-align">
    <div class="col s10">


    <a id="skip" class="orange waves-effect waves-light btn"><i class="material-icons left">flag</i>Skip</a>

    <a id="back" class="waves-effect waves-light btn"><i class="material-icons left">keyboard_arrow_left</i>Back</a>

    <a id="next" class="waves-effect waves-light btn"><i class="material-icons right">keyboard_arrow_right</i>Next</a>

    <a id="finish" class="red waves-effect waves-light btn"><i class="material-icons right">exit_to_app</i>Finish</a>

    </div>

    </div>
    </div><!--this is the test div-->


    <div class="container">
     <style>
     #reportCard{border:2px solid silver;padding:8px;margin:4px; font: 1.25em arial, sans-serif;}
     .pad{padding:10px;margin:10px; }
     </style>
    <div id="reportCard" class="card blue-grey lighten-4"></div>
    </div>

    <script src="{{url("resources/js/axios.js")}}"></script>
    <script src="{{url("resources/js/checkTest.js")}}"></script>
    <script src="{{url("resources/js/test2.js")}}"></script>
    <script src="{{url("resources/js/test.js")}}"></script>

@endsection



