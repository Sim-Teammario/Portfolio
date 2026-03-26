<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Charger les variables d'environnement
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

// Initialiser Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../app/Views');
$twig = new \Twig\Environment($loader, [
    'cache' => $_ENV['APP_ENV'] === 'production' ? __DIR__ . '/../var/cache' : false,
]);

// Consume flash once per request to avoid persistent alerts on every page.
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$twig->addGlobal('session', $_SESSION);
$twig->addGlobal('flash', $flash);
$twig->addGlobal('cookie_consent', $_COOKIE['rgpd_consent'] ?? false);

// Routeur simple
$url = $_GET['url'] ?? '/';
$routes = require __DIR__ . '/../config/routes.php';

if (array_key_exists($url, $routes)) {
    [$controllerName, $method] = $routes[$url];
    $controller = new $controllerName($twig);
    $controller->$method();
} else {
    http_response_code(404);
    echo $twig->render('page.twig', ['title' => '404', 'content' => 'Page introuvable.']);
}