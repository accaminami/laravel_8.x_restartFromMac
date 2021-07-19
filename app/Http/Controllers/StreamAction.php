<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

use function flush;
use function ob_flush;
use function rand;
use function usleep;

final class StreamAction extends Controller
{
    public function index(): StreamedResponse
    {
        return response()->stream(
            function(){
                $count = 0;
                while (true){
                    $count++;
                    if($count > 100){
                        break;
                    }
                    echo 'data: ' .rand(1,100) . "\n";
                    echo 'count: ' . $count . "\n\n";
                    ob_flush();
                    flush();
                    usleep(200000);
                }
            },
            Response::HTTP_OK,
            [
                'content-type' => 'text/event-stream',
                'X-Accel-Buffering' => 'no',
                'Cache-Control' => 'no-cache',
            ]
        );
    }
}
