<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Level;
use App\Http\Resources\QuestionResource;
class QuestionController extends Controller
{
public function index()
{
$data = Question::paginate(25);
return view('manage.question')->with('data',$data);
//return QuestionResource::collection($ret);
}

public function create()
{
 $data['subjects'] = Subject::all();
 $data['levels'] = Level::all();
return view('create.question')->with( "data",$data);
}


public function store(Request $request)
{
//    dd($request->all());
$validatedData = $request->validate([
        'question' => 'required',
        'option1'=>'required',
        'option2'=>'required',
        'option3'=>'required',
        'option4'=>'required',
        'correctOption'=>'required|digits_between:1,4',
        'subject_id'=>'required',
        'level_id'=>'required'
]);
Question::create($request->all());
//return new QuestionResource($question);
$request->session()->flash('mainMessage', 'Question has been created');
return redirect('question/create');
}

public function show($id)
{
$data['subjects'] = Subject::all();
$data['levels'] = Level::all();
$data['question'] = Question::findOrFail($id);
//we can use validate here since validate is with $request and this is a GET request thus has no $request
return view('edit.question')->with("data",$data);
//return new QuestionResource($data['question']);
}

public function update(Request $request, $id)
{
//dd('update');
// option 2   $speakUpdate->fill($input)->save();
$validatedData = $request->validate([
'question' => 'required',
'option1'=>'required',
'option2'=>'required',
'option3'=>'required',
'option4'=>'required',
'correctOption'=>'required|digits_between:1,4',
'subject_id'=>'required',
'level_id'=>'required'
]);
    //-------------------------------
$question = Question::findOrFail($id);
//return  new QuestionResource($question);
$input = $request->all();
$question->fill($input)->save();
$request->session()->flash('mainMessage', 'Question has been Updated');
return redirect()->back();
}

public function destroy($id)
{
$question = Question::findOrFail($id);
$question->delete();
return  new QuestionResource($question);
}

    }
    //class
