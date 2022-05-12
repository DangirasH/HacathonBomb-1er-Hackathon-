<?php

namespace App\Controller;

use App\Model\BombedManager;

class BombController extends AbstractController
{
    public function index(): string
    {
        $lat = $_GET['lat'];
        $long = $_GET['long'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bomb = array_map('trim', $_POST);

            $bombedManager = new BombedManager();
            if (empty($bombedManager->selectBomb($bomb['lat'], $bomb['long']))) {
                $bombedManager->insert($bomb);
                header('Location: profil');
            }
        }
        return $this->twig->render('Bomb/index.html.twig', [
            'lat' => $lat,
            'long' => $long
        ]);
    }
}
