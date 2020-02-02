<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Paper;
use App\Models\Question;

class Test extends Controller
{
   public function index(){

   }

public function show($id){
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
///XXXX remove correctOption from EachQuestion
return view('test.test')->with("data",$data);

}

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

}//class
