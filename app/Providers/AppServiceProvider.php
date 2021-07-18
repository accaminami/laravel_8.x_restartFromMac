<?php

namespace App\Providers;

use App\BlowFishEncrypter;
use Illuminate\Encryption\MissingAppKeyException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            'encrypter',
            function ($app) {
                $config = $app->make('config')->get('app');

                return new BlowFishEncrypter($this->parseKey($config));
            }
        );
    }

    protected function parseKey(array $config)
    {
        if (Str::startsWith($key = $this->key($config), $prefix = 'base64:')){
            $key = base64_decode(Str::after($key, $prefix));
        }
        return $key;
    }

    protected function key(array $config)
    {
        return tap(
            $config['key'],
            function ($key){
                if(empty($key)){
                    throw new MissingAppKeyException;
                }
            }
        );
    }
    public function boot()
    {
    }
}
