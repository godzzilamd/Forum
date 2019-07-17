<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            Friend_listsTableSeeder::class,
            Black_listsTableSeeder::class,
            SanctionsTableSeeder::class,
            Sanction_userTableSeeder::class,
            CategoriesTableSeeder::class,
            SectionsTableSeeder::class,
            TopicsTableSeeder::class,
            PostsTableSeeder::class,
            PhotosTableSeeder::class,    
            LikesTableSeeder::class,
            PermissionsTableSeeder::class,
            Permission_roleTableSeeder::class
        ]);
    }
}
