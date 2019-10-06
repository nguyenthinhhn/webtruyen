<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Device;

class DeviceRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Device::class;
    }
}
