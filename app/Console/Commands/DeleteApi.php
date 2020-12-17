<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Api\CurrencyApi;
use App\Models\Currency;
use GuzzleHttp\Client;

class DeleteApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency_destroy';

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
        $weather = new CurrencyApi();
        $weather->destroy();
    }
}
