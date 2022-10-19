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
            'address*.billing.address'     => 'required|string|max:255',
            'address*.shipping.firstName'  => 'nullable|alpha|exists:users,firstName',
            'address*.shipping.lastName'   => 'nullable|alpha|exists:users,lastName',
            'address*.shipping.email'      => 'nullable|email|exists:users,email',
            'address*.shipping.phone'      => 'nullable|numeric',
            'address*.shipping.country'    => 'nullable|alpha',
            'address*.shipping.city'       => 'nullable|alpha_dash',
            'address*.shipping.address'    => 'nullable|string|max:255',
            'payment_method'               => 'nullable|in:CashOnDelivery,payPal',
        ];
    }
}
