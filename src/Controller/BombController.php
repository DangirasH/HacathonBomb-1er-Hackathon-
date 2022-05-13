<?php

namespace App\Controller;

use App\Model\BombedManager;
use App\Model\PlayerManager;

class BombController extends AbstractController
{
    public array $airQuality = [
        1 => 'Bien',
        2 => 'Viable',
        3 => 'Moyen',
        4 => 'Mauvais',
        5 => 'Toxique',
    ];

    public function index(): string
    {
        $lat = $_GET['lat'];
        $lon = $_GET['lon'];
        $airQuality = $_GET['airQuality'];
        $alreadyBombed = '';
        $bombedManager = new BombedManager();
        if (!empty($bombedManager->selectBomb($lat, $lon))) {
            $alreadyBombed = "Zone déjà bombardée !";
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bomb = array_map('trim', $_POST);

            $bombedManager->insert($bomb);
            header('Location: player?airQuality=' . $airQuality);
        }
        $playerManager = new PlayerManager();
        $player = $playerManager->selectOneById($_SESSION['user']);
        $progression = $player['xp'] - ($player['level'] - 1) * 100;

        return $this->twig->render('Bomb/index.html.twig', [
            'lat' => $lat,
            'lon' => $lon,
            'airQuality' => $airQuality,
            'user_id' => $_SESSION['user'],
            'alreadyBombed' => $alreadyBombed,
            'player' => $player,
            'progression' => $progression,
        ]);
    }
}
