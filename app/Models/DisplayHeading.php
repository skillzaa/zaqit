<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisplayHeading extends Model
{
    protected $fillable=['name'];

    public function papers(){
        return $this->hasMany(Paper::class);
    }



}
