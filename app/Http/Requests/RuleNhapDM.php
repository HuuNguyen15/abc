<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleNhapDM extends FormRequest
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
            'category_product_name' => ['required', 'min:3', 'max:255'],
            'category_product_desc' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'category_product_name.required' => 'Tên danh mục không được để trống',
            'category_product_name.min' => 'Tên danh mục phải có ít nhất 3 ký tự',
            'category_product_name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
            'category_product_desc.required' => 'Mô tả danh mục không được để trống',

        ];
    }
}