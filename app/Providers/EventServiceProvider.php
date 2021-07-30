<?php

namespace App\Providers;

use App\Events\PublishProcessor;
use App\Listeners\MessageQueueSubscriber;
use App\Listeners\MessageSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            //  SendEmailVerificationNotification::class,
            'App\Listeners\RegisteredListener',
        ],
        //PublishProcessor::class => [
        //    MessageSubscriber::class,
        //],
        PublishProcessor::class => [
            MessageSubscriber::class,
            MessageQueueSubscriber::class,
        ],
    ];

    public function boot()
    {
        parent::boot();

        //Facadeを利用する例
        //Event::listen(
        //    PublishProcessor::class,
        //    MessageSubscriber::class
        //);

        //フレームワークのDIコンテナにアクセスする場合
        //$this->app['events']->listen(
        //    PublishProcessor::class,
        //    MessageSubscriber::class
        //);
    }
}
