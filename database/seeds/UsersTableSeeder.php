<?php


class UsersTableSeeder extends \Illuminate\Database\Seeder
{

    public function run() {
        \App\Models\User::create(
            [
                'name' => 'admin',
                'role' => 'admin',
                'email' => 'admin@blog.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123123'),
            ]
        );

        \App\Models\User::create(
            [
                'name' => 'user_1',
                'role' => 'user',
                'email' => 'user_1@blog.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123123'),
            ]
        );

    }
}
