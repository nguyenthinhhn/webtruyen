<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use File;
use App\Models\Backup as Bkp;

class Backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:Backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $process;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $user = env('DB_USERNAME');
            $password = env('DB_PASSWORD');
            $host = env('DB_HOST');
            $db = env('DB_DATABASE');
            $prefix = date('ymdhis');
            $file_name = $prefix . '_backup.sql.gz';
            
            //backup db
            $this->process = new Process(sprintf('mysqldump ' . $db . ' --password=' . $password . ' --user=' . $user . ' --host=' . $host . ' --single-transaction | gzip >' . storage_path('app/public/' . $file_name)));
            $this->process->mustRun();

            //save db
            $bkp = Bkp::create([
                'name' => $file_name,
                'size' => File::size(storage_path('/app/public/' . $file_name)),
                'link' => storage_path('app/public/' . $file_name),
            ]);

            $this->info('success');
        } catch (ProcessFailedException $exception) {
            $this->error('Failed.');
        }
    }
}
