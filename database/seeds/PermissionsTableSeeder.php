<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'browse_posts',
                'description' => 'Permite vizualizarea posturilor',
            ],
            [
                'name' => 'read_posts',
                'description' => 'Permite citirea posturilor',
            ],
            [
                'name' => 'edit_posts',
                'description' => 'Permite editarea postului',
            ],
            [
                'name' => 'add_posts',
                'description' => 'Permite adaugarea posturilor',
            ],
            [
                'name' => 'delete_posts',
                'description' => 'Permite stergerea posturilor',
            ],
            [
                'name' => 'browse_category',
                'description' => 'Permite vizualizarea categoriilor',
            ],
            [
                'name' => 'read_category',
                'description' => 'Permite citirea categoriilor',
            ],
            [
                'name' => 'edit_category',
                'description' => 'Permite editarea categoriilor',
            ],
            [
                'name' => 'add_category',
                'description' => 'Permite adaugarea categoriilor',
            ],
            [
                'name' => 'delete_category',
                'description' => 'Permite stergerea categoriilor',
            ],
        ]);
    }
}
