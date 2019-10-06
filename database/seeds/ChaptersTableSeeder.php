<?php

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('chapters')->truncate();

        Chapter::create([
            'name' => 'chương 1',
            'description' => 'description',
            'view' => '150',
            'status' => '1',
            'slug' => 'chuong-1-xz',
            'manga_id' => '1',
            'content' => 'nội dung',
        ]);

        Chapter::create([
            'name' => 'chương 2',
            'description' => 'description',
            'view' => '140',
            'status' => '1',
            'slug' => 'chuong-2-xz',
            'manga_id' => '1',
            'content' => 'nội dung',
        ]);

        Chapter::create([
            'name' => 'chương 1',
            'description' => 'description',
            'view' => '150',
            'status' => '1',
            'slug' => 'chuong-1-xz',
            'manga_id' => '2',
            'content' => 'nội dung',
        ]);

        Chapter::create([
            'name' => 'chương 2',
            'description' => 'description',
            'view' => '120',
            'status' => '1',
            'slug' => 'chuong-2-xzcc',
            'manga_id' => '2',
            'content' => 'nội dung',
        ]);
    }
}
