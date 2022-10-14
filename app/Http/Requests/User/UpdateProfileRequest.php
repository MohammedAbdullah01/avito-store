<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
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
            'name'     => "required|min:3|max:20|string",
            'email'    => "required|email|string|unique:users,email,". Auth::guard('web')->id(),
            'phone'    => "nullable|string",
            'gander'   => "nullable|in:male,female",
            'avatar'   => "nullable|mimes:jpg,jpeg,png|max:5048|dimensions:min_width=300 , min_height=300 , max_width=2000 , max_height=2000",
            'about'    => "required|between:10,255",
            'location' => "nullable|url|string",
        ];
    }
}