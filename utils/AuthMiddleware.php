<?php

use Slim\Http\Request;
use Slim\Http\Response;
use WebDrinkAPI\Utils\OIDC;

class AuthMiddleware {
    public function __invoke(Request $request, Response $response, $next) {
        $parsedBody = $request->getParams();

        if (isset($parsedBody["api_key"])) {
            $request = $request->withAttribute('api_key', $parsedBody["api_key"]);

            return $next($request, $response);
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