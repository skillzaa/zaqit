<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Paperitem extends Model
{
    protected $fillable = ['paper_id','subject_id','level_id','quantity','difficulty'];
    public function paper(){
        return $this->belongsTo(Paper::class);
    }
    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
