<?php namespace App\Models;
use App\Models\Question;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paperitem;
class Subject extends Model
{
    protected $fillable=['name'];

    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function paperItems(){
        return $this->hasMany(Paperitem::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
