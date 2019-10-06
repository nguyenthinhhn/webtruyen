<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Setting;

class SettingRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Setting::class;
    }
}
