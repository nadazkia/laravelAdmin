<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            // HARUS SAMA DENGAN USER DI APP/MODELS
            [
                'nama' => 'Operator',
                'email' => 'operator@gmail.com',
                'role' => 'operator',
                'password' => Hash::make('admin')
            ],
            [
                'nama' => 'Keuangan',
                'email' => 'keuangan@gmail.com',
                'role' => 'keuangan',
                'password' => Hash::make('keuangan')
            ],
            [
                'nama' => 'Marketing',
                'email' => 'marketing@gmail.com',
                'role' => 'marketing',
                'password' => Hash::make('marketing')
            ],
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        };
    }
}
