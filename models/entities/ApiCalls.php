<?php

namespace WebDrinkAPI\Models;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * ApiCalls
 *
 * @ORM\Table(name="api_calls")
 * @ORM\Entity
 */
class ApiCalls
{
    /**
     * @var integer
     *
     * @ORM\Column(name="call_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $callId;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="api_method", type="string", length=255, nullable=false)
     */
    private $apiMethod;

    /**
     * @var integer
     *
     * @ORM\Column(name="api_version", type="int", length=11, nullable=false)
     */
    private $apiVersion;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255, nullable=false)
     */
    private $detail;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    private $timestamp;


    /**
     * Get callId
     *
     * @return integer
     */
    public function getCallId()
    {
        return $this->callId;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return ApiCalls
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set apiMethod
     *
     * @param string $apiMethod
     *
     * @return ApiCalls
     */
    public function setApiMethod($apiMethod)
    {
        $this->apiMethod = $apiMethod;

        return $this;
    }

    /**
     * Get apiMethod
     *
     * @return string
     */
    public function getApiMethod()
    {
        return $this->apiMethod;
    }

    /**
     * Set apiVersion
     *
     * @param int $apiVersion
     *
     * @return ApiCalls
     */
    public function setApiVersion(int $apiVersion) {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * Get apiVersion
     *
     * @return int
     */
    public function getApiVersion(): int {
        return $this->apiVersion;
    }

    /**
     * Set detail
     *
     * @param string $detail
     *
     * @return ApiCalls
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set timestamp
     *
     * @param DateTime $timestamp
     *
     * @return ApiCalls
     */
    public function setTimestamp($timestamp = null)
    {
        if ($timestamp != null){
            $this->timestamp = $timestamp;
        } else {
            $this->timestamp = new DateTime();
        }


        return $this;
    }

    /**
     * Get timestamp
     *
     * @return DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
