<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AuthorizedUser;

class AuthorizedUserSeeder extends Seeder
{
    public function run(): void
    {
        AuthorizedUser::create([
            'name' => 'Giri',
            'telegram_id' => '6647173713',
            'is_active' => true,
        ]);
    }
}
