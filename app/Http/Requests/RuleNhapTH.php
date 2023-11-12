<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleNhapTH extends FormRequest
{
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
            'brand_product_name' => ['required', 'min:3', 'max:255'],
            'brand_product_desc' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'brand_product_name.required' => 'Tên danh mục không được để trống',
            'brand_product_name.min' => 'Tên danh mục phải có ít nhất 3 ký tự',
            'brand_product_name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
            'brand_product_desc.required' => 'Mô tả danh mục không được để trống',

        ];
    }
}
