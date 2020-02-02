<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable=['name','display_heading_id'];

    public function paperItems(){
        return $this->hasMany(Paperitem::class);
    }
    public function DisplayHeadings(){
        return $this->belongsTo(DisplayHeading::class);
    }



}
