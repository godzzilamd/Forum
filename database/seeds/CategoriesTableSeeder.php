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
                'allowed' => 1
            ],
            [
                'title' => 'Aparate telefonice',
                'allowed' => 1
            ],
            [
                'title' => 'Calculatoare',
                'allowed' => 1
            ],
            [
                'title' => 'Imobiliare',
                'allowed' => 1
            ],
            [
                'title' => 'Constructii',
                'allowed' => 1
            ],
        ]);
    }
}
