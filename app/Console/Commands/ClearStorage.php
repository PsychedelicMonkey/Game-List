<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all file uploads from the storage directory';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Storage::disk('local')->deleteDirectory('photo');
        Storage::disk('public')->deleteDirectory('photo');
    }
}
