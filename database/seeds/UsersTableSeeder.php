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
            'name' => 'Mishanea',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'avatar' => 'user.png',
            'tag' => '',
            'online' => '0',
        ]);
    }
}
