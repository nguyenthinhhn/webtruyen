<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Comment;

class CommentRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Comment::class;
    }
}
