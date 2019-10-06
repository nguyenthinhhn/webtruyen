<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Report;

class ReportRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Report::class;
    }
}
