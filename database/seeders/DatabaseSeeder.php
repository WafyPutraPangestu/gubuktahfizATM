<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'koortahfidz@gmail.com', // sesuaikan
            'password' => Hash::make('gubuktahfidzrjg'), // WAJIB ganti sebelum production
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
