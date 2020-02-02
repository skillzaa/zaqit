<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use DB;
use App\User;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\userUpdateRequest;
class UserController extends Controller
{
public function index()
{
$data['param']="all";
$data['data'] = User::where("role","!=","admin")->paginate(25);
return view('manage.user')->with('data',$data);
}//nf
public function query($param){
if($param=="all"){
$data['param']="all";
$data['data'] = User::where("role","!=","admin")->paginate(25);}

if ($param=="enabled"){
$data['param']="enabled";
$data['data'] = User::where("enabled","=","1")->paginate(25);
}

if($param=="disabled"){
$data['param']="disabled";
$data['data'] = User::where("enabled","=","0")->paginate(25);
}

if($param=="student"){
$data['param']="student";
$data['data'] = User::where("role","=","student")->paginate(25);
}
if($param=="teacher"){
$data['param']="teacher";
$data['data'] = User::where("role","=","teacher")->paginate(25);
}
if($param=="supervisor"){
$data['param']="supervisor";
$data['data'] = User::where("role","=","supervisor")->paginate(25);
}


return view('manage.user')->with('data',$data);
}

public function store(Request $request)
{
    //
}

public function show($id)
{
$data['subjects'] = Subject::all();
$data['data'] = User::findOrFail($id);
return view('edit.user')->with("data",$data);
}

public function update(userUpdateRequest $request, $id)
{
$user = User::findOrFail($id);
//return  new QuestionResource($question);
$input = $request->all();
$user->fill($input)->save();
$request->session()->flash('mainMessage', 'User has been Updated');
//return redirect('student/'.$id);
return redirect()->back();
}

public function destroy($id)
{
    //
}
// public function factory(){

// for ($i=0; $i < 50; $i++) {
//     DB::table('users')->insert([
//         'name' => Str::random(10),
//         'email' => Str::random(7).'@msn.com',
//         'password' => '$2y$10$uFX94w1civmK6Xhyge5.mO.J1GSgm6Tv6l8OAKOaGRklV3o0PKswu', // password
//         'role' => Arr::random(['student','teacher','supervisor']),
//         'enabled'=>0,
//         'subject_id'=> "1"
//     ]);
// }
// }
}//cssla
