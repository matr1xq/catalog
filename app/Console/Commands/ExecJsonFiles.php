<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExecJsonFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'json:read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reading JSON files';

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
     * @return int
     */
    public function handle()
    {
        $j = file_get_contents('./categories.json'); // в примере все файлы в корне
        $data = json_decode($j);
        //echo ($data);
        if($j != false && !is_null($data)) {
            foreach($data as $k => $e){
                echo $e->title;
            }
        }
        
        //return echo($file);
    }
}
