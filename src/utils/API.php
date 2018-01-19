<?php

namespace WebDrinkAPI\Utils;

use WebDrinkAPI\Models\ApiCalls;
use WebDrinkAPI\Utils\Database;

class API {
    private $user;
    private $version;

    /**
     * API constructor.
     * @param string $user
     * @param int $version
     */
    public function __construct(int $version, string $user = null) {
        $this->user = $user;
        $this->version = $version;
    }


    /**
     * Format the result of an API call
     * @param $status bool
     * @param $message string
     * @param $data
     * @return array
     */
    public function result(bool $status, string $message, $data) {
        return [
            "status"  => $status,
            "message" => $message,
            "data"    => $data
        ];
    }

    /**
     * Log an API call
     * @param $api_method
     * @param null $detail
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function logAPICall($api_method, $detail = null) {
        $new_call = new ApiCalls();
        $entityManager = Database::getEntityManager();

        $new_call->setUsername($this->user)->setApiMethod($api_method)->setDetail($detail)->setApiVersion($this->version);

        $entityManager->persist($new_call);
        $entityManager->flush();
    }
}