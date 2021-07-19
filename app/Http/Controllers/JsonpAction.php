<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use function response;

final class JsonpAction extends Controller
{
    public function index(Request $request): JsonResponse
    {
        //$response = Response::json(['status' => 'success']);
        //$response = response()->json(['status' => 'success']);

        $response = Response::jsonp('callback', ['status' => 'success']);
        //$response = response()->jsonp('callback', ['status' => 'success']);

        return $response;
    }
}
