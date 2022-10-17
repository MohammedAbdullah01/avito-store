<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address*.billing.firstName'   => 'required|alpha|exists:users,firstName',
            'address*.billing.lastName'    => 'required|alpha|exists:users,lastName',
            'address*.billing.email'       => 'required|email|exists:users,email',
            'address*.billing.phone'       => 'required|numeric',
            'address*.billing.country'     => 'required|alpha',
            'address*.billing.city'        => 'required|alpha_dash',
            'address*.billing.address'     => 'required|string',
            'address*.billing.postAlCode'  => 'nullable|numeric',
            'payment_method'               => 'nullable|in:CashOnDelivery,payPal',
        ];
    }
}
