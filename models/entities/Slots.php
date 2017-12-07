<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Slots
 *
 * @ORM\Table(name="slots")
 * @ORM\Entity
 */
class Slots
{
    /**
     * @var integer
     *
     * @ORM\Column(name="slot_num", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $slotNum;

    /**
     * @var integer
     *
     * @ORM\Column(name="machine_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $machineId;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $itemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="available", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $available = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $status = 'disabled';



    /**
     * Set slotNum
     *
     * @param integer $slotNum
     *
     * @return Slots
     */
    public function setSlotNum($slotNum)
    {
        $this->slotNum = $slotNum;

        return $this;
    }

    /**
     * Get slotNum
     *
     * @return integer
     */
    public function getSlotNum()
    {
        return $this->slotNum;
    }

    /**
     * Set machineId
     *
     * @param integer $machineId
     *
     * @return Slots
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
     * Set itemId
     *
     * @param integer $itemId
     *
     * @return Slots
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
     * Set available
     *
     * @param integer $available
     *
     * @return Slots
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return integer
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Slots
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
}
