<?php

namespace App\Controller;

use App\Model\BombedManager;

class BombController extends AbstractController
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
        $lat = $_GET['lat'];
        $lon = $_GET['lon'];
        $airQuality = $_GET['airQuality'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bomb = array_map('trim', $_POST);

            $bombedManager = new BombedManager();
            if (empty($bombedManager->selectBomb($bomb['lat'], $bomb['lon']))) {
                $bombedManager->insert($bomb);
                header('Location: player?airQuality=' . $airQuality);
            }
        }
        return $this->twig->render('Bomb/index.html.twig', [
            'lat' => $lat,
            'lon' => $lon,
            'airQuality' => $airQuality,
            'user_id' => $_SESSION['user']
        ]);
    }
}
