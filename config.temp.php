<?php

$get_data = function (&$var, $default = null) {
    return !empty($var) ? $var : $default;
};

/*
 * *	General configuration
 * */

define("DRINK_SERVER_URL", $get_data(getenv("DRINK_SERVER_URL"), 'https://drink.csh.rit.edu:8080')); // Base URL for the Drink (websocket) server
define("LOCAL_DRINK_SERVER_URL", $get_data(getenv("LOCAL_DRINK_SERVER_URL"), 'http://localhost:3000')); // URL (and port) of test drink server (see /test directory)

/*
 * *	Database configuration
 * */


define("DB_NAME", $get_data(getenv("DB_NAME"), 'drink'));
define("DB_USER", $get_data(getenv("DB_USER"), 'drink'));
define("DB_PASSWORD", $get_data(getenv("DB_PASSWORD"), 'password'));
define("DB_HOST", $get_data(getenv("DB_HOST"), 'localhost'));
define("DB_DRIVER", $get_data(getenv("DB_DRIVER"), 'pdo_mysql'));

/*
 * *    OpenId configuration
 * */

define("OIDC_PROVIDER_URL", $get_data(getenv("OIDC_PROVIDER_URL"), 'https://sso.csh.rit.edu/auth/realms/csh'));
define("OIDC_CLIENT_ID", $get_data(getenv("OIDC_CLIENT_ID"), ''));
define("OIDC_CLIENT_SECRET", $get_data(getenv("OIDC_CLIENT_SECRET"), ''));

/*
 * *	Rate limit delays (one call per X seconds)
 * */

define("RATE_LIMIT_DROPS_DROP", $get_data(getenv("RATE_LIMIT_DROPS_DROP"), 3)); // Rate limit for /drops/drop

/*
 * *	Development configuration
 * */

define("DEBUG", $get_data(getenv("DEBUG"), true)); // true for test mode, false for production

define("DEBUG_USER_UID", $get_data(getenv("DEBUG_USER_UID"), 'matted')); // If DEBUG is `true`, the UID of the test user (probably your own)
define("DEBUG_USER_CN", $get_data(getenv("DEBUG_USER_CN"), 'Devin Matte')); // If DEBUG is `true`, the display name of the user (probably your own)

define("USE_LOCAL_DRINK_SERVER", $get_data(getenv("USE_LOCAL_DRINK_SERVER"), true)); // If set to `true` and DEBUG is `true`, will use a mock Drink server for developing
