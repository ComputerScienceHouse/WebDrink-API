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
    $api = new API(2);

    // Connect to the Drink Server through a websocket
    if (DEBUG && USE_LOCAL_DRINK_SERVER) {
        $elephant = new ElephantIO\Client(LOCAL_DRINK_SERVER_URL, "socket.io", 1, false, true, true);
    } else {
        $elephant = new ElephantIO\Client(DRINK_SERVER_URL, "socket.io", 1, false, true, true);
    }

    // Default output if failure
    $output = [false, "Unable to get a result from Server (/drops/status)", false];

    try {
        $elephant->init();
        $elephant->emit('ibutton', ['ibutton' => $ibutton]);
        $elephant->on('ibutton_recv', function ($data) use ($api, $response, $elephant, &$output) {
            $success = explode(":", $data);
            $success = $success[0];

            // Checks for a successful response from the websocket
            if ($success === "OK") {
                $output = [true, "Success! (/drops/status)", true];
                $elephant->close();
            } else {
                $output = [false, "Invalid iButton (/drops/status)", false];
                $elephant->close();
            }
        });
        // Keep Alive required
        $elephant->keepAlive();
    } catch (Exception $e) {
        $output = [false, $e->getMessage() . " (/drops/drop)", false];
    }

    $elephant->close();
    return $api->result($response, $output[0], $output[1], $output[2], 200);
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
    $api = new API(2);

    if (is_null($ibutton)) {
        //TODO: Get iButton data from ldap for user
    }

    // Check for machine_id and convert to machine_alias
    if (isset($machine_id)) {
        //TODO: Get the alias of a machine based on id
        $machine_alias = null;
    } else {
        return $api->result($response, false, "Invalid 'machine_id' (/drops/drop)", false, 400);
    }

    // Check if rate limited
    $rateLimitDelay = RATE_LIMIT_DROPS_DROP;
    if ($this->_isRateLimited("/drops/drop", $rateLimitDelay, $machine_alias)) {
        return $api->result($response, false, "Cannon exceed one call per {$rateLimitDelay} seconds (/drops/drop)", false, 400);
    }

    // Connect to the Drink Server through a websocket
    if (DEBUG && USE_LOCAL_DRINK_SERVER) {
        $elephant = new ElephantIO\Client(LOCAL_DRINK_SERVER_URL, "socket.io", 1, false, true, true);
    } else {
        $elephant = new ElephantIO\Client(DRINK_SERVER_URL, "socket.io", 1, false, true, true);
    }

    // Default output if failure
    $output = [false, "Unable to get a result from Server (/drops/drop)", false];

    try {
        $elephant->init();
        $elephant->emit('ibutton', ['ibutton' => $ibutton]);
        $elephant->on('ibutton_recv', function ($data) use ($machine_alias, $slot_num, $delay, $api, $response, $elephant, &$output) {
            $success = explode(":", $data);
            $success = $success[0];

            // Checks for a successful response from the websocket
            if ($success === "OK") {
                // Connect to the drink machine
                $elephant->emit('machine', ['machine_id' => $machine_alias]);
                $elephant->on('machine_recv', function ($data) use ($machine_alias, $response, $api, $slot_num, $delay, $elephant, &$output) {
                    $success = explode(":", $data);
                    $success = $success[0];

                    if ($success === "OK") {
                        // Drop the drink
                        $elephant->emit('drop', ['slot_num' => $slot_num, 'delay' => $delay]);
                        $elephant->on('drop_recv', function ($data) use ($machine_alias, $api, $response, $elephant, &$output) {
                            $success = explode(":", $data);
                            $success = $success[0];

                            if ($success === "OK") {
                                //TODO: Logging Drops
                                $api->logAPICall("/drops/drop", $machine_alias);
                                $output = [true, "Drink dropped!", true];
                                $elephant->close();
                            } else {
                                $elephant->close();
                                $output = [false, "Error dropping drink: {$data} (/drops/drop)", $data];
                            }
                        });
                    } else {
                        $output = [false, "Error contacting machine: {$data} (/drops/drop)", $data];
                        $elephant->close();
                    }
                });
            } else {
                $output = [false, "Invalid iButton (/drops/status)", false];
                $elephant->close();
            }
            $elephant->keepAlive();
        });
    } catch (Exception $e) {
        $output = [false, $e->getMessage() . " (/drops/drop)", false];
    }

    $elephant->close();
    return $api->result($response, $output[0], $output[1], $output[2], 200);
});


