<?php

/**
 * GET /temps/machines/:machine_id/:limit/:offset - Get temperature data for a single drink machine
 */

use WebDrinkAPI\Models\TemperatureLog;

$app->get('/machines/{machine_id}/{limit}/{offset}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {
    $machine_id = $request->getAttribute('machine_id');
    $limit = $request->getAttribute('limit');
    $offset = $request->getAttribute('offset');

    // Creates an API object for creating returns
    $api = new \WebDrinkAPI\Utils\API();

    // Creates a entityManager
    $entityManager = \WebDrinkAPI\Utils\Database::getEntityManager();

    // Gets all logs from DB
    $temps = $entityManager->getRepository(TemperatureLog::class)->findBy(["machineId" => $machine_id], ["time" => "DESC"], $limit, $offset);

    // Builds values into return JSON
    $values = [];

    foreach ($temps as &$temp) {
        $values['machine_id'] = $temp->getMachineId();
    }

    return $response->withJson($api->result(true, "TODO", $values));
});