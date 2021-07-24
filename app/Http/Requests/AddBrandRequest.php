<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBrandRequest extends FormRequest
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
            'brand_name' => 'bail|required|unique:brands|max:255|min:10',
            'brand_desc' => 'bail|required|max:512|min:10',
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Tên không được phép để trống',
            'brand_name.unique' => 'Tên không được phép trùng',
            'brand_name.max' => 'Tên không được phép quá 255 kí tự',
            'brand_name.min' => 'Tên không được phép dưới 10 kí tự',
            'brand_desc.required' => 'Mô tả không được phép để trống',
            'brand_desc.max' => 'Mô tả không được phép quá 512 kí tự',
            'brand_desc.min' => 'Mô tả không được phép dưới 10 kí tự',
        ];
    }
}
