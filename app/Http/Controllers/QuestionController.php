<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
public function index()
{
//dd("all ok");
$ret = Question::all();
return QuestionResource::collection($ret);
}


public function store(Request $request)
    {
$validatedData = $request->validate([
        'question' => 'required',
        'option1'=>'required',
        'option2'=>'required',
        'option3'=>'required',
        'option4'=>'required',
        'correctOption'=>'required',
        'subject_id'=>'required',
        'level_id'=>'required'
]);
//$unique = Question::where("name","=",$request->name)->count();
$question = new Question;
$question->question = $request->question;
$question->option1 = $request->option1;
$question->option2 = $request->option2;
$question->option3 = $request->option3;
$question->option4 = $request->option4;
$question->correctOption = $request->correctOption;
$question->subject_id = $request->subject_id;
$question->level_id = $request->level_id;
$question->explanation = $request->explanation;
$question->notes = $request->notes;
$question->save();
return new QuestionResource($question);
}

public function show($id)
{
$question = Question::findOrFail($id);
//we can use validate here since validate is with $request and this is a GET request thus has no $request
 return new QuestionResource($question);
}

public function update(Request $request, $id)
{$question = Question::findOrFail($id);
//-------------------------------
$question->question = $request->question;
$question->option1 = $request->option1;
$question->option2 = $request->option2;
$question->option3 = $request->option3;
$question->option4 = $request->option4;
$question->correctOption = $request->correctOption;
$question->subject_id = $request->subject_id;
$question->level_id = $request->level_id;
$question->explanation = $request->explanation;
$question->notes = $request->notes;
//-----------------------------------
$question->save();
return  new QuestionResource($question);
}

public function destroy($id)
{
$question = Question::findOrFail($id);
$question->delete();
return  new QuestionResource($question);
}

    }
    //class
