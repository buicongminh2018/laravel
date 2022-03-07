<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'customer_email' => 'bail|required|unique:customers|max:255',
            'customer_name'=>'required',
            'customer_password'=>'required',
            'customer_phone'=>'required',
            'customer_address'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'customer_email.required' => 'Email không được bỏ trống',
            'customer_email.unique' => 'Email đã tồn tại',
            'customer_email.max' => 'Tên Email không được nhiều hơn 255 ký tự',
            'customer_name.required' => 'Họ và tên không được bỏ trống',
            'customer_password.required' => 'Mật khẩu không được bỏ trống',
            'customer_phone.required' => 'SĐT không được bỏ trống',
            'customer_address.required' => 'Địa chỉ không được bỏ trống',
        ];
    }
}
