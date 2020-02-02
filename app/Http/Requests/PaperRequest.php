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
            'name' => 'required|max:100|min:5|regex:/^[a-z\d\-_\s]+$/i',
            'display_heading_id'=> 'required|exists:display_headings,id',
            'minutes'=>'required'
        ];
    }
}
