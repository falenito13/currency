<?php

namespace App\Console\Commands;

use App\Http\Api\CurrencyApi;
use App\Models\Currency;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class GetApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency_record';

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
        $weatherApi = new CurrencyApi();
        $weatherApi->callCurrencyApi();
    }
}
