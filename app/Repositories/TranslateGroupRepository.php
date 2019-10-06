<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\TranslateGroup;

class TranslateGroupRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return TranslateGroup::class;
    }
}
