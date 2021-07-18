<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

final class PayLoadActionController
{
    //引数でRequestクラスのインスタンスを渡す
    public function __invoke(Request $request)
    {
        //$result_get と $result_json には同じ値が入る
        $result_get = $request->get('nested');
        $result_json = $request->json('nested');
    }
}
