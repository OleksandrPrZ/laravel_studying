<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'mobile322@gmail.com',
            'password' => Hash::make('gfhjkm10'), // Шифруємо пароль
        ]);

        $user->assignRole('admin');

    }
}
