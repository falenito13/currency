<?php
namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\Currency;
use Illuminate\Routing\Controller;
use GuzzleHttp\Client;


class CurrencyApiController extends Controller
{

    public function callCurrencyApi()
    {
        $client = new Client();
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZTAzM2Q1NjY3MWE5YTk3YWYzMjhjNjNjN2VhZDAyNjI3MmYxNzhkYmJhMWUyZTJmODE3MjVhZmNmZTJhOGE0YTViMTNjYzNkMmIxMGM0YWEiLCJpYXQiOiIxNjA3Nzg4NzUwLjExNzUzOCIsIm5iZiI6IjE2MDc3ODg3NTAuMTE3NTQ2IiwiZXhwIjoiMTYzOTMyNDc1MC4xMTA2NDQiLCJzdWIiOiIxMiIsInNjb3BlcyI6W119.h4UplCY21m6a3l66GaiO3Ude03u5QiTdfUz0PxpL4aJ0YNbxsadhBpcCTtvcmpEZhcGPK8MPnk1CnbRBKeB7wj1vP_CQxIXW33Dnhi7NzV4PrDGa8zKIm0Cjff2ZI9ynfvaKracxb7cQIR32LUNanCBczKPEpv_mhTrFmkz1bwiyNtAS1EWhCmAwbkJ_b0f8DXpWX3K8CfE0MVKq6ZLgSSJQL3uyZbpqjV6Sj05AQimhVHNEZXq4wXtcHoXknTpxLoV52UN0BWqnF9HH-juHd_vFYz3yKdtH0favdzrXI3igfhQCNfXvFabMW1NGKI_-1MhNB26veE4aENUUsGUNkd2JVerLhEOThPk4yU8ejHCbtRN912K_HD5T4BnmaXVIocdSThovmrfNar-XYq_B9rpNOnwQJbRpLEGpQlWUmDCZ5dOJY1yEeViYXkfqbxWt5tg6Zt30dzWocyqHAzr_mvMnewK0JaLhP4RvlebVAfHagWjLFJYfi6xoNsF4BO7ZbELP0kEzKm2lIifwUFpW-jWDuDgtaaxG_ks_wOXnFjXYlFRpfsiCqWQZ63kRpO19k5QuEQ-szs3ffoGoYzDBUl4qRqD0sXF3DGEfVztWgO4ByqNJJWXjACrVsHOxxnm5QfiHQJEX0sklUZ1iJajTdZxLOPUW8QaVfSBI-9g4LuY';
        $url = 'http://94.240.252.53/api/currency';
        $response = [];
        $response = $client->request('POST',$url,[
            'headers' => [
            'Accept' => 'application/json',
                'authorization' => 'Bearer '.$token
            ]

        ]);
        $response = json_decode($response->getBody()->getContents(),true);
        for ($i = 0 ; $i < sizeof($response['data']); $i++) {
            $currency = new Currency();
            $currency->currency = $response['data'][$i]['currency'];
            $currency->buy = $response['data'][$i]['buy'];
            $currency->sell = $response['data'][$i]['sell'];
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
