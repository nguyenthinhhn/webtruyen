<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            $role->permissions()->attach([1, 2, 3, 4, 5, 6]);
        }
    }
}
