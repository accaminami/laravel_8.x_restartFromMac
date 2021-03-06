<?php

declare(strict_types=1);

namespace App\Http\Controllers\Resister;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Contracts\Factory;
use Symfony\Component\HttpFoundation\RedirectResponse;

final class ResisterAction extends Controller
{
    public function __invoke(Factory $factory): RedirectResponse
    {
        return $factory->driver('github')->redirect();
    }
}
