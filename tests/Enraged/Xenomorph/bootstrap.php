<?php

declare(strict_types=1);

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__, 3) . '/vendor/autoload.php';

if (file_exists(dirname(__DIR__, 3) . '/config/bootstrap.php')) {
    require dirname(__DIR__, 3) . '/config/bootstrap.php';
} elseif (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__, 3) . '/.env');
}
