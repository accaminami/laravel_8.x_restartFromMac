<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必須だよんUserRegistPost',
            'name.string' => '名前はstringだよんUserRegistPost',
            'name.max' => '名前は255以下だよんUserRegistPost',
            'email.required' => 'メールは必須だよんUserRegistPost',
            'email.string' => 'メールはstringだよんUserRegistPost',
            'email.email' => 'メールはメールフォーマットだよんUserRegistPost',
            'email.max' => 'メールは255以下だよんUserRegistPost',
            'email.unique' => 'メールがすでに登録されてるよんUserRegistPost',
            'password.required' => 'パスワードは必須だよんUserRegistPost',
            'password.string' => 'パスワードはstringだよんUserRegistPost',
            'password.confirmed' => 'パスワードが確認用と一致しないよんUserRegistPost',
            'password.min' => 'パスワードは8以上だよんUserRegistPost',
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ];
    }
}
