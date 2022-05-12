<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class AddressManager extends AbstractManager
{
    public const TABLE = '';

    public function search()
    {
        $content = [];
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'https://api-adresse.data.gouv.fr/search/?q=8+bd+du+port&postcode=44380&limit=1'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        // $type = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        if ($statusCode === 200) {
            $content = $response->toArray();
            // convert the response (here in JSON) to an PHP array

            return $content;
        }
    }
}
