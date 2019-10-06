<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->truncate();

        Category::create([
            'name' => 'Truyện kiếm hiệp',
            'slug' => 'truyen-kiem-hiep',
            'meta_title' => 'title',
            'meta_description' => 'description',
            'meta_keywords' => 'key',
        ]);

        Category::create([
            'name' => 'Truyện hài',
            'slug' => 'truyen-hai',
            'meta_title' => 'title',
            'meta_description' => 'description',
            'meta_keywords' => 'key',
        ]);
        
        Category::create([
            'name' => 'Truyện tình cảm',
            'slug' => 'truyen-tinh-cam',
            'meta_title' => 'title',
            'meta_description' => 'description',
            'meta_keywords' => 'key',
        ]);
    }
}
