<?php

namespace WebDrinkAPI\Models;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * ApiKeys
 *
 * @ORM\Table(name="api_keys")
 * @ORM\Entity
 */
class ApiKeys
{
    /**
     * @var string
     *
     * @ORM\Column(name="uid", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uid;

    /**
     * @var string
     *
     * @ORM\Column(name="api_key", type="string", length=100, nullable=false)
     */
    private $apiKey;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';


    /**
     * Get uid
     *
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set apiKey
     *
     * @param string $apiKey
     *
     * @return ApiKeys
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set date
     *
     * @param DateTime $date
     *
     * @return ApiKeys
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
