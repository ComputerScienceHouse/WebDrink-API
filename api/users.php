<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Utils\API;

/**
 * GET /users/credits/:uid - Get a user's drink credit balance (drink admin only if :uid != your uid)
 */
$app->get('/credits/{uid}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * POST /users/credits/:uid/:value/:type - Update a user's drink credit balance (drink admin only)
 */
$app->post('/credits/{uid}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * GET /users/search/:uid - Search for usernames that match the search :uid
 */
$app->get('/search/{uid}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * GET /users/info/:uid/:ibutton - Get a user's info (uid, username, common name, credit balance, and ibutton value)
 */
$app->get('/info/{uid}/{ibutton}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * GET /users/drops/:limit/:offset/:uid - Get the drop logs for a single or all users
 */
$app->get('/drops/{limit}/{offset}/{uid}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * GET /users/apikey - Get your API key (Webauth Only)
 */
$app->get('/apikey', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * POST /users/apikey - Generate a new API key for yourself (Webauth Only)
 */
$app->post('/apikey', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * DELETE /users/apikey - Delete your current API key (Webauth Only)
 */
$app->delete('/apikey', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});
