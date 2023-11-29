<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            // HARUS SAMA DENGAN USER DI APP/MODELS
            [
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
            [
                'nama' => 'Vendor',
                'email' => 'vendor@gmail.com',
                'password' => Hash::make('vendor'),
                'role' => 'vendor',
            ],
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        };
    }
}
