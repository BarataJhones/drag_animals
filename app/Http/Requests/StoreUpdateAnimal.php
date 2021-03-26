<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAnimal extends FormRequest
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
            'name' => 'required|unique:animals,name|min:3|max:20',
            'image' => ['required', 'image'],
            'audio' =>'required|mimes:mpeg,mp3',
            'order' => 'required|min:3|max:20',
            'class' => 'required|min:3|max:20',
            'habitat' => 'required|min:3|max:20',
            'brazilian' => 'required|min:3|max:20',
        ];
    }
}
