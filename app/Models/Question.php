<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Level;

class Question extends Model
{
    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }

public function validate(Request $request){

}//validate

}//class
