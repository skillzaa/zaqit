<?php
namespace App\Http\Controllers;
use App\Models\Paper;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Level;
use App\Http\Requests\PaperRequest;
use App\Models\Paperitem;
use Session;
class PaperController extends Controller
{

public function index()
{

}

public function create()
{
return view('create.paper');
}

public function store(PaperRequest $request)
{
$paper = new Paper;
//dd($paper);
$paper->name = $request->name;
$paper->save();
//dd($paper->id);
$request->session()->flash('mainMessage', 'Paper '.$request->name .' has been created');
return redirect('paper/'. $paper->id);
}


public function show($id)
{
$data['data'] = Paper::findOrFail($id);
$data['subjects'] = Subject::all();
$data['levels'] = Level::all();
return view('edit.paper')->with("data",$data);
}
public function deleteItem ($paper_id,$item_id){
$item = Paperitem::findOrFail($item_id);
$item->delete();
Session::flash('mainMessage' , 'Item Deleted');
//return redirect()->back();//dont return --reload
return redirect('paper/'.$paper_id);
}

public function addItem (Request $request){
//dd($request);
$item = new Paperitem;
//dd($item);
$item->subject_id = $request->subject;
$item->paper_id = $request->id;
$item->level_id = $request->level;
$item->difficulty = $request->difficulty;
$item->save();
//dd($paper->id);
$request->session()->flash('mainMessage', 'Subject  '.$request->name .' added to Paper');
//--send it to request id (thats papaer id in items table)
return redirect('paper/'. $request->id);
}
 public function update(PaperRequest $request,$id)
{
$paper = Paper::findOrFail($id);
$input = $request->all();
$paper->fill($input)->save();
$request->session()->flash('mainMessage', 'Paper has been Updated');
return redirect()->back();
}


    public function destroy(Paper $paper)
    {
        // $item = Subject::findOrFail($id);
        // $item->delete();
        // Session::flash('mainMessage' , 'Item Deleted');
        // //return redirect()->back();//dont return --reload
        // return redirect('subject/');
    }
}
