<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'bail|required|unique:categories|max:255',
        ];
    }
    public function messages()
    {
        return [
            'category_name.required' => 'Tên danh mục sản phẩm không được bỏ trống',
            'category_name.unique' => 'Tên danh mục sản phẩm không được trùng',
            'category_name.max' => 'Tên danh mục sản phẩm không được nhiều hơn 255 ký tự',
        ];
    }
}
