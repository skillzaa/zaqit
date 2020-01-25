<?php
namespace App\Http\Controllers;
use App\Http\Resources\LevelResource;
use App\Models\Level;
use Illuminate\Http\Request;

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


public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|unique:levels|max:20|min:3|regex:/^[a-z\d\-_\s]+$/i'
        ]);
        $level = new Level;
        $level->name = $request->name;
        $level->save();
    //return new SubjectResource($subject);
    $request->session()->flash('mainMessage', 'Level '.$request->name .' has been created');
    return redirect('level/create');
}//store

    public function show($id)
    {
    //we can use validate here since validate is with $request and this is a GET request thus has no $request
     $ret = Level::find($id);
     if($ret=== null ){return "No Record Found Please"; }
    else{
        return new LevelResource($ret);
    }
    }

    public function update(Request $request, $id)
    {
        $ret = Level::find($id);
        if($ret=== null ){return "No Record Found Please"; }
       else{
        $level = Level::findOrFail($id);
        $level->name = $request->name;
         $level->save();
         return  new LevelResource($level);
    }
    }

    public function destroy($id)
    {
    $level = Level::find($id);
    if($level === null ){return "No Record Found Please"; }
    else{
    $level->delete();
    return  new LevelResource($level);
    }
    }

    }
    //class
