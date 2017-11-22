<?php

use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ .'/../.env');

$m = getenv('URL_WHERETHEISS');

echo 'siema';

echo 'dddd';

