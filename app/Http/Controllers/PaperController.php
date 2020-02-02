<?php
namespace App\Http\Controllers;
use App\Models\Paper;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Level;
use App\Models\DisplayHeading;
use App\Http\Requests\PaperRequest;
use App\Http\Requests\PaperItemsRequest;
use App\Models\Paperitem;
use Session;
class PaperController extends Controller
{

public function index()
{
$data['data'] = Paper::paginate(10);
return view('manage.paper')->with('data',$data);
}

public function create()
{
$data['displayHeadings'] = DisplayHeading::all();
return view('create.paper')->with('data',$data);
}

public function store(PaperRequest $request)
{
//    dd($request::toArray());
$paper = Paper::create($request->all());
$request->session()->flash('mainMessage', 'Paper '.$request->name .' has been created');
return redirect('paper/'. $paper->id);
}


public function show($id)
{
$data['data'] = Paper::findOrFail($id);
$data['subjects'] = Subject::all();
$data['levels'] = Level::all();
$data['displayHeadings'] = DisplayHeading::all();

return view('edit.paper')->with("data",$data);
}
public function deleteItem ($paper_id,$item_id){
$item = Paperitem::findOrFail($item_id);
$item->delete();
Session::flash('mainMessage' , 'Item Deleted');
//return redirect()->back();//dont return --reload
return redirect('paper/'.$paper_id);
}

public function addItem (PaperItemsRequest $request){
$item = Paperitem::create($request->all());
$request->session()->flash('mainMessage', 'Subject  '.$request->name .' added to Paper');
//--send it to request id (thats papaer id in items table)
return redirect('paper/'. $request->paper_id);
}
 public function update(PaperRequest $request,$id)
{
$paper = Paper::findOrFail($id);
$input = $request->all();
$paper->fill($input)->save();
$request->session()->flash('mainMessage', 'Paper has been Updated');
return redirect()->back();
}


public function destroy($id)
{
//dd("Paper - destroy");
$item = Paper::findOrFail($id);
$item->delete();
Session::flash('mainMessage' , 'Item Deleted');
//return redirect()->back();//dont return --reload
return redirect('paper/');
}
}
