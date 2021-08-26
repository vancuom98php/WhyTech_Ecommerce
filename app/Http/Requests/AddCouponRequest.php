<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCouponRequest extends FormRequest
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
            'coupon_name' => 'bail|required',
            'coupon_code' => 'bail|required',
            'coupon_time' => 'bail|required',
            'coupon_condition' => 'bail|required',
            'coupon_number' => 'bail|required',
        ];
    }

    public function messages()
    {
        return [
            'coupon_name.required' => 'Tên mã không được phép để trống',
            'coupon_code.required' => 'Mã không được phép để trống',
            'coupon_time.required' => 'Số lượng không được phép để trống',
            'coupon_condition.required' => 'Vui lòng chọn loại mã',
            'coupon_number.required' => 'Lượng giảm không được phép để trống',
        ];
    }
}
