<?php

namespace WebDrinkAPI\Models;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * TemperatureLog
 *
 * @ORM\Table(name="temperature_log")
 * @ORM\Entity
 */
class TemperatureLog implements JsonSerializable {
    /**
     * @var integer
     *
     * @ORM\Column(name="log_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $logId;

    /**
     * @var integer
     *
     * @ORM\Column(name="machine_id", type="integer", nullable=false)
     */
    private $machineId;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var float
     *
     * @ORM\Column(name="temp", type="float", precision=10, scale=0, nullable=false)
     */
    private $temp;


    /**
     * Get logId
     *
     * @return integer
     */
    public function getLogId() {
        return $this->logId;
    }

    /**
     * Set machineId
     *
     * @param integer $machineId
     *
     * @return TemperatureLog
     */
    public function setMachineId($machineId) {
        $this->machineId = $machineId;

        return $this;
    }

    /**
     * Get machineId
     *
     * @return integer
     */
    public function getMachineId() {
        return $this->machineId;
    }

    /**
     * Set time
     *
     * @param DateTime $time
     *
     * @return TemperatureLog
     */
    public function setTime($time) {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return DateTime
     */
    public function getTime() {
        return $this->time;
    }

    /**
     * Set temp
     *
     * @param float $temp
     *
     * @return TemperatureLog
     */
    public function setTemp($temp) {
        $this->temp = $temp;

        return $this;
    }

    /**
     * Get temp
     *
     * @return float
     */
    public function getTemp() {
        return $this->temp;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize() {
        return [
            'machine_id' => $this->machineId,
            'time'       => $this->time,
            'temp'       => $this->temp
        ];
    }
}
