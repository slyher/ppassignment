<?php

namespace App\Console\Commands;

use App\Models\District;
use App\Services\FetchDistrictsCracow;
use App\Services\FetchDistrictsGdansk;
use App\Services\TownNameNotPrivided;
use GuzzleHttp\Client;
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
        $client = new Client();
        $model = new District();
        try {
            $gdanskFetcherService = new FetchDistrictsGdansk($client, $model, env('GDANSK_DISTRICTS_URL'));
            $gdanskFetcherService->saveAllDistrictsData();
            $cracowFetcherService = new FetchDistrictsCracow($client, $model, env('CRACOW_DISTRICTS_URL'));
            $cracowFetcherService->saveAllDistrictsData();
        } catch (TownNameNotPrivided $e) {
            return;
        }
        return;
    }
}
