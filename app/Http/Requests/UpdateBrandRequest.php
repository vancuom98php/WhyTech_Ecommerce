<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'brand_name' => 'bail|required|max:255',
            'brand_desc' => 'bail|required|max:512|min:5',
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Tên không được phép để trống',
            'brand_name.max' => 'Tên không được phép quá 255 kí tự',
            'brand_desc.required' => 'Mô tả không được phép để trống',
            'brand_desc.max' => 'Mô tả không được phép quá 512 kí tự',
            'brand_desc.min' => 'Mô tả không được phép dưới 5 kí tự',
        ];
    }
}
