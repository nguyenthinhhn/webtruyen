<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\ChapterDetail;

class ChapterDetailRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return ChapterDetail::class;
    }
}
