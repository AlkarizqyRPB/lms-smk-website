<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
            [
                'username' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Encrypt the password
                'photo' => null,
                'phone' => '082594874321',
                'address' => '123 Admin Street',
                'role' => 'admin',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Teacher User',
                'email' => 'teacher@example.com',
                'password' => Hash::make('password'), // Encrypt the password
                'photo' => null,
                'phone' => '0987654321',
                'address' => '456 Teacher Avenue',
                'role' => 'teacher',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Regular User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'), // Encrypt the password
                'photo' => null,
                'phone' => '081222599599',
                'address' => '789 User Lane',
                'role' => 'user',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
