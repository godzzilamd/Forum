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
                'post_it' => 0,
            ],
            [
                'section_id' => 1,
                'title' => 'Nissan X-Trail',
                'post_it' => 0,
            ],
            [
                'section_id' => 2,
                'title' => 'Ford',
                'post_it' => 1,
            ],
            [
                'section_id' => 4,
                'title' => 'Iphone Xr',
                'post_it' => 0,
            ],
            [
                'section_id' => 4,
                'title' => 'Galaxy S25',
                'post_it' => 1,
            ],
        ]);
    }
}
