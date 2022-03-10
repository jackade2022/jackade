<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true ;
    }

    public function rules()
    {
        return [
            'email' =>   "required|exists:users,email|email" ,
            'password' => 'required|string'
        ];
    }
}
