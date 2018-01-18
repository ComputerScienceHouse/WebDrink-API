<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Models\ApiKeys;
use WebDrinkAPI\Models\DrinkItemPriceHistory;
use WebDrinkAPI\Models\DrinkItems;
use WebDrinkAPI\Utils\API;
use WebDrinkAPI\Utils\Database;

function addItem($item_name, $item_price, API $api){
    // Creates a entityManager
    $entityManager = Database::getEntityManager();

    // Create new Item
    $item = new DrinkItems();
    $item->setItemName($item_name)->setItemPrice($item_price);

    // Add to database
    $entityManager->persist($item);
    $entityManager->flush($item);

    $item_history = new DrinkItemPriceHistory();
    $item_history->setItemId($item->getItemId())->setItemPrice($item_price);

    // Add to database
    $entityManager->persist($item_history);
    $entityManager->flush($item_history);

    $api->logAPICall('/items/add', json_encode($item));

    return $item;
}

/**
 * GET /items/list - Get a list of all drink items
 */
$app->get('/list', function (Request $request, Response $response) {
    // Creates a entityManager
    $entityManager = Database::getEntityManager();

    $drinkItems = $entityManager->getRepository(DrinkItems::class);
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
    // Grabs the attributes from the url path
    $item_name = $request->getAttribute('name');
    $item_price = $request->getAttribute('price');

    /** @var OpenIDConnectClient $auth */
    $auth = $request->getAttribute('auth');
    /** @var ApiKeys $apiKey */
    $apiKey = $request->getAttribute('api_key');

    if (!is_null($auth)) {
        // Creates an API object for creating returns
        $api = new API($auth->requestUserInfo('preferred_username'));

        if (in_array('drink', $auth->requestUserInfo('groups'))) {
            $item = addItem($item_name, $item_price, $api);
            return $response->withJson($api->result(true, "Success (/items/add)", $item->getItemId()));
        } else {
            return $response->withJson($api->result(false, "Must be an admin to add items (/items/add)", false));
        }
    } else if (!is_null($apiKey)){
        // Creates an API object for creating returns
        $api = new API($apiKey->getUid());

        //TODO: Look up drink admin through ldap
        if (true){
            $item = addItem($item_name, $item_price, $api);
            return $response->withJson($api->result(true, "Success (/items/add)", $item->getItemId()));
        } else {
            return $response->withJson($api->result(false, "Must be an admin to add items (/items/add)", false));
        }
    }
});

/**
 * POST /items/update/:item_id/:name/:price/:status - Update an existing drink item (drink admin only)
 */
$app->post('/update/{item_id}/{name}/{price}/{status}', function (Request $request, Response $response) {
    //TODO
    //TODO: Check for API Key or Auth

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
    //TODO: Check for API Key or Auth

    // Creates an API object for creating returns
    $api = new API();

    return $response->withJson($api->result(true, "TODO", true));
});




