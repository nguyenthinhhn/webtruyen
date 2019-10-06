<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Chapter;

class ChapterRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Chapter::class;
    }

    public function getList($id)
    {
        $result = $this->_model::where('manga_id', $id)->get();

        return $result;
    }

    public function updateStatus($id)
    {
        $result = $this->_model->findOrFail($id);
        $result->status = 1 - $result->status;
        $result->save();

        return $result->status;
    }
}
