<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends \Illuminate\Database\Seeder
{

    public function run() {
        User::create(
            [
                'name' => 'admin',
                'role' => 'admin',
                'email' => 'admin@ltdd.cm',
                'password' => Hash::make('123123'),
            ]
        );

        User::create(
            [
                'name' => 'user1',
                'role' => 'user',
                'email' => 'user1@ltdd.cm',
                'password' => Hash::make('123123'),
            ]
        );

    }
}
