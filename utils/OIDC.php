<?php

namespace WebDrinkAPI\Utils;

use OpenIDConnectClient;

class OIDC {

    private $oidc;

    public function __construct() {
        $this->oidc = new OpenIDConnectClient(OIDC_PROVIDER_URL, OIDC_CLIENT_ID, OIDC_CLIENT_SECRET);
    }

    public function getAuth() {
        return $this->oidc;
    }
}

