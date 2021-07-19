<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\UserRegistPost;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function create ()
    {
        return view('regist.register');
    }

    //public function store (Request $request)
    public function store (UserRegistPost $request)
    {
        /*
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ],
        [
            'name.required' => '名前は必須だよん',
            'name.string' => '名前はstringだよん',
            'name.max' => '名前は255以下だよん',
            'email.required' => 'メールは必須だよん',
            'email.string' => 'メールはstringだよん',
            'email.email' => 'メールはメールフォーマットだよん',
            'email.max' => 'メールは255以下だよん',
            'email.unique' => 'メールがすでに登録されてるよん',
            'password.required' => 'パスワードは必須だよん',
            'password.string' => 'パスワードはstringだよん',
            'password.confirmed' => 'パスワードが確認用と一致しないよん',
            'password.min' => 'パスワードは8以上だよん',

        ]);
        */

        $rules = [
        ];
        $inputs = $request->all();

        $validator = Validator::make($inputs, $rules);
        $validator->sometimes(
            'name',
            'integer|min:18',
            function ($inputs){
                return $inputs->mailmagazine === 'allow';
            }
        );

        print_r($inputs);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return view('regist.complete', compact('user'));
    }
}
