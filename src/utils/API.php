<?php

namespace WebDrinkAPI\Utils;

use Slim\Http\Response;
use WebDrinkAPI\Models\ApiCalls;
use WebDrinkAPI\Models\DropLog;

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
     * @param Response $response
     * @param $status bool
     * @param $message string
     * @param $data
     * @param int $code
     * @return Response
     */
    public function result(Response $response, bool $status, string $message, $data, int $code) {
        return $response->withJson([
            "status"  => $status,
            "message" => $message,
            "data"    => $data
        ], $code, JSON_PRETTY_PRINT);
    }

    /**
     * Log an API call
     * @param $api_method
     * @param null $detail
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function logAPICall($api_method, $detail = null): void {
        $new_call = new ApiCalls();
        $entityManager = Database::getEntityManager();

        $new_call->setUsername($this->user)->setApiMethod($api_method)->setDetail($detail)->setApiVersion($this->version);

        $entityManager->persist($new_call);
        $entityManager->flush();
    }

    /**
     * Logs all drops from the machines
     * @param int $machine_id
     * @param int $slot
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function logDrop(integer $machine_id, integer $slot): void {
        $drop_log = new DropLog();
        $entityManager = Database::getEntityManager();

        // TODO: Retrieve Slot data to get item_id, item_price, & status

        $drop_log->setUsername($this->user)->setMachineId($machine_id)->setSlot($slot);

        $entityManager->persist($drop_log);
        $entityManager->flush($drop_log);
    }

    /**
     * Checks if user is drink admin
     * @param string $uid
     * @param LDAP $ldap
     * @return mixed
     */
    public function isAdmin(string $uid, LDAP $ldap = null) {
        if ($ldap === null) {
            $ldap = new LDAP();
        }
        $result = $ldap->ldap_lookup_uid($uid, ['drinkAdmin']);
        if (isset($result[0]["drinkadmin"][0])) {
            return $result[0]["drinkadmin"][0];
        }
        return false;
    }
}