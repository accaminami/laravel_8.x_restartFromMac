<?php

namespace App\Providers;

use App\Foundation\Auth\CacheUserProvider;
use Illuminate\Foundation\Application;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        //
        $this->registerPolicies();
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
