<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_price'=>'bail|required|numeric',
            'category_id'=>'required',
            'product_content'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => 'Tên không được bỏ trống',
            'product_name.unique' => 'Tên không được trùng',
            'product_name.max' => 'Tên không được nhiều hơn 255 ký tự',
            'product_price.required' => 'Giá không được bỏ trống',
            'product_price.numeric' => 'Giá sản phẩm phải là số',
            'category_id.required' => 'Danh mục không được bỏ trống',
            'product_content.required' => 'nội dung không được bỏ trống',


        ];
    }
}
