<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class AirManager extends AbstractManager
{
    public function show($lat, $lon)
    {
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'http://api.openweathermap.org/data/2.5/air_pollution',
            [
                'query' => [
                    'lat' => $lat,
                    'lon' => $lon,
                    'appid' => '1c368d32a1cabbfeb39f4f2186294792'
                ],
            ]
        );

        $statusCode = $response->getStatusCode();
        // $type = $response->getHeaders()['content-type'][0];

        if ($statusCode === 200) {
            return $response->toArray();
        }
    }
}
