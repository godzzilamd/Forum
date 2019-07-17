<?php

use Illuminate\Database\Seeder;

class Sanction_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanction_user')->insert([
            [
                'sanction_id' => 1,
                'user_id' => 1
            ],
            [
                'sanction_id' => 1,
                'user_id' => 2
            ],
            [
                'sanction_id' => 3,
                'user_id' => 4
            ],
            [
                'sanction_id' => 5,
                'user_id' => 2
            ],
            [
                'sanction_id' => 2,
                'user_id' => 3
            ],
        ]);
    }
}
