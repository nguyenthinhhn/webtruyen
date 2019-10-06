<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryManga extends Model
{
    protected $table = 'category_manga';
    protected $fillable = [
        'category_id',
        'manga_id',
    ];
}
