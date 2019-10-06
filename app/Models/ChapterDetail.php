<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChapterDetail extends Model
{
    protected $fillable = [
        'chapter_id',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
