<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodolistRequest extends FormRequest
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
        $id = $this->todolist;
        return [
            'title' => 'required|max:30',
            'container' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required, at least fill a character',
            'container.required' => 'No note? i know you\'ll be missing out something so please, fill a characters'
        ];
    }

}
