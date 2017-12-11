<?php

use WebDrinkAPI\Models\ApiKeys;

/**
 * GET /test - Test the API
 */
$app->get('', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    // Creates an API object for creating returns
    $api = new \WebDrinkAPI\Utils\API();

    return $response->withJson($api->result(true, "Greetings from the Drink API!", true));
});

/**
 * GET /test/webauth - Test the API with Webauth authentication (Webauth only)
 */
$app->get('/webauth', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new \WebDrinkAPI\Utils\API();

    return $response->withJson($api->result(true, "TODO", true));
});

/**
 * GET /test/api/:api_key - Test the API with API key authentication (API key only)
 */
$app->get('/api/{api_key}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    // Grabs api key from the url path
    $api_key = $request->getAttribute('api_key');

    // Creates a entityManager and an API object
    $entityManager = \WebDrinkAPI\Utils\Database::getEntityManager();
    $api = new \WebDrinkAPI\Utils\API();

    // Get the API key object from the DB
    $api_key = $entityManager->getRepository(ApiKeys::class)->findOneBy(["apiKey" => $api_key]);

    //TODO: Check for valid key
    return $response->withJson($api->result(true, "Greetings, " . $api_key->getUid() . "!", true));
});