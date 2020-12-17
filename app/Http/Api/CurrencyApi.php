<?php

namespace App\Http\Api;
use App\Models\Currency;
use GuzzleHttp\Client;

class CurrencyApi
{

    public function callCurrencyApi()
    {
        $client = new Client();
        $url = 'http://94.240.252.53/api/currency';
        $response = [];
        $response = $client->request('POST',$url,[
            'headers' => [
            'Accept' => 'application/json',
                'authorization' => 'Bearer '.config('currency.api')
            ]

        ]);
        $response = json_decode($response->getBody()->getContents(),true);
        $data = $response['data'];
        for ($i = 0 ; $i < sizeof($response['data']); $i++) {
            $currency = new Currency();
            $currency->currency = $data[$i]['currency'];
            $currency->buy = $data[$i]['buy'];
            $currency->sell = $data[$i]['sell'];
            $currency->save();

        }
    }

    public function destroy()
    {
        $getCurrency = Currency::all();
        foreach ($getCurrency as $currency) {
            Currency::destroy($currency->id);
        }

    }

    public function showCurrency()
    {
        $getCurrency = Currency::all();
        return view ('currency',['getCurrency' => $getCurrency]);
    }
}
