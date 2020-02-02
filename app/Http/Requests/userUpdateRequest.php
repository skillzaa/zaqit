<?php

namespace App\Http\Requests;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class userUpdateRequest extends FormRequest
{

    public function authorize()
    {
        if(Auth::user()->role == "admin"){
            return true;
        }else {
            return false;
        }
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:subjects|max:20|min:3|regex:/^[a-z\d\-_\s]+$/i',
            'role'=> 'required|in:supervisor,teacher,student',
            'enabled'=> 'required|in:1,0',
            'testsAllowed'=> 'required|integer|min:0',
            'subject_id' => 'required|exists:subjects,id',
        ];
    }
}
