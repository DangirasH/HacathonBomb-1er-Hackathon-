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
        $data = $addressManager->search();
        $details = $data['features'];

        return $this->twig->render('Home/index.html.twig', ['details' => $details]);
    }
}
