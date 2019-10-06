<?php

use Illuminate\Database\Seeder;
use App\Models\ChapterDetail;

class ChapterDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('chapter_details')->truncate();

        ChapterDetail::create([
             'chapter_id' => '1',
            'content' => 'nội dung truyen-kiem-hiep',
            'meta_title' => 'title',
            'meta_description' => 'description',
            'meta_keywords' => 'key',
        ]);

        ChapterDetail::create([
            'chapter_id' => '2',
            'content' => 'nội dung chương 2 truyen-kiem-hiep',
            'meta_title' => 'title',
            'meta_description' => 'description',
            'meta_keywords' => 'key',
        ]);

        ChapterDetail::create([
            'chapter_id' => '3',
            'content' => 'nội dung chương 3 truyen-kiem-hiep',
            'meta_title' => 'title',
            'meta_description' => 'description',
            'meta_keywords' => 'key',
        ]);
        
        ChapterDetail::create([
            'chapter_id' => '4',
            'content' => 'nội dung chương 4 truyen-kiem-hiep',
            'meta_title' => 'title',
            'meta_description' => 'description',
            'meta_keywords' => 'key',
        ]);
    }
}
