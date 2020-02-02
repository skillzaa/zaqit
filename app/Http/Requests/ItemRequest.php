<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:subjects|max:100|min:2|regex:/^[a-z\d\-_\s]+$/i'
        ];
    }
}
