<?php

namespace WebDrinkAPI\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Models\ApiKeys;
use WebDrinkAPI\Utils\Database;
use WebDrinkAPI\Utils\OIDC;

class AuthMiddleware {
    public function __invoke(Request $request, Response $response, $next) {
        $api_key = $request->getParam('api_key');

        if (!is_null($api_key)) {
            // Creates a entityManager
            $entityManager = Database::getEntityManager();

            // Get the API key object from the DB
            $apiKey = $entityManager->getRepository(ApiKeys::class)->findOneBy(["apiKey" => $api_key]);

            if (!is_null($apiKey)) {
                $request = $request->withAttribute('api_key', $apiKey);
                return $next($request, $response);
            } else {
                return $response->withStatus(401, "Bad Api Key");
            }
        } else {
            // Makes route Require Auth
            $oidc = new OIDC();
            $auth = $oidc->getAuth();
            $auth->authenticate();

            $request = $request->withAttribute('auth', $auth);

            return $next($request, $response);
        }

    }
}