<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Follow;

class FollowRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Follow::class;
    }
}
