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
            AuthorsTableSeeder::class,
            CategoriesTableSeeder::class,
            ChapterDetailsTableSeeder::class,
            ChaptersTableSeeder::class,
            CommentsTableSeeder::class,
            DevicesTableSeeder::class,
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            RolePermissionTableSeeder::class,
        ]);
    }
}
