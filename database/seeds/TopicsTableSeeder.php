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
                'body' => 'This is body',
                'post_it' => 0,
                'title' => 'Audi a6',
            ],
            [
                'section_id' => 1,
                'body' => 'This is body',
                'post_it' => 0,
                'title' => 'Nissan X-Trail',
            ],
            [
                'section_id' => 2,
                'body' => 'This is body',
                'post_it' => 1,
                'title' => 'Ford',
            ],
            [
                'section_id' => 4,
                'body' => 'This is body',
                'post_it' => 0,
                'title' => 'Iphone Xr',
            ],
            [
                'section_id' => 4,
                'body' => 'This is body',
                'post_it' => 1,
                'title' => 'Galaxy S25',
            ],
            [
                'section_id' => 6,
                'body' => 'This is body',
                'post_it' => 1,
                'title' => 'Ferrari',
            ],
            [
                'section_id' => 6,
                'body' => 'This is body',
                'post_it' => 1,
                'title' => 'Audi',
            ],
            [
                'section_id' => 7,
                'body' => 'This is body',
                'post_it' => 1,
                'title' => 'Lambo',
            ],
            [
                'section_id' => 8,
                'body' => 'This is body',
                'post_it' => 1,
                'title' => 'furi',
            ],
            [
                'section_id' => 9,
                'body' => 'This is body',
                'post_it' => 1,
                'title' => 'microbuse',
            ],
            [
                'section_id' => 9,
                'body' => 'This is body',
                'post_it' => 1,
                'title' => 'busuri',
            ],
            [
                'section_id' => 10,
                'body' => 'This is body',
                'post_it' => 1,
                'title' => 'camioane mici',
            ],
        ]);
    }
}