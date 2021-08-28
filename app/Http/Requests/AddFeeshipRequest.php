<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFeeshipRequest extends FormRequest
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
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'fee_feeship' => 'bail|required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'province.required' => 'Tỉnh/Thành phố không được để trống',
            'district.required' => 'Quận/Huyện không được để trống',
            'ward.required' => 'Xã/Phường không được để trống',
            'fee_feeship.required' => 'Phí vận chuyển không được để trống',
            'fee_feeship.numeric' => 'Phí vận chuyển phải là số',
        ];
    }
}
