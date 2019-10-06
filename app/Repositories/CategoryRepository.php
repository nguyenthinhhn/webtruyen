<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Category::class;
    }
}
