<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FetchDistricts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:districts-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches all districts for selected towns';

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
        //
        return;
    }
}
