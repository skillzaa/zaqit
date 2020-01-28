<?php
namespace App\Http\Controllers;
use App\Models\DisplayHeading;
use Illuminate\Http\Request;
use App\Http\Resources\DisplayHeadingResource;
use Session;
use App\Http\Requests\ItemRequest;
class DisplayHeadingController extends Controller
{
public function index()
{
$data = DisplayHeading::paginate(5);
return view('manage.displayheading')->with("data",$data);
//    return DisplayHeadingResource::collection($ret);
}
public function create()
{
return view('create.displayheading');
}

public function store(ItemRequest $request)
{
$dh = new DisplayHeading;
    $dh->name = $request->name;
    $dh->save();
//return new SubjectResource($subject);
$request->session()->flash('mainMessage', 'Display Heading '.$request->name .' has been created');
return redirect('displayheading/create');
}//store

public function show($id)
{
$data = DisplayHeading::findOrFail($id);
return view('edit.displayheading')->with("data",$data);
}

public function update(ItemRequest $request, $id)
{
$item = DisplayHeading::findOrFail($id);
$input = $request->all();
$item->fill($input)->save();
$request->session()->flash('mainMessage', 'Updated...');
return redirect()->back();
}

public function destroy($id)
{
    $item = DisplayHeading::findOrFail($id);
    $item->delete();
    Session::flash('mainMessage' , 'Item Deleted');
    //return redirect()->back();//dont return --reload
    return redirect('displayheading/');

}

}
