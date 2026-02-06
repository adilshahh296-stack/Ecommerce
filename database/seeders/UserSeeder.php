<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user if it doesn't exist
        User::firstOrCreate(
            ['email' => 'admin@brightmax.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@brightmax.com',
                'password' => bcrypt('Admin@12345'),
            ]
        );
    }
}
