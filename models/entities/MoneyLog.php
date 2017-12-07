<?php

namespace WebDrinkAPI\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * MoneyLog
 *
 * @ORM\Table(name="money_log")
 * @ORM\Entity
 */
class MoneyLog
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $time = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="admin", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $admin;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="direction", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $direction = 'out';

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $reason;



    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return MoneyLog
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return MoneyLog
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
     * Set admin
     *
     * @param string $admin
     *
     * @return MoneyLog
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return string
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return MoneyLog
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set direction
     *
     * @param string $direction
     *
     * @return MoneyLog
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Set reason
     *
     * @param string $reason
     *
     * @return MoneyLog
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }
}
