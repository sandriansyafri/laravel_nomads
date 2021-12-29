<?php

namespace Database\Seeders;

use App\Models\TravelPackage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'SANDRIAN SYAFRI',
            'username' => 'sandriansyafri',
            'roles' => 'ADMIN',
            'email' => 'sandriansyafri@gmail.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'user1',
            'username' => 'user1',
            'roles' => 'USER',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
