<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resister;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Illuminate\Auth\AuthManager;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\Two\GithubProvider;
use Psr\Log\LoggerInterface;

final class CallbackAction extends Controller
{
    public function __invoke(
        Factory $factory,
        AuthManager $authManager,
        LoggerInterface $log
    ){
        $driver = $factory->driver('github');
        $user = $driver->setHttpClient(
            new Client([
                'handler' => tap(
                    HandlerStack::create(),
                        function (HandlerStack $stack) use ($log){
                            $stack->push(Middleware::log($log, new MessageFormatter()));
                        }
                    )
                ])
        )->user();

        $user = $factory->driver('github')->user();

        $authManager->gurad()->login(
            User::firstOrCreate([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => '',
            ]),
            true
        );

        return redirect('/home');
    }
}
