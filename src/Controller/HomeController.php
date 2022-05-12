<?php

namespace App\Controller;

use App\Model\AirManager;

class HomeController extends AbstractController
{
    public array $airQuality = [
        1 => 'Très bon',
        2 => 'Bon',
        3 => 'Bof',
        4 => 'Faible',
        5 => 'JS',
    ];

    public function index(): string
    {
        $airManager = new AirManager();
        $air = $airManager->show();
        $detailsAirQuality = $air ['list'][0]['main']['aqi'];

        return $this->twig->render('Home/index.html.twig', [
            'airQuality' => $this->airQuality,
            'detailsAirQuality' => $detailsAirQuality,
        ]);
    }
}
