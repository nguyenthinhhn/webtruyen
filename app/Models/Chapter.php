<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'name',
        'description',
        'view',
        'status',
        'slug',
        'manga_id',
        'content',
    ];

    public function chapterDetail(){
        return $this->hasOne('App\Models\ChapterDetail');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}
