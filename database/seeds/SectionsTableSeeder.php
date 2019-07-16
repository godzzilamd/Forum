<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            [
                'category_id' => 1,
                'parent_id' => null,
                'title' => 'Autoturisme'
            ],
            [
                'category_id' => 1,
                'parent_id' => null,
                'title' => 'Camioane'
            ],
            [
                'category_id' => 1,
                'parent_id' => null,
                'title' => 'Motociclete'
            ],
            [
                'category_id' => 2,
                'parent_id' => null,
                'title' => 'Telefoane mobile'
            ],
            [
                'category_id' => 2,
                'parent_id' => null,
                'title' => 'Accesorii'
            ],
        ]);
    }
}