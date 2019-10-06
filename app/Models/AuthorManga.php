<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorManga extends Model
{
    protected $table = 'author_manga';
    protected $fillable = [
        'author_id',
        'manga_id',
    ];
}
