<?php

namespace App\Controller;

use App\Model\AddressManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $addressManager = new AddressManager();
        $lat = 0;
        $lon = 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $address = array_map('trim', $_POST);

            $data = $addressManager->search($address['housenumber'], $address['street'], $address['postcode']);
            $details = $data['features'][0]['geometry']['coordinates'];
            $lon = $details[0];
            $lat = $details[1];
        }


        return $this->twig->render('Home/index.html.twig', ['lon' => $lon, 'lat' => $lat]);
    }
}
