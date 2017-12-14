<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Utils\API;

/**
 * GET /drops/status - Check the Websocket connection to the drink server
 */
$app->get('/status', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * POST /drops/drop/:ibutton/:machine_id/:slot_num/:delay - Drop a drink by machine id and slot number, using the specified delay.
 */
$app->post('/drop/{ibutton}/{machine_id}/{slot_num}/{}', function (Request $request, Response $response) {
    $ibutton = $request->getAttribute('ibutton');
    $machine_id = $request->getAttribute('machine_id');
    $slot_num = $request->getAttribute('slot_num');
    $delay = $request->getAttribute('delay');

    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});


