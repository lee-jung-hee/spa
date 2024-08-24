<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password', //php artisan migrate:refresh --seed를 해도 비번이 password로 안되서 일단 이렇게 해둠
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
            'password' => 'password'
        ]);
        \App\Models\Listing::factory(10)->create([
            'by_user_id' => 1
        ]);
        \App\Models\Listing::factory(10)->create([
            'by_user_id' => 2
        ]);
    }
}
