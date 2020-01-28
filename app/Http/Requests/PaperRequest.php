<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PaperRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100|min:3|regex:/^[a-z\d\-_\s]+$/i'
        ];
    }
}
