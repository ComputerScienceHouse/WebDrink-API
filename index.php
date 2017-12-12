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
require_once 'utils/Database.php';

// Set up API
require_once 'utils/API.php';

foreach (glob("models/entities/*.php") as $filename) {
    require_once $filename;
}

// Register routes
require_once 'routes.php';

// Run app
$app->run();