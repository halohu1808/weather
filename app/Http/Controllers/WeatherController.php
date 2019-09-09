<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {

        return view('weatherIndex');
    }

    public function weatherNow($city)
    {
        $client = new Client();
        $res = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather?q='.$city.'&appid=864d6baefd019b9633bcd4b963ce8bd4' );

        $getBody =  $res->getBody();
        $dataNow = json_decode($getBody);
        //dd($dataNow);

        return $dataNow;
    }

    public function weatherBody(Request $request)
    {
        $city= $request->inputCity;

        $client = new Client();
        $res = $client->request('GET', 'https://api.openweathermap.org/data/2.5/forecast?q='.$city.'&cnt=5&appid=864d6baefd019b9633bcd4b963ce8bd4' );

        $getBody =  $res->getBody();
        $data = json_decode($getBody);
        $dataFiveDay = $data->list;
        //dd($dataFiveDay);

        $dataNow = $this->weatherNow($city);
        return view('weatherBody',compact(['dataNow','dataFiveDay']));
    }

}
