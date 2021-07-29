<?php

declare(strict_types=1);

namespace App\DataProvider;

use stdClass;

interface UserTokenProviderInterface
{
    public function rerrieveUserByToken(
        string $token,
    ): ?stdClass;
}
