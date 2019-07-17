<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'topic_id' => 1,
                'body' => 'Primul post',
                'new' => false,
            ],
            [
                'user_id' => 2,
                'topic_id' => 1,
                'body' => 'Al doilea post',
                'new' => true,
            ],
            [
                'user_id' => 3,
                'topic_id' => 1,
                'body' => 'Al treilea post',
                'new' => false,
            ],
            [
                'user_id' => 1,
                'topic_id' => 2,
                'body' => 'Al patrulea post',
                'new' => true,
            ],
            [
                'user_id' => 4,
                'topic_id' => 1,
                'body' => 'Al cincilea post',
                'new' => false,
            ],
        ]);
    }
}
