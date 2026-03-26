<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\LogModel;

class HomeController {
    private $twig;
    private const STATUS_LABEL = 'En Alternance';
    private const STATUS_DESCRIPTION = 'Statut actuel : en alternance.';
    private const RNCP_URL = 'https://www.francecompetences.fr/recherche/rncp/37680/';

    public function __construct($twig) {
        $this->twig = $twig;
    }

    public function index() {
        LogModel::logVisit('home');
        echo $this->twig->render('home.twig', [
            'status_label' => self::STATUS_LABEL,
            'status_description' => self::STATUS_DESCRIPTION,
            'rncp_url' => self::RNCP_URL,
        ]);
    }
}
