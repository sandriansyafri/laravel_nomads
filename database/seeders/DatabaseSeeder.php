<?php

namespace Database\Seeders;

use App\Models\TravelPackage;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'SANDRIAN SYAFRI',
            'username' => 'sandriansyafri',
            'roles' => 'ADMIN',
            'email' => 'sandriansyafri@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'FIKRI',
            'username' => 'fikrialgifahri',
            'roles' => 'USER',
            'email' => 'fikri@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
