<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Transport',
                'isStaff' => 1
            ],
            [
                'title' => 'Aparate telefonice',
                'isStaff' => 1
            ],
            [
                'title' => 'Calculatoare',
                'isStaff' => 1
            ],
            [
                'title' => 'Imobiliare',
                'isStaff' => 1
            ],
            [
                'title' => 'Constructii',
                'isStaff' => 1
            ],
        ]);
    }
}
