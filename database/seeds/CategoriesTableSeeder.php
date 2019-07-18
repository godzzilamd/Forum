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
                'isStuff' => 1
            ],
            [
                'title' => 'Aparate telefonice',
                'isStuff' => 1
            ],
            [
                'title' => 'Calculatoare',
                'isStuff' => 1
            ],
            [
                'title' => 'Imobiliare',
                'isStuff' => 1
            ],
            [
                'title' => 'Constructii',
                'isStuff' => 1
            ],
        ]);
    }
}
