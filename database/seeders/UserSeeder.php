<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Santosh',
            'email' => 'santosh@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@merojob.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
