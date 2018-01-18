<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Utils\API;

/**
 * GET /machines/stock/:machine_id - Get the stock of all or a single drink machine
 */
$app->get('/stock/{machine_id}', function (Request $request, Response $response) {
    //TODO
    //TODO: Check for API Key or Auth

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * GET /machines/info/:machine_id - Get the info for one (or all) drink machine
 */
$app->get('/info/{machine_id}', function (Request $request, Response $response) {
    //TODO
    //TODO: Check for API Key or Auth

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * POST /machines/slot/:slot_num/:machine_id/:item_id/:available/:status - Update a slot in a drink machine (drink admin only)
 */
$app->post('/slot/{slot_num}/{machine_id}/{item_id}/{available}/{status}', function (Request $request, Response $response) {
    //TODO
    //TODO: Check for API Key or Auth

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});



