<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->truncate();
        
        Role::create([
            'title' => 'Superadmin',
        ]);
        Role::create([
            'title' => 'Admin',        
        ]);
        Role::create([
            'title' => 'Readers',        
        ]);
    }
}
