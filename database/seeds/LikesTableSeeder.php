<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            [
                'user_id' => 1,
                'post_id' => 1,
            ],
            [
                'user_id' => 1,
                'post_id' => 2,
            ],
            [
                'user_id' => 2,
                'post_id' => 3,
            ],
            [
                'user_id' => 3,
                'post_id' => 4,
            ],
            [
                'user_id' => 2,
                'post_id' => 4,
            ],
        ]);
    }
}
