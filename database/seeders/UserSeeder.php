<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'owner',
                'email' => 'owner@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'owner',
                'is_active' => 1,
            ],
            [
                'name' => 'operator',
                'email' => 'operator@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => 'operator',
                'is_active' => 0,
            ]
        ]);
    }
}
