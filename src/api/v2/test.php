<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Models\ApiKeys;
use WebDrinkAPI\Utils\API;
use WebDrinkAPI\Utils\Database;
use WebDrinkAPI\Utils\OIDC;

/**
 * GET /test - Test the API
 */
$app->get('', function (Request $request, Response $response) {
    // Creates an API object for creating returns
    $api = new API(2);

    return $api->result($response, true, "Greetings from the Drink API!", true, 200);
});

/**
 * GET /test/auth - Test the API with Auth authentication (Auth only)
 */
$app->get('/auth', function (Request $request, Response $response) {
    // Makes route Require Auth
    $oidc = new OIDC();
    $auth = $oidc->getAuth();
    $auth->authenticate();

    // Creates an API object for creating returns
    $api = new API(2);

    return $api->result($response, true, "TODO", $auth->requestUserInfo(), 200);
});

/**
 * GET /test/api/:api_key - Test the API with API key authentication (API key only)
 */
$app->get('/api/{api_key}', function (Request $request, Response $response) {
    // Grabs api key from the url path
    $api_key = $request->getAttribute('api_key');

    // Creates a entityManager
    $entityManager = Database::getEntityManager();

    // Get the API key object from the DB
    $apiKey = $entityManager->getRepository(ApiKeys::class)->findOneBy(["apiKey" => $api_key]);

    if (is_null($apiKey) or empty($apiKey)) {
        // API object constructed
        $api = new API(2);
        return $api->result($response, false, "Try again with a valid API key", false, 400);
    } else {
        // API object constructed with username
        $api = new API(2, $apiKey->getUid());
        return $api->result($response, true, "Greetings, " . $apiKey->getUid() . "!", true, 200);
    }
});