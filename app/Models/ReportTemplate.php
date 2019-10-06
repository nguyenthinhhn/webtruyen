<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportTemplate extends Model
{
    protected $fillable = [
        'title',
        'content',
        'target',
        'cover',
        'manga_id',
        'chapter_id',
    ];
}
