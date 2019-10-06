<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('comments')->truncate();

        Comment::create([
            'user_id' => '1',
            'type' => '1',
            'manga_id' => '1',
            'chapter_id' => '1',
            'content' => 'Đây là comment 1',
        ]);

        Comment::create([
            'user_id' => '1',
            'type' => '1',
            'manga_id' => '1',
            'chapter_id' => '2',
            'content' => 'Đây là comment 2',
        ]);

        Comment::create([
            'user_id' => '2',
            'type' => '1',
            'manga_id' => '2',
            'chapter_id' => '1',
            'content' => 'Đây là comment 3',
        ]);
        
        Comment::create([
            'user_id' => '2',
            'type' => '1',
            'manga_id' => '2',
            'chapter_id' => '2',
            'content' => 'Đây là comment 4',
        ]);
    }
}
