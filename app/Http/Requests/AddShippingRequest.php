<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddShippingRequest extends FormRequest
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
            'shipping_email' => 'bail|required|email|max:255',
            'shipping_name' => 'bail|required|string|max:255',
            'shipping_phone' => 'bail|required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'shipping_address' => 'bail|required|max:255',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'shipping_email.required' => 'Email không được để trống',
            'shipping_email.email' => 'Email phải có dạng email@domain.com',
            'shipping_email.max' => 'Email tối đa 255 ký tự',
            'shipping_name.required' => 'Tên người nhận không được để trống',
            'shipping_name.string' => 'Tên người nhận phải là kiểu ký tự',
            'shipping_name.max' => 'Tên người nhận tối đa 255 ký tự',
            'shipping_phone.required' => 'Số điện thoại không được để trống',
            'shipping_phone.regex' => 'Số điện thoại không đúng định dạng',
            'shipping_phone.not_regex' => 'Số điện thoại không đúng định dạng',
            'shipping_phone.min' => 'Số điện thoại ít nhất 9 số',
            'shipping_address.required' => 'Địa chỉ nhận hàng không được để trống',
            'shipping_address.max' => 'Địa chỉ nhận tối đa 255 ký tự',
            'province.required' => 'Vui lòng chọn Tỉnh/Thành phố cụ thể',
            'district.required' => 'Vui lòng chọn Quận/Huyện cụ thể',
            'ward.required' => 'Vui lòng chọn Xã/Phường cụ thể',
        ];
    }
}
