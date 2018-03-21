<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Middleware\AuthMiddleware;

$autoLoader = require_once 'vendor/autoload.php';

// Instantiate the app
$app = new \Slim\App();

// Use Config
if (file_exists("config.php")) {
    require 'config.php';
} else {
    require 'config.temp.php';
}

// Set up database
require_once __DIR__ . '/src/utils/Database.php';

// Set up API
require_once __DIR__ . '/src/utils/API.php';

// Set up LDAP
require_once __DIR__ . '/src/utils/LDAP.php';

// Set up OIDC
require_once __DIR__ . '/src/utils/OIDC.php';

// Set up Middleware
require_once __DIR__ . '/src/middleware/AuthMiddleware.php';

foreach (glob(__DIR__ . "/src/models/entities/*.php") as $filename) {
    if (isset($filename)) {
        require_once @$filename;
    }
}

// Register routes
$app->get('/', function (Request $request, Response $response) {
    // TODO: Create fancy display page that shows to documentation
    return $response->withJson([__DIR__, __DIR__ . '/src/api/v2/test.php'], 200, JSON_PRETTY_PRINT);
});

/*
 * API v2
 *
 * v2 will represent all routes that are modeled off of the WebDrink-2.0 API
 * A lot of the basic transitions from WebDrink 2.0 to the new API will be made easy through these routes
 * These routes will also serve to help understand how the new v3 of the API needs to be formatted
 */

$app->group('/v2', function () use ($app) {

    $app->group('/test', function () use ($app) {
        require __DIR__ . '/src/api/v2/test.php';
    });

    $auth = new AuthMiddleware();

    $app->group('/users', function () use ($app) {
        require __DIR__ . '/src/api/v2/users.php';
    })->add($auth);

    $app->group('/machines', function () use ($app) {
        require __DIR__ . '/src/api/v2/machines.php';
    })->add($auth);

    $app->group('/items', function () use ($app) {
        require __DIR__ . '/src/api/v2/items.php';
    })->add($auth);

    $app->group('/temps', function () use ($app) {
        require __DIR__ . '/src/api/v2/temps.php';
    })->add($auth);

    $app->group('/drops', function () use ($app) {
        require __DIR__ . '/src/api/v2/drops.php';
    })->add($auth);
});

$app->group('/v3', function () use ($app) {
    //TODO
});

// Run app
try {
    $app->run();
} catch (\Slim\Exception\MethodNotAllowedException $e) {
    echo $e;
} catch (\Slim\Exception\NotFoundException $e) {
    echo $e;
}
