<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticlePayloadAction extends Controller
{
    public function index(Request $request)
    {
        $resource = new ArticleResource([
            'id' => 1,
            'title' => 'Lravel REST API',
            'comments' => [
                [
                'id' => 2134,
                'body' => 'awesome!',
                'user_id' => 133345,
                'user_name' => 'Appliation Developer',
            ]
        ],
        'user_id' => 13255,
        'user_name' => 'User1'
        ]);
        return $resource->response($request)
            ->header('content-type', 'application/hal+json');
    }
}
