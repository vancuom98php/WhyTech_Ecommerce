<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'product_name' => 'bail|required|unique:products|max:255',
            'product_price' => 'bail|required|numeric',
            'product_desc' => 'bail|required|max:512|min:5',
            'product_content' => 'required',
            'product_image' => 'bail|required|image',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên không được phép để trống',
            'product_name.unique' => 'Tên sản phẩm đã tồn tại',
            'product_name.max' => 'Tên không được phép quá 255 kí tự',
            'product_price.required' => 'Giá sản phẩm không được để trống',
            'product_price.numeric' => 'Giá sản phẩm phải là số',
            'product_desc.required' => 'Mô tả không được phép để trống',
            'product_desc.max' => 'Mô tả không được phép quá 512 kí tự',
            'product_desc.min' => 'Mô tả không được phép dưới 5 kí tự',
            'product_content.required' => 'Nội dung không được phép để trống',
            'product_image.required' => 'Hình ảnh không được phép để trống',
            'product_image.image' => 'Hình ảnh phải bao gồm các định dạng: .jpeg, .png, .bmp, .gif, .svg, hoặc .webp',
        ];
    }
}
