<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleNhapSP extends FormRequest
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
            'product_name' => ['required', 'min:10', 'max:255'],
            'product_price' => 'required|numeric|gt:0',

        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_name.min' => 'Tên sản phẩm phải có ít nhất 10 ký tự',
            'product_name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự',
            'product_price.required' => 'Giá sản phẩm không được để trống',
            'product_price.numeric' => 'Giá sản phẩm phải là số',
            'product_price.gt' => 'Giá sản phẩm phải lớn hơn 0',

        ];
    }
}
