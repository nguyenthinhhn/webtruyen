<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'report_type',
        'report_content',
        'user_id',
        'manga_id',
        'chapter_id',
    ];

    public function mangaReport()
    {
        return $this->belongsTo('App\Models\Manga');
    }

    public function chapterReport()
    {
        return $this->belongsTo('App\Models\Chapter');
    }
}
