<?php
namespace App\Http\Controllers;
use App\Http\Resources\SubjectResource;
use Illuminate\Http\Request;
use App\Models\Subject;
class SubjectsController extends Controller
{
public function index()
{
    $ret = Subject::all();
    return SubjectResource::collection($ret);
}


public function store(Request $request)
{
$validatedData = $request->validate([
    'name' => 'required|unique:subjects|max:255'
    ]);
//$unique = Subject::where("name","=",$request->name)->count();
$subject = new Subject;
$subject->name = $request->name;
$subject->save();
return new SubjectResource($subject);
}

public function show($id)
{
//we can use validate here since validate is with $request and this is a GET request thus has no $request
 $ret = Subject::find($id);
 if($ret=== null ){return "No Record Found Please"; }
else{
    return new SubjectResource($ret);
}
}

public function update(Request $request, $id)
{
    $ret = Subject::find($id);
    if($ret=== null ){return "No Record Found Please"; }
   else{
    $subject = Subject::findOrFail($id);
    $subject->name = $request->name;
     $subject->save();
     return  new SubjectResource($subject);
}
}

public function destroy($id)
{
$subject = Subject::find($id);
if($subject === null ){return "No Record Found Please"; }
else{
$subject->delete();
return  new SubjectResource($subject);
}
}

}
//class