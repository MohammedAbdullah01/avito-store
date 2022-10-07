<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductStoreRequest extends FormRequest
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
            'title'         => "required|alpha_dash|min:4|max:30|unique:products,title",
            'description'   => 'required|string|between:5,100',
            'price'         => 'required|numeric',
            'sale_price'    => 'nullable|numeric',
            'quantity'      => 'required|numeric',
            'size'          => 'required|string|max:50',
            'color'         => 'required|string|max:50',
            'main_picture'  => "required|image|mimes:jpg,jpeg,png|max:5048|dimensions:min_width=300 , min_height=300 , max_width=2000 , max_height=2000",
            'sub_images.*'  => 'image|mimes:jpg,jpeg,png|max:5048|dimensions:min_width=300 , min_height=300 , max_width=2000 , max_height=2000',
            'sub_images'    => 'required|array|size:3',
            'category_id'   => 'required|exists:categories,id|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => __('category')
        ];
    }

}

    // public function messages()
    // {
    //     return [
    //         'title.required' => 'هذا الحقل مطلوب :attribute',
    //         'sub_images.*.mimes' => 'هذا الحقل مطلوب :attribute'
    //     ];
    // }

    // public function attributes()
    // {
    //     return [
    //         'title' => __('اى حاجه بالعربي ')
    //     ];
    // }



    // 'photo' => [
    //     'required',
    //     File::image()
    //         ->min(1024)
    //         ->max(12 * 1024)
    //         ->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500)),
    // ],

