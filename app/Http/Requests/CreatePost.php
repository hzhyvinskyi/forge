<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|min:3|max:255',
            'image' => 'bail|required|image',
            'body' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'required!!!'
        ];
    }
}
