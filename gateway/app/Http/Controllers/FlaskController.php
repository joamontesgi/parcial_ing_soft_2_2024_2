<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlaskController extends Controller
{

    protected $apiUrl;


    public function __construct()
    {
    $this->apiUrl = env('MICROSERVICE_FLASK');
    }

    public function flask(Request $request)
    {
        $url = $this->apiUrl . '/convertir';
        $response = Http::post($url, $request->all());
        return $response->json();
    }
}
