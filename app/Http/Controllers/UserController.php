<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Session;
class UserController extends Controller
{
public function index()
{
$data['enabled']="all";
$data['students'] = User::where("role","!=","admin")->paginate(50);
return view('manage.user')->with('data',$data);
}//nf
public function enabled($param){
if($param=="all"){
$data['enabled']="all";
$data['students'] = User::where("role","!=","admin")->paginate(25);
}else if ($param=="enabled"){
$data['enabled']="enabled";
$data['students'] = User::where("enabled","=","1")->paginate(25);
}else if($param=="disabled"){
$data['enabled']="disabled";
$data['students'] = User::where("enabled","=","0")->paginate(25);
}
return view('manage.user')->with('data',$data);
}

public function store(Request $request)
{
    //
}

public function show($id)
{
$data = User::findOrFail($id);
return view('edit.user')->with("data",$data);
}

public function update(Request $request, $id)
{
    //
}

public function destroy($id)
{
    //
}
}
