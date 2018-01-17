<?php

namespace WebDrinkAPI\Utils;

use OpenIDConnectClient;

$oidc = new OpenIDConnectClient(OIDC_PROVIDER_URL, OIDC_CLIENT_ID, OIDC_CLIENT_SECRET);
$oidc->authenticate();
