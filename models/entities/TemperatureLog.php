<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TemperatureLog
 *
 * @ORM\Table(name="temperature_log")
 * @ORM\Entity
 */
class TemperatureLog
{
    /**
     * @var integer
     *
     * @ORM\Column(name="machine_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $machineId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $time = 'CURRENT_TIMESTAMP';

    /**
     * @var float
     *
     * @ORM\Column(name="temp", type="float", precision=10, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $temp;



    /**
     * Set machineId
     *
     * @param integer $machineId
     *
     * @return TemperatureLog
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
     * Set time
     *
     * @param \DateTime $time
     *
     * @return TemperatureLog
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
     * Set temp
     *
     * @param float $temp
     *
     * @return TemperatureLog
     */
    public function setTemp($temp)
    {
        $this->temp = $temp;

        return $this;
    }

    /**
     * Get temp
     *
     * @return float
     */
    public function getTemp()
    {
        return $this->temp;
    }
}
