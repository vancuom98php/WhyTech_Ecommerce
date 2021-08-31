<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSliderRequest extends FormRequest
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
            'slider_name' => 'bail|required|max:255',
            'slider_desc' => 'bail|required|max:512|min:5',
            'slider_image' => 'bail|required|image',
        ];
    }

    public function messages()
    {
        return [
            'slider_name.required' => 'Tên không được phép để trống',
            'slider_name.max' => 'Tên không được phép quá 255 kí tự',
            'slider_desc.required' => 'Mô tả không được phép để trống',
            'slider_desc.max' => 'Mô tả không được phép quá 512 kí tự',
            'slider_desc.min' => 'Mô tả không được phép dưới 5 kí tự',
            'slider_image.required' => 'Hình ảnh không được phép để trống',
            'slider_image.image' => 'Hình ảnh phải bao gồm các định dạng: .jpeg, .png, .bmp, .gif, .svg, hoặc .webp',
        ];
    }
}
