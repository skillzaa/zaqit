<?php
namespace App\Http\Controllers;
use App\Http\Resources\LevelResource;
use App\Models\Level;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\ItemRequest;
class LevelsController extends Controller
{
public function index()
{$data = Level::paginate(5);
 return view('manage.level')->with("data",$data);
//    return LevelResource::collection($ret);
}
    public function create()
    {
    return view('create.level');
    }
    public function edit($id)
        {
            //
        }


public function store(ItemRequest $request)
{

        $level = new Level;
        $level->name = $request->name;
        $level->save();
    //return new SubjectResource($subject);
    $request->session()->flash('mainMessage', 'Level '.$request->name .' has been created');
    return redirect('level/create');
}//store

public function show($id)
{
$data = Level::findOrFail($id);
return view('edit.level')->with("data",$data);
}

public function update(ItemRequest $request, $id)
{
$item = Level::findOrFail($id);
$input = $request->all();
$item->fill($input)->save();
$request->session()->flash('mainMessage', 'Updated...');
return redirect()->back();
}

public function destroy($id)
{
    $item = Level::findOrFail($id);
    $item->delete();
    Session::flash('mainMessage' , 'Item Deleted');
    //return redirect()->back();//dont return --reload
    return redirect('level/');
}

}
    //class
