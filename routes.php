<?php

/*****************************************************************
 * WebDrink API Routes
 *
 * This file defines the outside routes for the API
 *****************************************************************/

/*
 * API v2
 *
 * v2 will represent all routes that are modeled off of the WebDrink-2.0 API
 * A lot of the basic transitions from WebDrink 2.0 to the new API will be made easy through these routes
 * These routes will also serve to help understand how the new v3 of the API needs to be formatted
 */
$app->group('/v2', function () use ($app) {
    $app->group('/test', function () use ($app) {
        include 'api/v2/test.php';
    });

    $app->group('/users', function () use ($app) {
        include 'api/v2/users.php';
    });

    $app->group('/machines', function () use ($app) {
        include 'api/v2/machines.php';
    });

    $app->group('/items', function () use ($app) {
        include 'api/v2/items.php';
    });

    $app->group('/temps', function () use ($app) {
        include 'api/v2/temps.php';
    });

    $app->group('/drops', function () use ($app) {
        include 'api/v2/drops.php';
    });
});

$app->group('/v3', function () use ($app) {
    //TODO
});