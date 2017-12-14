<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product'; //tên table giống db
    protected $fillable = ['name' ,'alias' ,'price' ,'intro' ,'content' ,'image' ,'keywords' ,'description' ,'user_id' ,'cate_id'];
    //các trường cần sử dụng để truy xuất 
    public $timestamps = false;//mặc định
    public function cate(){//tên table cần quan hệ
    	return $this->belongTo('App\Cate');//tạo quan hệ ở mức con
    }
    public function user(){ //tên table cần quan hệ
    	return $this->belongTo('App\User');//tạo quan hệ ở mức con
    }
    public function productImage(){//tên table cần quan hệ
    	return $this->hasMany('App\ProductImage');//tạo quan hệ ở mức cha
    }
}
