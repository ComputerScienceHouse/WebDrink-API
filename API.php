<?php

$app->group('/users', function () use ($app) {
    $app->get('/credits/{uid}', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
        return $response->withJson(["msg" => "Testing if this works"]);
    });
});