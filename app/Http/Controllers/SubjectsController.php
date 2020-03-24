<?php
namespace App\Http\Controllers;
use App\Http\Resources\SubjectResource;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\ItemRequest;
use App\Models\Subject;
class SubjectsController extends Controller
{
public function index()
{
$data = Subject::paginate(5);
return view('manage.subject')->with("data",$data);
//    return SubjectResource::collection($ret);
}
public function create()
{
return view('create.subject');
}

public function store(ItemRequest $request)
{
$subject = new Subject;
$subject->name = $request->name;
$subject->save();
//return new SubjectResource($subject);
$request->session()->flash('mainMessage', 'Subject '.$request->name .' has been created');
return redirect('subject/create');
}

public function show($id)
{
$data = Subject::findOrFail($id);
return view('edit.subject')->with("data",$data);
}//show

public function update(ItemRequest  $request, $id)
{
$subject = Subject::findOrFail($id);
$input = $request->all();
$subject->fill($input)->save();
$request->session()->flash('mainMessage', 'Subject has been Updated');
return redirect()->back();
//     return  new SubjectResource($subject);
}

public function destroy($id)
{
$item = Subject::findOrFail($id);
$item->delete();
Session::flash('mainMessage' , 'Item Deleted');
//return redirect()->back();//dont return --reload
return redirect('subject/');
}
//============================
}
//class
