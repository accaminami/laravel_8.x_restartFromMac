<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\DatabaseManager;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Str;

final class UserSeeder extends Seeder
{
    public function run(DatabaseManager $manager, Hasher $hasher): void
    {
        $datetime = Carbon::now()->toDateTimeString();

        $userId = $manager->table('users')
            ->insertGetId(
                [
                    'name' => 'laravel_user' . $datetime,
                    'email' => 'mail' . $datetime . '@example.com',
                    'password' => $hasher->make('password'),
                    'created_at' => $datetime
                ]
            );
        $manager->table('user_tokens')
            ->insert(
                [
                    'user_id' => $userId,
                    'api_token' => Str::random(60),
                    'created_at' => $datetime
                ]
            );
    }
}
