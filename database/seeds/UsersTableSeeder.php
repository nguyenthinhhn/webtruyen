<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();
        \DB::table('permission_role')->truncate();
        
        User::create([
            'username' => 'Superadmin',
            'fullname' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => 1,
            'exp' => 1,
            'point' => 1,
            'status' => 1,      
        ]);
        User::create([
            'username' => 'Admin',
            'fullname' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => 2,
            'exp' => 1,
            'point' => 1,
            'status' => 1,      
        ]);
        User::create([
            'username' => 'nguyenthinh',
            'fullname' => 'Nguyễn Văn Thịnh',
            'email' => 'nguyenthinhhn98@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => 1,
            'exp' => 1,
            'point' => 1,
            'status' => 1,      
        ]);

    }
}
