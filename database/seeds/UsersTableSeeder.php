<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Mishanea',
                'role_id' => 1,
                'email' => 'misha@gmail.com',
                'password' => bcrypt('misha'),
                'avatar' => 'user.png',
                'tag' => '',
                'online' => '0',
            ],
            [
                'name' => 'Admin',
                'role_id' => 2,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'avatar' => 'user.png',
                'tag' => '',
                'online' => '0',
            ],
            [
                'name' => 'Moderator',
                'role_id' => 3,
                'email' => 'moderator@gmail.com',
                'password' => bcrypt('moderator'),
                'avatar' => 'user.png',
                'tag' => '',
                'online' => '0',
            ],
            [
                'name' => 'User',
                'role_id' => 4,
                'email' => 'user@gmail.com',
                'password' => bcrypt('user'),
                'avatar' => 'user.png',
                'tag' => '',
                'online' => '0',
            ],
            [
                'name' => 'Translate',
                'role_id' => 5,
                'email' => 'translate@gmail.com',
                'password' => bcrypt('translate'),
                'avatar' => 'user.png',
                'tag' => '',
                'online' => '0',
            ],
        ]);
    }
}
