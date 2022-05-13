<?php

namespace App\Controller;

use App\Model\PlayerManager;

class PlayerController extends AbstractController
{
    public function index(): string
    {
        $playerManager = new PlayerManager();
        $players = $playerManager->selectAll();

        return $this->twig->render('Player/index.html.twig', ['players' => $players]);
    }
}
