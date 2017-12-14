<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Utils\API;

/**
 * GET /drops/status/:ibutton - Check the Websocket connection to the drink server
 */
$app->get('/status/{ibutton}', function (Request $request, Response $response) {
    // Getting route attributes
    $ibutton = $request->getAttribute('ibutton');

    // Creates an API object for creating returns
    $api = new API();

    // Connect to the Drink Server through a websocket
    if (DEBUG && USE_LOCAL_DRINK_SERVER) {
        $elephant = new ElephantIO\Client(LOCAL_DRINK_SERVER_URL, "socket.io", 1, false, true, true);
    } else {
        $elephant = new ElephantIO\Client(DRINK_SERVER_URL, "socket.io", 1, false, true, true);
    }

    try {
        $elephant->init();
        $elephant->emit('ibutton', ['ibutton' => $ibutton]);
        $elephant->on('ibutton_recv', function ($data) use ($api, $response, $elephant) {
            $success = explode(":", $data);
            $success = $success[0];

            // Checks for a successful response from the websocket
            if ($success === "OK") {
                $elephant->close();
                return $response->withJson($api->result(true, "Success! (/drops/status)", true));
            } else {
                $elephant->close();
                return $response->withJson($api->result(false, "Invalid iButton (/drops/status)", false));
            }
        });
    } catch (Exception $e) {
        return $this->_result(false, $e->getMessage() . " (/drops/drop)", false);
    }

    // In case there's a failure
    $elephant->close();
    return $response->withJson($api->result(false, "Unable to get a result from Server (/drops/status)", false));
});

/**
 * POST /drops/drop/:ibutton/:machine_id/:slot_num/:delay - Drop a drink by machine id and slot number, using the specified delay.
 */
$app->post('/drop/{ibutton}/{machine_id}/{slot_num}/{delay}', function (Request $request, Response $response) {
    // Getting route attributes
    $ibutton = $request->getAttribute('ibutton');
    $machine_id = $request->getAttribute('machine_id');
    $slot_num = $request->getAttribute('slot_num');
    $delay = $request->getAttribute('delay');

    // Creates an API object for creating returns
    $api = new API();

    if (is_null($ibutton)) {
        //TODO: Get iButton data from ldap for user
    }

    // Check for machine_id and convert to machine_alias
    if (isset($machine_id)) {
        //TODO: Get the alias of a machine based on id
        $machine_alias = null;
    } else {
        return $response->withJson($api->result(false, "Invalid 'machine_id' (/drops/drop)", false));
    }

    // Check if rate limited
    $rateLimitDelay = RATE_LIMIT_DROPS_DROP;
    if ($this->_isRateLimited("/drops/drop", $rateLimitDelay, $machine_alias)) {
        return $response->withJson($api->result(false, "Cannon exceed one call per {$rateLimitDelay} seconds (/drops/drop)", false));
    }

    // Connect to the Drink Server through a websocket
    if (DEBUG && USE_LOCAL_DRINK_SERVER) {
        $elephant = new ElephantIO\Client(LOCAL_DRINK_SERVER_URL, "socket.io", 1, false, true, true);
    } else {
        $elephant = new ElephantIO\Client(DRINK_SERVER_URL, "socket.io", 1, false, true, true);
    }

    try {
        $elephant->init();
        $elephant->emit('ibutton', ['ibutton' => $ibutton]);
        $elephant->on('ibutton_recv', function ($data) use ($machine_alias, $slot_num, $delay, $api, $response, $elephant) {
            $success = explode(":", $data);
            $success = $success[0];

            // Checks for a successful response from the websocket
            if ($success === "OK") {
                // Connect to the drink machine
                $elephant->emit('machine', ['machine_id' => $machine_alias]);
                $elephant->on('machine_recv', function ($data) use ($machine_alias, $response, $api, $slot_num, $delay, $elephant) {
                    $success = explode(":", $data);
                    $success = $success[0];

                    if ($success === "OK") {
                        // Drop the drink
                        $elephant->emit('drop', ['slot_num' => $slot_num, 'delay' => $delay]);
                        $elephant->on('drop_recv', function ($data) use ($machine_alias, $api, $response, $elephant) {
                            $success = explode(":", $data);
                            $success = $success[0];

                            if ($success === "OK") {
                                $api->logAPICall("/drops/drop", $machine_alias);
                                $elephant->close();
                                return $response->withJson($api->result(true, "Drink dropped!", true));
                            } else {
                                $elephant->close();
                                return $response->withJson($api->result(false, "Error dropping drink: {$data} (/drops/drop)", $data));
                            }
                        });
                    } else {
                        $elephant->close();
                        return $response->withJson($api->result(false, "Error contacting machine: {$data} (/drops/drop)", $data));
                    }
                });
            } else {
                $elephant->close();
                return $response->withJson($api->result(false, "Invalid iButton (/drops/status)", false));
            }
            $elephant->keepAlive();
        });
    } catch (Exception $e) {
        return $response->withJson($api->result(false, $e->getMessage() . " (/drops/drop)", false));
    }

    // In case there's a failure
    $elephant->close();
    return $response->withJson($api->result(false, "Unable to get a result from Server (/drops/drop)", false));
});


