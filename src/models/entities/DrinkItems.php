<?php

namespace WebDrinkAPI\Models;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * DrinkItems
 *
 * @ORM\Table(name="drink_items")
 * @ORM\Entity
 */
class DrinkItems implements JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="item_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $itemId;

    /**
     * @var string
     *
     * @ORM\Column(name="item_name", type="string", length=255, nullable=false)
     */
    private $itemName;

    /**
     * @var string
     *
     * @ORM\Column(name="item_price", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $itemPrice = '0';

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=10, nullable=false)
     */
    private $state = 'active';



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
     * Set itemName
     *
     * @param string $itemName
     *
     * @return DrinkItems
     */
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;

        return $this;
    }

    /**
     * Get itemName
     *
     * @return string
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * Set itemPrice
     *
     * @param string $itemPrice
     *
     * @return DrinkItems
     */
    public function setItemPrice($itemPrice)
    {
        $this->itemPrice = $itemPrice;

        return $this;
    }

    /**
     * Get itemPrice
     *
     * @return string
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    /**
     * Set dateAdded
     *
     * @param DateTime $dateAdded
     *
     * @return DrinkItems
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return DrinkItems
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
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
            'item_id' => $this->itemId,
            'item_name' => $this->itemName,
            'item_price' => $this->itemPrice,
            'state' => $this->state
        ];
    }
}
