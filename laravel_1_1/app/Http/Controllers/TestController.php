<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
   
    public function showProfile($id){
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}