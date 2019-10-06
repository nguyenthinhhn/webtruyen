<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslateGroup extends Model
{
    protected $fillable = [
        'group_name',
        'group_cover',
        'group_description',
        'group_slug',
        'group_url',
        'user_id',
    ];

    public function mangas()
    {
        return $this->belongsToMany('App\Models\Manga', 'manga_translate_group');
    }
}
