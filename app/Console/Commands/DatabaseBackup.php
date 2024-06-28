<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (! Storage::exists('backup')) {
            Storage::makeDirectory('backup');
        }
 
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".sql";
    
        // Set to double quotes for file path due to windows not accepting single quotes
        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD')
                . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') 
                . " > " . '"' . storage_path("app/backup/")  . $filename . '"';
 
        $returnVar = NULL;
        $output  = NULL;
 
        exec($command, $output, $returnVar);
    }
}
