<?php

/*
 * WebDrink API Routes
 *
 * This file defines the outside routes for the API
 */

$app->group('/test', function () use ($app) {
    include 'api/test.php';
});

$app->group('/users', function () use ($app) {
    include 'api/users.php';
});

$app->group('/machines', function () use ($app) {
    include 'api/machines.php';
});

$app->group('/items', function () use ($app) {
    include 'api/items.php';
});

$app->group('/temps', function () use ($app) {
    include 'api/temps.php';
});

$app->group('/drops', function () use ($app) {
    include 'api/drops.php';
});