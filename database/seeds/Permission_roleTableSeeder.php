<?php

use Illuminate\Database\Seeder;
use App\Role;

class Permission_roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::find(1);

        $roles->permissions()->attach(range(1, 21));

        $roles = Role::find(2);
        
        $roles->permissions()->attach(1);
    }
}
