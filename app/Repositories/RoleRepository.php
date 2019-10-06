<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Role;

class RoleRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Role::class;
    }
}
