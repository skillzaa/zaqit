<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Subject;

class User extends Authenticatable
{
use Notifiable;

protected $fillable = [
    'name', 'email', 'password','role','enabled','testsAllowed','subject_id','email_verified_at','remember_token'
];
protected $hidden = [
    'password', 'remember_token',
];

protected $casts = [
    'email_verified_at' => 'datetime',
];

    public function subject(){
    return $this->belongsTo(Subject::class);
}

//......................................
}//class
