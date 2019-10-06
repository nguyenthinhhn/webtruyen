<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\SocialAccount;

class SocialAccountRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return SocialAccount::class;
    }
}
