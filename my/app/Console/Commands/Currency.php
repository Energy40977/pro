<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CurrencyData;
class Currency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update';

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
 ///USD
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fixer-fixer-currency-v1.p.rapidapi.com/latest?base=USD&symbols=AZN",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: fixer-fixer-currency-v1.p.rapidapi.com",
                "x-rapidapi-key: ddebe72377msh5ba77b346e46e76p101e7ejsne2758a032770"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $mezenne = json_decode($response, true);
        $usd = $mezenne['rates']['AZN'];
        CurrencyData::where('id', 1)->update(['USD' => $usd]);

    //TRY
        $curl2 = curl_init();
        curl_setopt_array($curl2, array(
            CURLOPT_URL => "https://fixer-fixer-currency-v1.p.rapidapi.com/latest?base=TRY&symbols=AZN",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: fixer-fixer-currency-v1.p.rapidapi.com",
                "x-rapidapi-key: ddebe72377msh5ba77b346e46e76p101e7ejsne2758a032770"
            ),
        ));
        $response2 = curl_exec($curl2);
        $err = curl_error($curl2);
        curl_close($curl2);
        $mezenne2 = json_decode($response2, true);
        $try = $mezenne2['rates']['AZN'];
        CurrencyData::where('id', 1)->update(['TRY' => $try]);

      ///EUR
        $curl3 = curl_init();
        curl_setopt_array($curl3, array(
            CURLOPT_URL => "https://fixer-fixer-currency-v1.p.rapidapi.com/latest?base=EUR&symbols=AZN",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: fixer-fixer-currency-v1.p.rapidapi.com",
                "x-rapidapi-key: ddebe72377msh5ba77b346e46e76p101e7ejsne2758a032770"
            ),
        ));
        $response3 = curl_exec($curl3);
        $err = curl_error($curl3);
        curl_close($curl3);
        $mezenne3 = json_decode($response3, true);
        $eur = $mezenne3['rates']['AZN'];
        CurrencyData::where('id', 1)->update(['EUR' => $eur]);

        ///IRR
        $curl4 = curl_init();
        curl_setopt_array($curl4, array(
            CURLOPT_URL => "https://fixer-fixer-currency-v1.p.rapidapi.com/latest?base=GBP&symbols=AZN",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: fixer-fixer-currency-v1.p.rapidapi.com",
                "x-rapidapi-key: ddebe72377msh5ba77b346e46e76p101e7ejsne2758a032770"
            ),
        ));
        $response4 = curl_exec($curl4);
        $err = curl_error($curl4);
        curl_close($curl4);
        $mezenne4 = json_decode($response4, true);
        $gbr = $mezenne4['rates']['AZN'];
        CurrencyData::where('id', 1)->update(['GBR' => $gbr]);

        ///IRR
        $curl5 = curl_init();
        curl_setopt_array($curl5, array(
            CURLOPT_URL => "https://fixer-fixer-currency-v1.p.rapidapi.com/latest?base=RUB&symbols=AZN",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: fixer-fixer-currency-v1.p.rapidapi.com",
                "x-rapidapi-key: ddebe72377msh5ba77b346e46e76p101e7ejsne2758a032770"
            ),
        ));
        $response5 = curl_exec($curl5);
        $err = curl_error($curl5);
        curl_close($curl5);
        $mezenne5 = json_decode($response5, true);
        $rub = $mezenne5['rates']['AZN'];
        CurrencyData::where('id', 1)->update(['RUB' => $rub]);
    }
}
