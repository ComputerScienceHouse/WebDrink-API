<?php

namespace WebDrinkAPI\Models;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * DrinkItemPriceHistory
 *
 * @ORM\Table(name="drink_item_price_history")
 * @ORM\Entity
 */
class DrinkItemPriceHistory {
    /**
     * @var integer
     *
     * @ORM\Column(name="history_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $historyId;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_id", type="integer", nullable=false)
     */
    private $itemId;

    /**
     * @var string
     *
     * @ORM\Column(name="item_price", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $itemPrice;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_set", type="datetime", nullable=false)
     */
    private $dateSet;


    /**
     * Get historyId
     *
     * @return int
     */
    public function getHistoryId(): int {
        return $this->historyId;
    }

    /**
     * Set itemId
     *
     * @param integer $itemId
     *
     * @return DrinkItemPriceHistory
     */
    public function setItemId($itemId) {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer
     */
    public function getItemId() {
        return $this->itemId;
    }

    /**
     * Set itemPrice
     *
     * @param string $itemPrice
     *
     * @return DrinkItemPriceHistory
     */
    public function setItemPrice($itemPrice) {
        $this->itemPrice = $itemPrice;

        return $this;
    }

    /**
     * Get itemPrice
     *
     * @return string
     */
    public function getItemPrice() {
        return $this->itemPrice;
    }

    /**
     * Set dateSet
     *
     * @param DateTime $dateSet
     *
     * @return DrinkItemPriceHistory
     */
    public function setDateSet($dateSet) {
        $this->dateSet = $dateSet;

        return $this;
    }

    /**
     * Get dateSet
     *
     * @return DateTime
     */
    public function getDateSet() {
        return $this->dateSet;
    }
}
