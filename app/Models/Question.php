<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Level;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Resources\QuestionResource;

class Question extends Model
{
protected $fillable = ['question',"option1","option2","option3","option4","correctOption","explanation","notes","subject_id","level_id","difficulty"];
    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }

public function trippleWhere($subject_id="any",$level_id="any",$difficulty="any"){

$NoOfWheresColumns = 0;
$whereAdded = false; //there is just 1 where clause
//$arr="";
//=======================================
$query = "SELECT * FROM questions ";
//=======================================
    if($subject_id !== "any"){
    $whereAdded=true;
    $NoOfWheresColumns++;
    $query .= " WHERE  ";
    $query .= "  subject_id  = :subject_id ";
    $arr['subject_id'] = $subject_id;
    }

    if($level_id !== "any"){
        if($whereAdded == false){
            $query .= " WHERE  ";
        }else{
            $query .= " AND ";
        }
    $NoOfWheresColumns++;
    $query .= "  level_id  = :level_id ";
    $arr['level_id'] = $level_id;
    }

    if($difficulty !== "any"){
        if($whereAdded == false){
            $query .= " WHERE  ";
        }else{
            $query .= " AND ";
        }
    $NoOfWheresColumns++;
    $query .= "  difficulty  = :difficulty ";
    $arr['difficulty'] = $difficulty;
    }
    // dd($query);
    if($NoOfWheresColumns==0){
    return   DB::select( DB::raw($query));
    }else{
    return   DB::select( DB::raw($query), $arr);
    //dd(   DB::select( DB::raw($query), $arr));
    }
}//trippleWhere
//==========================================
//==========================================
//==========================================
//==========================================
public static  function trippleWhere2(){
$perPage=10;
$whereCol1 = (is_null(Session::get('ddd')))? Session::get('subject_id'): "any";
$whereCol2 = (is_null(Session::get('ddd')))? Session::get('level_id'): "any";
$whereCol3 = (is_null(Session::get('ddd')))? Session::get('difficulty'): "any";

//1------  V V V
if(
    $whereCol1 !== "any" &&
    $whereCol2 !== "any" &&
    $whereCol3 !== "any"
    ){
    return Question::where('subject_id',$whereCol1)->where('level_id',$whereCol2)->where('difficulty',$whereCol3)->paginate($perPage);
    }
//2------  X V V
if(
    $whereCol1 == "any" &&
    $whereCol2 !== "any" &&
    $whereCol3 !== "any"
    ){
    return Question::where('level_id',$whereCol2)->where('difficulty',$whereCol3)->paginate($perPage);
    }
//3------  X X V
if(
    $whereCol1 == "any" &&
    $whereCol2 == "any" &&
    $whereCol3 !== "any"
    ){
    return Question::where('subject_id',$whereCol1)->where('level_id',$whereCol2)->paginate($perPage);
    }
//4------  X X X
if(
    $whereCol1 == "any" &&
    $whereCol2 == "any" &&
    $whereCol3 == "any"
     ){
        return self::paginate($perPage);
    }
//5------  X V X
if(
    $whereCol1 == "any" &&
    $whereCol2 !== "any" &&
    $whereCol3 == "any"
     ){
    return Question::where('level_id',$whereCol2)->paginate($perPage);
    }
//6------  V V X
if(
    $whereCol1 !== "any" &&
    $whereCol2 !== "any" &&
    $whereCol3 == "any"
     ){
    return Question::where('subject_id',$whereCol1)->where('level_id',$whereCol2)->paginate($perPage);
    }
//7------  V X X
if(
    $whereCol1 !== "any" &&
    $whereCol2 == "any" &&
    $whereCol3 == "any"
     ){
    return Question::where('subject_id',$whereCol1)->paginate($perPage);
    }
//8------  V X V
if(
    $whereCol1 !== "any" &&
    $whereCol2 == "any" &&
    $whereCol3 !== "any"
     ){
    return Question::where('subject_id',$whereCol1)->where('difficulty',$whereCol3)->paginate($perPage);
    }

//dd($whereCol1);


//..................................................
//..................................................
}//fn



}//class
