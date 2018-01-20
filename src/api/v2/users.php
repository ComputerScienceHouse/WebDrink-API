<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Models\ApiKeys;
use WebDrinkAPI\Utils\API;
use WebDrinkAPI\Utils\LDAP;

/**
 * GET /users/credits/:uid - Get a user's drink credit balance (drink admin only if :uid != your uid)
 */
$app->get('/credits/{uid}', function (Request $request, Response $response) {
    $uid = $request->getAttribute('uid');
    /** @var OpenIDConnectClient $auth */
    $auth = $request->getAttribute('auth');
    /** @var ApiKeys $apiKey */
    $apiKey = $request->getAttribute('api_key');

    // Create LDAP
    $ldap = new LDAP();

    if (!is_null($auth)) {
        // Extract Username
        $username = $auth->requestUserInfo('preferred_username');
        // Create API using username
        $api = new API(2, $username);
        if (in_array('drink', $auth->requestUserInfo('groups')) or $uid == $username) {
            $data = $ldap->ldap_lookup_uid($uid, ['drinkBalance']);
            if (array_key_exists(0, $data)) {
                return $api->result($response, true, "Success (/users/credits)", (int)$data[0]["drinkbalance"][0], 200);
            } else {
                return $api->result($response, false, "Failed to query LDAP (/users/credits)", false, 400);
            }
        } else {
            return $api->result($response, false, "Must be an admin to get another user's credits (/users/credits)", false, 403);
        }
    } else if (!is_null($apiKey)) {
        // Create API using username
        $api = new API(2, $apiKey->getUid());
        if ($api->isAdmin($uid, $ldap) or $uid == $apiKey->getUid()) {
            $data = $ldap->ldap_lookup_uid($uid, ['drinkBalance']);
            if (array_key_exists(0, $data)) {
                return $api->result($response, true, "Success (/users/credits)", (int)$data[0]["drinkbalance"][0], 200);
            } else {
                return $api->result($response, false, "Failed to query LDAP (/users/credits)", false, 400);
            }
        } else {
            return $api->result($response, false, "Must be an admin to get another user's credits (/users/credits)", false, 403);
        }
    }
});

/**
 * POST /users/credits/:uid/:value/:type - Update a user's drink credit balance (drink admin only)
 */
$app->post('/credits/{uid}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $api->result($response, true, "TODO", true, 200);
});

/**
 * GET /users/search/:uid - Search for usernames that match the search :uid
 */
$app->get('/search/{uid}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $api->result($response, true, "TODO", true, 200);
});

/**
 * GET /users/info/:uid/:ibutton - Get a user's info (uid, username, common name, credit balance, and ibutton value)
 */
$app->get('/info/{uid}/{ibutton}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $api->result($response, true, "TODO", true, 200);
});

/**
 * GET /users/drops/:limit/:offset/:uid - Get the drop logs for a single or all users
 */
$app->get('/drops/{limit}/{offset}/{uid}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $api->result($response, true, "TODO", true, 200);
});

/**
 * GET /users/apikey - Get your API key (Auth Only)
 */
$app->get('/apikey', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $api->result($response, true, "TODO", true, 200);
});

/**
 * POST /users/apikey - Generate a new API key for yourself (Auth Only)
 */
$app->post('/apikey', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $api->result($response, true, "TODO", true, 200);
});

/**
 * DELETE /users/apikey - Delete your current API key (Auth Only)
 */
$app->delete('/apikey', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $api->result($response, true, "TODO", true, 200);
});
