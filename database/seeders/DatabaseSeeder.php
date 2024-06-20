<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'email' => 'alan.admin@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('AdminAlan1230')
        ]);

        User::factory()->create([
            'email' => 'carlos.admin@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('AdminCarlos1230')
        ]);

        User::factory()->create([
            'email' => 'julio.admin@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('AdminJulio1230')
        ]);

        Admin::factory()->create([
            'name' => 'Alan Snow',
            'user_id' => 1
        ]);

        Admin::factory()->create([
            'name' => 'Carlos MT',
            'user_id' => 2
        ]);

        Admin::factory()->create([
            'name' => 'Yuyo',
            'user_id' => 3
        ]);
    }
}
