<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataRegisterRequest extends FormRequest
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
            'name'                  => 'required|alpha|unique:suppliers,name',
            'email'                 => 'required|email|string|unique:suppliers,email',
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
