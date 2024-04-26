<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create(
            [
                'email' => 'super-admin@gmail.com',
                'password' => Hash::make('rahasia'),
                'role' => 'super-admin',
                'name' => 'super-admin'
            ],
        );
        User::create(
            [
                'email' => 'admin@gmail.com',
                'password' => Hash::make('rahasia'),
                'role' => 'admin',
                'name' => 'admin'
            ] 
        );
    }
}
