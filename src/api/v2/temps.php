<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Models\TemperatureLog;
use WebDrinkAPI\Utils\API;
use WebDrinkAPI\Utils\Database;

/**
 * GET /temps/machines/:machine_id/:limit/:offset - Get temperature data for a single drink machine
 */
$app->get('/machines/{machine_id}/{limit}/{offset}', function (Request $request, Response $response) {
    $machine_id = $request->getAttribute('machine_id');
    $limit = $request->getAttribute('limit');
    $offset = $request->getAttribute('offset');

    // Creates an API object for creating returns
    $api = new API(2);

    // Creates a entityManager
    $entityManager = Database::getEntityManager();

    // Gets all logs from DB
    $temps = $entityManager->getRepository(TemperatureLog::class)->findBy(["machineId" => $machine_id], ["time" => "DESC"], $limit, $offset);

    return $response->withJson($api->result(true, "Success (/temps/machines)", $temps), 200, JSON_PRETTY_PRINT);
});