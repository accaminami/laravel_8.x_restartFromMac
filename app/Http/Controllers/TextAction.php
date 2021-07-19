<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Response;

use function response;

class TextAction extends Controller
{
    public function index(Request $request): IlluminateResponse
    {
        $response = Response::make('hello world1');
        /*
        //
        //        $response = response('hello world2');
        //
        //        $response = response(
        //        'hello world3',
        //            IlluminateResponse::HTTP_OK,
        //            [
        //                'content-type' => 'text/plain'
        //            ]
        //        );
        */
        return $response;
    }
}
