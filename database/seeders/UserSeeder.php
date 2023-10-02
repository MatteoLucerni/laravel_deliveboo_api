<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@boolean.it',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'john_doe',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'jane_smith',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'user123',
                'email' => 'user123@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'test_user',
                'email' => 'test.user@example.com',
                'password' => bcrypt('password'),
            ],
        ];



        foreach ($users as $user) {
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->save();
        }
    }
}
