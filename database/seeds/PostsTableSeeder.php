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
            ],
            [
                'user_id' => 2,
                'topic_id' => 1,
                'body' => 'Al doilea post',
            ],
            [
                'user_id' => 3,
                'topic_id' => 1,
                'body' => 'Al treilea post',
            ],
            [
                'user_id' => 1,
                'topic_id' => 2,
                'body' => 'Al patrulea post',
            ],
            [
                'user_id' => 4,
                'topic_id' => 1,
                'body' => 'Al cincilea post',
            ],
            [
                'user_id' => 2,
                'topic_id' => 2,
                'body' => 'post topic Nissan X-Trail',
            ],
            [
                'user_id' => 2,
                'topic_id' => 3,
                'body' => 'post topic Ford',
            ],
            [
                'user_id' => 1,
                'topic_id' => 4,
                'body' => 'post topic Iphone Xr',
            ],
            [
                'user_id' => 3,
                'topic_id' => 5,
                'body' => 'post topic Galaxy S25',
            ],
            [
                'user_id' => 4,
                'topic_id' => 6,
                'body' => 'post topic Ferrari',
            ],
            [
                'user_id' => 1,
                'topic_id' => 7,
                'body' => 'post topic Audi',
            ],
            [
                'user_id' => 4,
                'topic_id' => 8,
                'body' => 'post topic Lambo',
            ],
            [
                'user_id' => 3,
                'topic_id' => 9,
                'body' => 'post topic furi',
            ],
            [
                'user_id' => 2,
                'topic_id' => 10,
                'body' => 'post topic microbuse',
            ],
            [
                'user_id' => 2,
                'topic_id' => 11,
                'body' => 'post topic busuri',
            ],
            [
                'user_id' => 1,
                'topic_id' => 12,
                'body' => 'post topic amioane mici',
            ],
        ]);
    }
}
