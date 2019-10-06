<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Backup;

class DataRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Backup::class;
    }

    public function backup($id) {
        $result = Backup::findOrfail($id);
        $user = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $db = env('DB_DATABASE');

        try {
            $this->process = new Process(sprintf('gunzip < ' . storage_path("app/public/" . $result->name) . ' | mysql --user=' . $user . ' --password=' . $password . ' --host=' . $host . ' ' . $db));
            $this->process->mustRun();

            return true;
        } catch (ProcessFailedException $exception) {
            return false;
        }
    }
}
