<?php


$autoLoader = require_once 'vendor/autoload.php';

// Instantiate the app
$app = new \Slim\App();

// Use Config
require 'config.php';

// Set up database
require_once 'utils/Database.php';

// Register routes
require_once 'routes.php';

// Run app
$app->run();