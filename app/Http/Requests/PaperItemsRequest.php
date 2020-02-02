<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaperItemsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'paper_id' => 'required',
            'subject_id'=>'required',
            'level_id'=>'required',
            'difficulty'=>'required|in:easy,medium,hard',
            'quantity'=>'required|digits_between:1,100',
        ];
    }
}
