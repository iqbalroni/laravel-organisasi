<?php

namespace Database\Seeders;

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
        \App\Models\User::insert([
            'name' => 'admin',
            'email' => 'admin123@gmail.com',
            'logo' => 'default.png',
            'level' => '1',
            'password' => Hash::make("bismillah"),
        ]);

        \App\Models\User::insert([
            'name' => 'pramuka',
            'email' => 'pramuka@gmail.com',
            'logo' => 'default.png',
            'level' => '2',
            'password' => Hash::make("bismillah"),
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
