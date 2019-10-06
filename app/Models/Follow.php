<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'user_id',
        'manga_id',
        'chapter_id',
    ];

    public function manga()
    {
        return $this->belongsTo('App\Models\Manga');
    }

    public function chapter()
    {
        return $this->belongsTo('App\Models\Chapter');
    }
}
