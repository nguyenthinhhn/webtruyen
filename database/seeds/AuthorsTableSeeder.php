<?php

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('authors')->truncate();
        
        Author::create([
            'name' => 'Nguyễn Thịnh',
            'cover' => 'bvj',
            'description' => 'tác giả',
            'slug' => 'nguyen-thinh',
            'meta_title' => 'title',
            'meta_description' => 'description',
            'meta_keywords' => 'key',
        ]);
    }
}
