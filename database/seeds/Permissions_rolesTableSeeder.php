<?php

use Illuminate\Database\Seeder;
use App\Role;

class Permissions_rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::find(1);
        $roles->permissions()->attach([1,2,3,4,5]);
        $roles = Role::find(2);
        $roles->permissions()->attach(1);
    }
}
