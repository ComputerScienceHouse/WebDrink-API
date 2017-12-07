<?php



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
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="api_method", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $apiMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $detail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $timestamp = 'CURRENT_TIMESTAMP';



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
     * @param \DateTime $timestamp
     *
     * @return ApiCalls
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
