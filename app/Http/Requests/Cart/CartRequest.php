<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
        return
            [
                'product_id'         => ['required', 'integer', 'exists:products,id'],
                'product_quantity'   => ['integer', 'min:1', 'max:15'],
                'size'               => ['required' , 'string'],
                'color'              => ['required', 'string'],
            ];
    }
}
