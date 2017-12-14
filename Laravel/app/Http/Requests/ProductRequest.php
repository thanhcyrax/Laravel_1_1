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
            'slt_parent' => 'required',
            'txtName' => 'required|unique:product,name',
            'fImages' => 'required|image',//image: KT xem có phải hình hay ko

        ];
    }
    public function messages(){
        return[
            'slt_parent.required' => 'Please Choose Category',
            'txtName.required' => 'Please Enter Name Product',//thông báo theo từng thuộc tính
            'txtName.unique' => 'Product Name Is Exist',
            'fImages.required' => 'Product Choose Images',
            'fImages.image' => 'This File Is Not Images'
        ];
    }
}
