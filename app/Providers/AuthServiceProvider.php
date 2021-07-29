<?php

namespace App\Providers;

use App\Foundation\Auth\CacheUserProvider;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use App\Foundation\Auth\UserTokenProvider;
use App\DataProvider\UserToken;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        //
        $this->app->make('auth')->provider(
            'user_token',
            function (Application $app, array $config){
                return new UserTokenProvider(new userToken($app->make('db')));
            }
        );

        //
        $this->app->make('auth')->provider(
            'cache_eloquent',
            function (Application $app, array $config){
                return new CacheUserProvider(
                    $app->make('hash'),
                    $config['model'],
                    $app->make('cache')->driver()
                );
            }
        );
    }
}
