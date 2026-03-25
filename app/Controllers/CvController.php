<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\LogModel;

class CvController {
    public function download() {
        if (!isset($_COOKIE['rgpd_consent']) || $_COOKIE['rgpd_consent'] !== 'true') {
            die("Vous devez accepter la politique de confidentialité pour télécharger le CV.");
        }

        LogModel::logVisit('cv_download');
        
        $file = __DIR__ . '/../../public/files/cv.pdf';
        if (file_exists($file)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="CV.pdf"');
            readfile($file);
            exit;
        } else {
            die("Fichier introuvable.");
        }
    }
}
