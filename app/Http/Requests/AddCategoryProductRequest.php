<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryProductRequest extends FormRequest
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
            'category_name' => 'bail|required|unique:category_products|max:255|min:10',
            'category_desc' => 'bail|required|max:512|min:10',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Tên không được phép để trống',
            'category_name.unique' => 'Tên không được phép trùng',
            'category_name.max' => 'Tên không được phép quá 255 kí tự',
            'category_name.min' => 'Tên không được phép dưới 10 kí tự',
            'category_desc.required' => 'Mô tả không được phép để trống',
            'category_desc.max' => 'Mô tả không được phép quá 512 kí tự',
            'category_desc.min' => 'Mô tả không được phép dưới 10 kí tự',
        ];
    }
}
