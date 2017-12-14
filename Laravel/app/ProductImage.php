<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_image';//tên table giống db
    protected $fillable = ['image' ,'product_id'];
    //các trường cần sử dụng để truy xuất 
    public $timestamps = false;//mặc định
    public function product(){//tên table cần quan hệ
    	return $this->belongTo('App\Product');//tạo quan hệ ở mức con
    }
    public function authorize(){
        return true;
    }
}
