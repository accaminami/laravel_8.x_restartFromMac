<?php

namespace App\Listeners;

use App\Events\PublishProcessor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageSubscriber
{
    public function __construct()
    {
    }

    public function handle(PublishProcessor $event)
    {
        //var_dump($event->getInt());
        print($event->getInt());
    }
}
