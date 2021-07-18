<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\UserRegistPost;

class UserController extends Controller
{
    //引数でRequestクラスのインスタンスを渡す
    //public function register(Request $request)

    //引数でUserRegistクラスのインスタンスを渡す
    public function register(Request $request)
    {
        //インスタンスに対して値を問い合わせる
        $name = $request->get('name');
        $age = $request->get('age');
        //$xxx = $request->get('xxx');
        //$yyy = $request->get('yyy');
        //$zzz = $request->get('zzz');
    }
}
