<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Company::factory()->create([
            'company_name' => 'Nestle',
        ]);

        \App\Models\User::factory()->create([
            'user_type' => 'USER',
            'first_name' => 'User',
            'last_name' => 'User',
            'company_id' => 1,
            'email' => 'user',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'init_user' => 0
        ]);

        \App\Models\User::factory()->create([
            'user_type' => 'ADMIN',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'company_id' => null,
            'email' => 'admin',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'init_user' => 0
        ]);
    }
}
