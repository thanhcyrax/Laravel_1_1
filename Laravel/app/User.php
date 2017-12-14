<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'level'
    ];//các trường cần sử dụng để truy xuất 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',//thường tạo tự động
    ];
    public function product(){//tên table cần quan hệ
        return $this->hasMany('App\Product');//tạo quan hệ ở mức cha
    }
}
