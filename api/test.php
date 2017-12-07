<?php
$app->get('/api/{api_key}', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
    $api_key = $request->getAttribute('api_key');

    $entityManager = \utils\Database::getEntityManager();

    $api_key = $entityManager->getRepository(\Models\ApiKeys::class)->findOneBy(["api_key" => $api_key]);

    $api = new \utils\API();

    return $response->withJson($api->result(true, "Worked", $api_key));
});