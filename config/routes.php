<?php
return [
    '/' => ['App\Controllers\HomeController', 'index'],
    'diplomes' => ['App\Controllers\PageController', 'diplomas'],
    'projets' => ['App\Controllers\PageController', 'projects'],
    'a-propos' => ['App\Controllers\PageController', 'about'],
    'mentions-legales' => ['App\Controllers\PageController', 'mentions'],
    'politique-confidentialite' => ['App\Controllers\PageController', 'privacy'],
    'contact' => ['App\Controllers\ContactController', 'index'],
    'contact/submit' => ['App\Controllers\ContactController', 'submit'],
    'cv/download' => ['App\Controllers\CvController', 'download'],
];
