<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Captcha;

class AddCustomerRequest extends FormRequest
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
            'customer_name' => 'bail|required|string|max:255',
            'customer_email' => 'bail|required|email|max:255|unique:customers',
            'customer_phone' => 'bail|required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9|unique:customers',
            'customer_password' => 'bail|required|string|min:8',
            'customer_confirm_password' => 'bail|required_with:customer_password|same:customer_password',
        ];
    }
}
