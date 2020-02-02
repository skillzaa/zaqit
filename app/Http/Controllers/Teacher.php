<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Level;
class Teacher extends Controller
{
 public function index()
{
$data['subject'] = Auth::user()->subject;
$data['levels'] = Level::all();
//dd(Auth::user()->subject->id);
$data['questions'] = Question::where('subject_id',Auth::user()->subject->id)->paginate(15);
return view('manage.teacherQuestion')->with('data',$data);
}

public function create(){
$data['subject'] = Auth::user()->subject;
$data['levels'] = Level::all();
return view('create.teacherQuestion')->with( "data",$data);
}

public function store(QuestionRequest $request)
{
$question = Question::create($request->all());
$request->session()->flash('mainMessage', 'Question has been created');
return redirect('teacher/'. $question->id);
}

public function show($id)
{
$data['subject'] = Auth::user()->subject;
$data['levels'] = Level::all();
$data['question'] = Question::findOrFail($id);
//we can use validate here since validate is with $request and this is a GET request thus has no $request
return view('edit.teacherQuestion')->with("data",$data);
//return new QuestionResource($data['question']);
}

public function update(QuestionRequest $request, $id)
{
$question = Question::findOrFail($id);
//return  new QuestionResource($question);
$input = $request->all();
$question->fill($input)->save();
$request->session()->flash('mainMessage', 'Question has been Updated');
return redirect()->back();
}

public function destroy($id)
{
$item = Question::findOrFail($id);
$item->delete();
Session::flash('mainMessage' , 'Item Deleted');
//return redirect()->back();//dont return --reload
return redirect('teacher/');
}

}
