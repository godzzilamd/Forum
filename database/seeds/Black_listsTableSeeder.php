<?php

use Illuminate\Database\Seeder;

class Black_listsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('black_lists')->insert([
            [
                'user_id_1' => 1,
                'user_id_2' => 4,
            ],
            [
                'user_id_1' => 4,
                'user_id_2' => 1,
            ],
            [
                'user_id_1' => 1,
                'user_id_2' => 3,
            ],
            [
                'user_id_1' => 3,
                'user_id_2' => 1,
            ],
            [
                'user_id_1' => 2,
                'user_id_2' => 5,
            ],
            [
                'user_id_1' => 5,
                'user_id_2' => 2,
            ],
        ]);
    }
}
