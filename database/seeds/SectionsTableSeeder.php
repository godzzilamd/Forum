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
            [
                'category_id' => 1,
                'parent_id' => 1,
                'title' => 'Cu roti'
            ],
            [
                'category_id' => 1,
                'parent_id' => 1,
                'title' => 'Cu volan'
            ],
            [
                'category_id' => 1,
                'parent_id' => 2,
                'title' => 'Mari 20t'
            ],
            [
                'category_id' => 1,
                'parent_id' => 2,
                'title' => 'Mari 12t'
            ],
            [
                'category_id' => 1,
                'parent_id' => 2,
                'title' => 'Mico'
            ],
        ]);
    }
}
