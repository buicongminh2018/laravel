<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'coupon_code' => 'bail|required|unique:coupons',
            'coupon_name'=>'required',
            'coupon_function'=>'required',
            'coupon_number'=>'required'

        ];
    }
    public function messages()
    {
        return [
            'coupon_code.required' => 'Mã giảm giá không được bỏ trống',
            'coupon_code.unique' => 'Mã giảm giá không được trùng',
            'coupon_name.required' => 'Tên giảm giá không được bỏ trống',
            'coupon_function.required' => 'Phương thức giảm giá không được bỏ trống',
            'coupon_number.required' => 'giá giảm không được bỏ trống',


        ];
    }
}
