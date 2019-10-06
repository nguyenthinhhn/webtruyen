<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Manga;

class CountComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:comment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count Comment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        $mangas = Manga::all();
        foreach ($mangas as $manga) {
            $manga->count_comment = $manga->comments->count();
            $manga->save();
        }
    }
}
