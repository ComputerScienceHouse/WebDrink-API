<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Models\DrinkItems;
use WebDrinkAPI\Utils\API;
use WebDrinkAPI\Utils\Database;

/**
 * GET /items/list - Get a list of all drink items
 */
$app->get('/list', function (Request $request, Response $response) {
    $entitymanager = Database::getEntityManager();
    $drinkItems = $entitymanager->getRepository(DrinkItems::class);
    $activeItems = $drinkItems->findBy(["state" => "active"]);

    // Creates an API object for creating returns
    $api = new API();

    if (!empty($activeItems)){
        return $response->withJson($api->result(true, "Success (/items/list)", $activeItems));
    } else {
        return $response->withJson($api->result(true, "Failed to query database (/items/list)", false));
    }
});

/**
 * POST /items/add/:name/:price - Add a new drink item (drink admin only)
 * TODO: Make PUT
 */
$app->post('/add/{name}/{price}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * POST /items/update/:item_id/:name/:price/:status - Update an existing drink item (drink admin only)
 */
$app->post('/update/{item_id}/{name}/{price}/{status}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * POST /items/delete/:item_id - Delete a drink item (drink admin only)
 * TODO: Make DELETE
 */
$app->post('/delete/{item_id}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});




