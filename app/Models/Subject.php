<?php
namespace App\Models;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function questions(){
        return $this->hasMany(Question::class);
    }
}