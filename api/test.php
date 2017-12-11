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

    // Creates a entityManager
    $entityManager = \WebDrinkAPI\Utils\Database::getEntityManager();

    // Get the API key object from the DB
    $apiKey = $entityManager->getRepository(ApiKeys::class)->findOneBy(["apiKey" => $api_key]);

    // API object constructed with username
    $api = new \WebDrinkAPI\Utils\API($apiKey->getUid());

    if (is_null($apiKey) or empty($apiKey)) {
        return $response->withJson($api->result(false, "Try again with a valid API key", false));
    } else if (!is_null($apiKey->getUid()) and !empty($apiKey->getUid())) {
        //TODO: Remove logging for Tests
        $api->logAPICall("/test/api", $api_key);
        return $response->withJson($api->result(true, "Greetings, " . $apiKey->getUid() . "!", true));
    } else {
        return $response->withJson($api->result(false, "Username not found", false));
    }
});