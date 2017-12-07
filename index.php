<?php


$autoLoader = require_once 'vendor/autoload.php';

// Instantiate the app
$app = new \Slim\App();

// Set up database
require_once 'utils/Database.php';

// Register routes
require_once 'API.php';

// Run app
$app->run();