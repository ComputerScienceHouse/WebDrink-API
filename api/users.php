<?php
$app->get('/credits/{uid}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    return $response->withJson(["msg" => "Testing if this works"]);
});