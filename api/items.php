<?php

/**
 * GET /items/list - Get a list of all drink items
 */
$app->get('/list', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new \WebDrinkAPI\Utils\API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * POST /items/add/:name/:price - Add a new drink item (drink admin only)
 */
$app->post('/add/{name}/{price}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new \WebDrinkAPI\Utils\API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * POST /items/update/:item_id/:name/:price/:status - Update an existing drink item (drink admin only)
 */
$app->post('/update/{item_id}/{name}/{price}/{status}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new \WebDrinkAPI\Utils\API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * POST /items/delete/:item_id - Delete a drink item (drink admin only)
 */
$app->post('/delete/{item_id}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new \WebDrinkAPI\Utils\API();

    return $response->withJson($api->result(true, "TODO", true));
});




