<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question' => 'required',
            'option1'=>'required',
            'option2'=>'required',
            'option3'=>'required',
            'option4'=>'required',
            'correctOption'=>'required|digits_between:1,4',
            'subject_id'=>'required',
            'level_id'=>'required'
        ];
    }
}
