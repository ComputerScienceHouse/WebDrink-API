<?php

/**
 * GET /temps/machines/:machine_id/:limit/:offset - Get temperature data for a single drink machine
 */
$app->get('/machines/{machine_id}/{limit}/{offset}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new \WebDrinkAPI\Utils\API();

    return $response->withJson($api->result(true, "TODO", true));
});