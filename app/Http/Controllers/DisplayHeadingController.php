<?php
namespace App\Http\Controllers;
use App\Models\DisplayHeading;
use Illuminate\Http\Request;
use App\Http\Resources\DisplayHeadingResource;

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
public function edit($id)
    {
        //
    }


public function store(Request $request)
{
$validatedData = $request->validate([
    'name' => 'required|unique:subjects|max:20|min:3|regex:/^[\pL\s\-]+$/u'
    ]);
    $dh = new DisplayHeading;
    $dh->name = $request->name;
    $dh->save();
//return new SubjectResource($subject);
$request->session()->flash('mainMessage', 'Display Heading '.$request->name .' has been created');
return redirect('displayheading/create');
}//store

public function show($id)
{
//we can use validate here since validate is with $request and this is a GET request thus has no $request
 $ret = DisplayHeading::find($id);
 if($ret=== null ){return "No Record Found Please"; }
else{
    return new DisplayHeadingResource($ret);
}
}

public function update(Request $request, $id)
{


}

public function destroy($id)
{


}

}
