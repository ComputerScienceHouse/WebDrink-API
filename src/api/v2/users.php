<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Models\ApiKeys;
use WebDrinkAPI\Utils\API;
use WebDrinkAPI\Utils\LDAP;
use WebDrinkAPI\Utils\OIDC;

/**
 * GET /users/credits/:uid - Get a user's drink credit balance (drink admin only if :uid != your uid)
 */
$app->get('/credits/{uid}', function (Request $request, Response $response) {
    $uid = $request->getAttribute('uid');
    /** @var OpenIDConnectClient $auth */
    $auth = $request->getAttribute('auth');
    /** @var ApiKeys $apiKey */
    $apiKey = $request->getAttribute('api_key');

    $ldap = new LDAP();

    if (!is_null($auth)) {
        $api = new API(2, $auth->requestUserInfo('preferred_username'));
        if (in_array('drink', $auth->requestUserInfo('groups')) or $uid == $auth->requestUserInfo('preferred_username')) {
            $data = $ldap->ldap_lookup_uid($uid, ['drinkBalance']);
            if (array_key_exists(0, $data)) {
                return $response->withJson($api->result(true, "Success (/users/credits)", (int) $data[0]["drinkbalance"][0]), 200, JSON_PRETTY_PRINT);
            }
            else {
                return $response->withJson($api->result(false, "Failed to query LDAP (/users/credits)", false), 400, JSON_PRETTY_PRINT);
            }
        } else {
            return $response->withJson($api->result(false, "Must be an admin to get another user's credits (/users/credits)", false), 403, JSON_PRETTY_PRINT);
        }
    } else if (!is_null($apiKey)){
        $api = new API(2, $apiKey->getUid());

        //TODO: Look up drink admin through ldap
        if (true) {
            $data = $ldap->ldap_lookup_uid($uid, ['drinkBalance']);
            if (array_key_exists(0, $data)) {
                return $response->withJson($api->result(true, "Success (/users/credits)", (int) $data[0]["drinkbalance"][0]), 200, JSON_PRETTY_PRINT);
            }
            else {
                return $response->withJson($api->result(false, "Failed to query LDAP (/users/credits)", false), 400, JSON_PRETTY_PRINT);
            }
        } else {
            return $response->withJson($api->result(false, "Must be an admin to get another user's credits (/users/credits)", false), 403, JSON_PRETTY_PRINT);
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

    return $response->withJson($api->result(true, "TODO", true), 200, JSON_PRETTY_PRINT);
});

/**
 * GET /users/search/:uid - Search for usernames that match the search :uid
 */
$app->get('/search/{uid}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $response->withJson($api->result(true, "TODO", true), 200, JSON_PRETTY_PRINT);
});

/**
 * GET /users/info/:uid/:ibutton - Get a user's info (uid, username, common name, credit balance, and ibutton value)
 */
$app->get('/info/{uid}/{ibutton}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $response->withJson($api->result(true, "TODO", true), 200, JSON_PRETTY_PRINT);
});

/**
 * GET /users/drops/:limit/:offset/:uid - Get the drop logs for a single or all users
 */
$app->get('/drops/{limit}/{offset}/{uid}', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $response->withJson($api->result(true, "TODO", true), 200, JSON_PRETTY_PRINT);
});

/**
 * GET /users/apikey - Get your API key (Auth Only)
 */
$app->get('/apikey', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $response->withJson($api->result(true, "TODO", true), 200, JSON_PRETTY_PRINT);
});

/**
 * POST /users/apikey - Generate a new API key for yourself (Auth Only)
 */
$app->post('/apikey', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $response->withJson($api->result(true, "TODO", true), 200, JSON_PRETTY_PRINT);
});

/**
 * DELETE /users/apikey - Delete your current API key (Auth Only)
 */
$app->delete('/apikey', function (Request $request, Response $response) {
    //TODO

    // Creates an API object for creating returns
    $api = new API(2);

    return $response->withJson($api->result(true, "TODO", true), 200, JSON_PRETTY_PRINT);
});
