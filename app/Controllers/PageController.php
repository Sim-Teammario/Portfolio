<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Models\LogModel;

class PageController {
    private $twig;

    public function __construct($twig) {
        $this->twig = $twig;
    }

    public function diplomas() { LogModel::logVisit('diplomas'); echo $this->twig->render('page.twig', ['title' => 'Diplômes', 'content' => 'Mes formations et certifications.']); }
    public function projects() { LogModel::logVisit('projects'); echo $this->twig->render('page.twig', ['title' => 'Projets', 'content' => 'Liste de mes projets informatiques.']); }
    public function about() { LogModel::logVisit('about'); echo $this->twig->render('page.twig', ['title' => 'À propos', 'content' => 'Présentation détaillée de mon parcours.']); }
    public function currently() { LogModel::logVisit('currently'); echo $this->twig->render('page.twig', ['title' => 'Actuellement', 'content' => 'En poste en tant qu\'alternant Administrateur Systèmes & Réseaux.']); }
    public function mentions() { echo $this->twig->render('page.twig', ['title' => 'Mentions Légales', 'content' => 'Texte des mentions légales...']); }
    public function privacy() { echo $this->twig->render('page.twig', ['title' => 'Politique de confidentialité', 'content' => 'Texte de la politique RGPD...']); }
}
