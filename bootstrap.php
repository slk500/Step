<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$envFile = __DIR__ .'/.env';
if (file_exists($envFile)) {
    (new Dotenv)->load($envFile);
}

$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader);
$template = $twig->load('index.html.twig');