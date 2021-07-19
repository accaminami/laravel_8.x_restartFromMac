<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use function response;

final class JsonAction extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $response = Response::json(['status' => 'success']);
        //$response = response()->json(['status' => 'success']);

        return $response;
    }
}
