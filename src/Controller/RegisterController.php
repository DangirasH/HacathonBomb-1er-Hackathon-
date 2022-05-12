<?php

namespace App\Controller;

use App\Model\UserManager;

class RegisterController extends AbstractController
{
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $user = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $userManager = new UserManager();
            $userManager->insert($user);

            header('Location: geoloc');
            return null;
        }

        return $this->twig->render('Register/add.html.twig');
    }
}
