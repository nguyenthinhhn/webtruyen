<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function mangas()
    {
        return $this->belongsToMany('App\Models\Manga', 'category_manga');
    }
}
