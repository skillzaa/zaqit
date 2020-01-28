<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paperitem extends Model
{
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
