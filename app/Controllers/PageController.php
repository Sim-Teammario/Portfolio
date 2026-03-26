<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Models\LogModel;

class PageController {
    private $twig;
    private const STATUS_LABEL = 'En Alternance';
    private const STATUS_DESCRIPTION = 'Statut actuel : en alternance.';
    private const RNCP_URL = 'https://www.francecompetences.fr/recherche/rncp/37680/';

    public function __construct($twig) {
        $this->twig = $twig;
    }

    public function diplomas() {
        LogModel::logVisit('diplomas');
        echo $this->twig->render('formation.twig', [
            'rncp_url' => self::RNCP_URL,
        ]);
    }

    public function projects() { LogModel::logVisit('projects'); echo $this->twig->render('page.twig', ['title' => 'Projets', 'content' => 'Liste de mes projets informatiques.']); }

    public function about() {
        LogModel::logVisit('about');
        echo $this->twig->render('about.twig', [
            'status_label' => self::STATUS_LABEL,
            'status_description' => self::STATUS_DESCRIPTION,
        ]);
    }

    public function mentions() {
        echo $this->twig->render('mentions.twig');
    }

    public function privacy() {
        echo $this->twig->render('privacy.twig');
    }
}
