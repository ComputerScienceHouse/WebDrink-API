<?php
$app->get('/stock/{machine_id}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    return $response->withJson(["msg" => "Testing if this works"]);
});