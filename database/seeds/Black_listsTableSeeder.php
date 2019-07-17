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
                'user_id' => 1,
                'enemy_id' => 4,
            ],
            [
                'user_id' => 4,
                'enemy_id' => 1,
            ],
            [
                'user_id' => 1,
                'enemy_id' => 3,
            ],
            [
                'user_id' => 3,
                'enemy_id' => 1,
            ],
            [
                'user_id' => 2,
                'enemy_id' => 5,
            ],
            [
                'user_id' => 5,
                'enemy_id' => 2,
            ],
        ]);
    }
}
