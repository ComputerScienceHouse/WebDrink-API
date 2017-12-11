<?php

/**
 * GET /drops/status - Check the Websocket connection to the drink server
 */
$app->get('/status', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new \WebDrinkAPI\Utils\API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * POST /drops/drop/:ibutton/:machine_id/:slot_num/:delay - Drop a drink by machine id and slot number, using the specified delay.
 */
$app->post('/drop/{ibutton}/{machine_id}/{slot_num}/{delay}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new \WebDrinkAPI\Utils\API();

    return $response->withJson($api->result(true, "TODO", true));
});


