<?php

use Illuminate\Database\Seeder;

class Friend_listsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friend_lists')->insert([
            [
                'user_id' => 1,
                'friend_id' => 2,
            ],
            [
                'user_id' => 1,
                'friend_id' => 3,
            ],
            [
                'user_id' => 2,
                'friend_id' => 1,
            ],
            [
                'user_id' => 3,
                'friend_id' => 1,
            ],
            [
                'user_id' => 4,
                'friend_id' => 5,
            ],
            [
                'user_id' => 5,
                'friend_id' => 4,
            ],
        ]);
    }
}
