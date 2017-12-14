<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
    //tên function ràng buộc
    public function rules()
    {
        return [
            'txtCateName' => 'required|unique:cate,name'
            //txtCateName:tên input cần Kt
            //required:ko được để trống
            //unique:ko được trùng
            //cate: tên table
            //name tên trường trong table bắt buộc nhập
        ];
    }
    public function messages(){
        return[
            'txtCateName.required' => 'Please Enter Name Category',//thông báo theo từng thuộc tính
            'txtCateName.unique' => 'This Name Category Is Exist'
        ];
    }
}
