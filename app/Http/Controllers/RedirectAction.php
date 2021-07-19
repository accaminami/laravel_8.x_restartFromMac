<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use function response;

class RedirectAction extends Controller
{
    public function index(Request $request): RedirectResponse
    {
        $response = Response::redirectTo('/');
        //$response = response()->redirectTo('/');
        //$response = redirect('/');
        //$response = redirect('/')
        //    ->withInput($request->all())
        //    with('error', 'validation error.');

        return $response;
    }
}
