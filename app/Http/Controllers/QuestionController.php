<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Level;
use Session;
use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
public function index()
{
$data['subjects'] = Subject::all();
$data['levels'] = Level::all();
$data['questions'] = Question::trippleWhere2();
return view('manage.question')->with('data',$data);
}

public function tripplePost(Request $request){
$validatedData = $request->validate([
    'subject_id' => 'required',
    'level_id' => 'required',
    'difficulty' => "required|in:easy,medium,hard,any",
]);
Session::put('subject_id', $request->subject_id);
Session::put('level_id', $request->level_id);
Session::put('difficulty', $request->difficulty);
//dd(session()->all());
return redirect('question');
}//tripple

public function query(Request $request)
{
$validatedData = $request->validate([
'subject_id' => 'required',
'level_id' => 'required',
'difficulty' => "required|in:easy,medium,hard",
]);

$q = new Question;
$q2  =($q->trippleWhere($request->subject_id,$request->level_id,$request->difficulty));
$q3 = Question::hydrate($q2);
$data['questions'] =$q3;

$data['subjects'] = Subject::all();
$data['levels'] = Level::all();
return view('manage.question')->with('data',$data);
//return QuestionResource::collection($ret);
}

public function create()
{
 $data['subjects'] = Subject::all();
 $data['levels'] = Level::all();
return view('create.question')->with( "data",$data);
}


public function store(QuestionRequest $request)
{
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

public function update(QuestionRequest $request, $id)
{
    
$question = Question::findOrFail($id);
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
return redirect('question/');
}

}
    //class
