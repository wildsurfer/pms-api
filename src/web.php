<?php

use \Symfony\Component\HttpFoundation\Request;

$app['api.interface'] = 'web';

/**
 * JSON POST-body filter
 *
 * Replace $request->request with JSON POST-body
 */
$app->before(function (Request $request) {
    if (false !== strpos($request->headers->get('Content-Type'), 'json') && $request->getContent() != "" && $request->getContent() != "null") {
        $data = json_decode($request->getContent(), true);

        if(is_null($data))
        {
            throw new \Exception("Invalid JSON format", HTTPCode::HTTP_NOT_ACCEPTABLE);
        }

        $request->request->replace(is_array($data) ? $data : array());
    }
});

/**
 * Enable CORS
 */
$app->after($app['cors']);

// Home
$app->get('/', function (\Silex\Application $app, Request $request) {
    return $app->json(array(
        'message' => 'Welcome to our API. Please view the resource reference.',
        'env' => $app['env']
    ));
});
