<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable=['name','display_heading_id','minutes'];

    public function paperItems(){
        return $this->hasMany(Paperitem::class);
    }
    public function DisplayHeadings(){
        return $this->belongsTo(DisplayHeading::class);
    }



}
