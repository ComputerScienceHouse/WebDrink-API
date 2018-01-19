<?php

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
require_once 'src/routes.php';

// Run app
$app->run();