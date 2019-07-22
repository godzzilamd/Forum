<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            [
                'section_id' => 1,
                'title' => 'Audi a6',
                'body' => 'This is body',
                'post_it' => 0,
            ],
            [
                'section_id' => 1,
                'title' => 'Nissan X-Trail',
                'body' => 'This is body',
                'post_it' => 0,
            ],
            [
                'section_id' => 2,
                'title' => 'Ford',
                'body' => 'This is body',
                'post_it' => 1,
            ],
            [
                'section_id' => 4,
                'title' => 'Iphone Xr',
                'body' => 'This is body',
                'post_it' => 0,
            ],
            [
                'section_id' => 4,
                'title' => 'Galaxy S25',
                'body' => 'This is body',
                'post_it' => 1,
            ],
            [
                'section_id' => 6,
                'title' => 'Ferrari',
                'body' => 'This is body',
                'post_it' => 1,
            ],
            [
                'section_id' => 6,
                'title' => 'Audi',
                'body' => 'This is body',
                'post_it' => 1,
            ],
            [
                'section_id' => 7,
                'title' => 'Lambo',
                'body' => 'This is body',
                'post_it' => 1,
            ],
            [
                'section_id' => 8,
                'title' => 'furi',
                'body' => 'This is body',
                'post_it' => 1,
            ],
            [
                'section_id' => 9,
                'title' => 'microbuse',
                'body' => 'This is body',
                'post_it' => 1,
            ],
            [
                'section_id' => 9,
                'title' => 'busuri',
                'body' => 'This is body',
                'post_it' => 1,
            ],
            [
                'section_id' => 10,
                'title' => 'camioane mici',
                'body' => 'This is body',
                'post_it' => 1,
            ],
        ]);
    }
}