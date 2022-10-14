<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class FormForgotPasswordRequest extends FormRequest
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
            'email'                 => "required|email|string|exists:users,email",
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
