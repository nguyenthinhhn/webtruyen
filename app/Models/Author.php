<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'cover',
        'description',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function mangas()
    {
        return $this->belongsToMany('App\Models\Manga', 'author_manga');
    }
}
