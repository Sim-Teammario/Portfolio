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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
                die('Erreur CSRF');
            }

            $name = htmlspecialchars(trim($_POST['name'] ?? ''));
            $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
            $message = htmlspecialchars(trim($_POST['message'] ?? ''));

            if ($name && $email && $message) {
                $to = 'admin@votre-domaine.local';
                $subject = 'Nouveau message de contact - Portfolio';
                $headers = "From: webmaster@votre-domaine.local\r\nReply-To: $email";
                
                mail($to, $subject, $message, $headers);
                $_SESSION['flash'] = "Message envoyé avec succès.";
            } else {
                $_SESSION['flash'] = "Erreur de validation des champs.";
            }
            header('Location: /contact');
            exit;
        }
    }
}
