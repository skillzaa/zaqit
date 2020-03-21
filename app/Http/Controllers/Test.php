<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Paper;
use App\Models\Question;
use App\Models\Subject;
use App\Models\CheckPaper;
use Auth;
class Test extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
public function show($id){
//for simpleicty used 2 ifand not &&
//dd(Auth::user()->id);
if((Auth::user()->role) != "admin"){
if((Auth::user()->testsAllowed) < 1){
$data['msg'] = "You Are NOT Authorised To Take Any More Tests";
return view('errors.general')->with("data",$data);
}    
//...........................
if(Auth::user()->enabled !== "1"){
    $data['msg'] = "This account is not enabled Please contact the administrator.";
    return view('errors.general')->with("data",$data);
}
}//if not admin

$d = Paper::where('id',$id)->first();
$data['paper'] = ($d->toArray());
$data['items'] = ($d->paperItems->toArray());
$data['questions'] = [];
    foreach($data['items'] as $k=>$v){
        $step1 = Question::where('subject_id',$v['subject_id'])->where('level_id',$v['level_id'])->where('difficulty',$v['difficulty'])->get();
        $step2 = $this->shuffle_assoc($step1->toArray());
        $step3  = array_slice($step2, 0, $v['quantity']);
        $data['questions'] = array_merge($data['questions'], $step3);
    }
    $this->decAllowedTests();     
///XXXX remove correctOption from EachQuestion
$data['attemptsRemaining'] = $this->getAllowedTests();
return view('test.test')->with("data",$data);

}
//---------------------------------------------
public function check(Request $request){
//-------------------------------------------s    
    if((Auth::user()->role) != "admin"){
        if((Auth::user()->testsAllowed) < 1){
        $data['msg'] = "You Are NOT Authorised To Take Any More Tests";
        return view('errors.general')->with("data",$data);
        }}
//-----------------------------------------------------       //---dec test allowed is here now
    $this->decAllowedTests();     
//-----------------------------------------------------       


$data['data'] = json_decode($request->out);
$data['data'] = $this->getSubjectNames($data['data']);
//dd($data['data']);
$data['gtq'] = $this->addCol($data['data'],"totalNoOfQuestion");
$data['gta'] = $this->addCol($data['data'],"correctAnswers");
$data['gtt'] = $data['gta']/$data['gtq']*100;
//$data['gtQs'] = $this->addCol($data,"totalNoOfQuestion");

return view('test.result')->with('data',$data);
//return $data;
}
//---------------------------------------------
private function decAllowedTests(){
$user = Auth::user();
$user->testsAllowed = $user->testsAllowed -1;
$user->save();
return true;
}
private function getAllowedTests(){
$user = Auth::user();
return $user->testsAllowed;
}

//---------------------------------------------
private function shuffle_assoc($list) {
if (!is_array($list)) return $list;
$keys = array_keys($list);
shuffle($keys);
$random = array();
foreach ($keys as $key) {
  $random[$key] = $list[$key];
}
return $random;
}

private function addCol($data,$col){
$sum = 0;
//dd($data);
foreach ($data as $key => $value) {
    //dd($value->$col);
    $sum += $value->$col;
}
return $sum;
}

private function getSubjectNames($incomming){
foreach ($incomming as $key => $value) {
    $subj = Subject::find($value->subject_id);
    //dd($subj->name);
    //dd($value);
    //dd($incomming[$key]);
    $value->subject= $subj->name;
}
//dd($incomming);
return $incomming;
}

}//class
