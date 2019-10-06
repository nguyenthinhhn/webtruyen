<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Author;

class AuthorRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Author::class;
    }
}
