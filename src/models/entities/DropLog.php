<?php

namespace WebDrinkAPI\Models;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * DropLog
 *
 * @ORM\Table(name="drop_log")
 * @ORM\Entity
 */
class DropLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="drop_log_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dropLogId;

    /**
     * @var integer
     *
     * @ORM\Column(name="machine_id", type="integer", nullable=false)
     */
    private $machineId;

    /**
     * @var string
     *
     * @ORM\Column(name="slot", type="string", length=50, nullable=false)
     */
    private $slot;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=50, nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_id", type="integer", nullable=false)
     */
    private $itemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="current_item_price", type="integer", nullable=false)
     */
    private $currentItemPrice;



    /**
     * Get dropLogId
     *
     * @return integer
     */
    public function getDropLogId()
    {
        return $this->dropLogId;
    }

    /**
     * Set machineId
     *
     * @param integer $machineId
     *
     * @return DropLog
     */
    public function setMachineId($machineId)
    {
        $this->machineId = $machineId;

        return $this;
    }

    /**
     * Get machineId
     *
     * @return integer
     */
    public function getMachineId()
    {
        return $this->machineId;
    }

    /**
     * Set slot
     *
     * @param string $slot
     *
     * @return DropLog
     */
    public function setSlot($slot)
    {
        $this->slot = $slot;

        return $this;
    }

    /**
     * Get slot
     *
     * @return string
     */
    public function getSlot()
    {
        return $this->slot;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return DropLog
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
     * Set time
     *
     * @param DateTime $time
     *
     * @return DropLog
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return DropLog
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set itemId
     *
     * @param integer $itemId
     *
     * @return DropLog
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set currentItemPrice
     *
     * @param integer $currentItemPrice
     *
     * @return DropLog
     */
    public function setCurrentItemPrice($currentItemPrice)
    {
        $this->currentItemPrice = $currentItemPrice;

        return $this;
    }

    /**
     * Get currentItemPrice
     *
     * @return integer
     */
    public function getCurrentItemPrice()
    {
        return $this->currentItemPrice;
    }
}
