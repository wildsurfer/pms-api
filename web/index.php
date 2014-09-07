<?php

include __DIR__ . '/../vendor/autoload.php';

use Pms\Silex\Application;

$app = new Application();

$app->get('/api/info', function (Application $app) {
    return $app->json([
        'status' => true,
        'info'   => [
            'name'    => 'Ivan',
            'surname' => 'Kuznetsov'
        ]]);
});

$app->run();
