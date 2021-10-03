<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_name' => 'bail|required|max:255',
            'product_price' => 'bail|required|numeric',
            'product_cost' => 'bail|required|numeric',
            'product_quantity' => 'bail|required|numeric',
            'product_desc' => 'bail|required|max:512|min:5',
            'product_content' => 'bail|required',
            'product_image' => 'bail|image',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên không được phép để trống',
            'product_name.max' => 'Tên không được phép quá 255 kí tự',
            'product_price.required' => 'Giá bán không được để trống',
            'product_price.numeric' => 'Giá bán phải là số',
            'product_cost.required' => 'Giá gốc không được để trống',
            'product_cost.numeric' => 'Giá gốc phải là số',
            'product_quantity.required' => 'Số lượng không được để trống',
            'product_quantity.numeric' => 'Số lượng phải là số cụ thể',
            'product_desc.required' => 'Mô tả không được phép để trống',
            'product_desc.max' => 'Mô tả không được phép quá 512 kí tự',
            'product_desc.min' => 'Mô tả không được phép dưới 5 kí tự',
            'product_content.required' => 'Nội dung không được phép để trống',
            'product_image.image' => 'Hình ảnh phải bao gồm các định dạng: .jpeg, .png, .bmp, .gif, .svg, hoặc .webp',
        ];
    }
}
