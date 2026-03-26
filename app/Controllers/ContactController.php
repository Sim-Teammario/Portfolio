<?php
declare(strict_types=1);

namespace App\Controllers;

class ContactController {
    private $twig;

    public function __construct($twig) {
        $this->twig = $twig;
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }

    public function index() {
        echo $this->twig->render('contact.twig', ['csrf_token' => $_SESSION['csrf_token']]);
    }

    public function submit() {
        $_SESSION['flash'] = "Le formulaire de contact est temporairement en maintenance.";
        header('Location: /contact');
        exit;
    }
}
