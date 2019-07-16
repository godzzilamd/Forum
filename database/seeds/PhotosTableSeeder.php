<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            [
                'user_id' => 1,
                'name' => 'prima',
                'extension' => '.jpg',
                'slug' => 'prima',
            ],
            [
                'user_id' => 1,
                'name' => 'a_doua',
                'extension' => '.jpg',
                'slug' => 'a_doua',
            ],
            [
                'user_id' => 4,
                'name' => 'a_treia',
                'extension' => '.jpg',
                'slug' => 'a_treia',
            ],
            [
                'user_id' => 2,
                'name' => 'a_patra',
                'extension' => '.jpg',
                'slug' => 'a_patra',
            ],
            [
                'user_id' => 2,
                'name' => 'a_cincea',
                'extension' => '.jpg',
                'slug' => 'a_cincea',
            ],
        ]);
    }
}
