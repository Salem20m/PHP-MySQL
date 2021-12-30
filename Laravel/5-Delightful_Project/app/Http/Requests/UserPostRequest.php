<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
            "name" => "required|max:100",
            "email" => "required|unique:users|email|max:100",
            "password" => "required|max:16"
        ];
    }

    public function messages()
    {
        return [
            "name.max" => "Your name is too long, please change it! Max of 100 characters",
            "email.unique" => "Your email already exist in our database!",
            "email.max" => "Your email is too long, It should be less than 100 characters!",
            "password.max" => "Your password is too long, It should be less than 16 characters!"
        ];
    }
}
