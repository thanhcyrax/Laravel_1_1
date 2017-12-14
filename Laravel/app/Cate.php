<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{ 
    protected $table = 'cate';//tên table giống db
    protected $fillable = ['name' ,'alias' ,'order' ,'parent_id' ,'keywords' ,'description'];
     //các trường cần sử dụng để truy xuất 
    public $timestamps  = false;//mặc định khi ta tạo db bằng tay ko xài code Laravel
    public function product(){//tên table cần quan hệ
    	return $this->hasMany('App\Product');//tạo quan hệ ở mức cha
    }
}
