<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\LogModel;

class HomeController {
    private $twig;

    public function __construct($twig) {
        $this->twig = $twig;
    }

    public function index() {
        LogModel::logVisit('home');
        echo $this->twig->render('home.twig');
    }
}
