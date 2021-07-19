<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use function response;

class DownloadAction extends Controller
{
    public function index(Request $request): BinaryFileResponse
    {
        $response = Response::download(storage_path() . '/file.txt');

        //$response = response()->download(storage_path() . '/file.pdf');

        //$response = response()->download(
        //    storage_path() . '/file.pdf',
        //    'filename.pdf',
        //    [
        //        'content-type' => 'application/pdf',
        //    ]
        //);
        return $response;
    }
}
