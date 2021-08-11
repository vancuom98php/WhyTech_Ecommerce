<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryProductRequest extends FormRequest
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
            'category_name' => 'bail|required|max:255',
            'category_desc' => 'bail|required|max:512|min:5',
            'meta_keywords' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Tên không được phép để trống',
            'category_name.max' => 'Tên không được phép quá 255 kí tự',
            'category_desc.required' => 'Mô tả không được phép để trống',
            'category_desc.max' => 'Mô tả không được phép quá 512 kí tự',
            'category_desc.min' => 'Mô tả không được phép dưới 5 kí tự',
            'meta_keywords.required' => 'Từ khóa không được phép để trống',
        ];
    }
}
