<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'login' => 'required|string|unique:users|max:30|min:3|regex:/^[a-z-]+$/i',
            'full_name' => 'required|string|max:255|regex:/[А-Яа-яЁё]/u',
            'email' => 'required|email|string|min:10|max:100|unique:users',
            'password' => 'required|confirmed|min:5',
            'checkbox' => 'accepted'
        ];
    }
}
