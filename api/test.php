<?php

use WebDrinkAPI\Models\ApiKeys;

$app->get('/api/{api_key}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    $api_key = $request->getAttribute('api_key');

    $entityManager = \WebDrinkAPI\Utils\Database::getEntityManager();
    $api = new \WebDrinkAPI\Utils\API();

    $api_key = $entityManager->getRepository(ApiKeys::class)->findOneBy(["apiKey" => $api_key]);

    return $response->withJson($api->result(true, "Greetings, " . $api_key->getUid() . "!", true));
});