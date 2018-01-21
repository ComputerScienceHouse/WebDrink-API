<?php

namespace WebDrinkAPI\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApiKeys
 *
 * @ORM\Table(name="drink_images")
 * @ORM\Entity
 */
class DrinkImages {
    /**
     * @var integer
     *
     * @ORM\Column(name="drink_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $drinkId;

    /**
     * @var string
     *
     * @ORM\Column(name="wide", type="string", length=255)
     */
    private $wide;

    /**
     * @var string
     *
     * @ORM\Column(name="square", type="string", length=255)
     */
    private $square;

    /**
     * @return int
     */
    public function getDrinkId(): int {
        return $this->drinkId;
    }

    /**
     * @param int $drinkId
     * @return DrinkImages
     */
    public function setDrinkId(int $drinkId) {
        $this->drinkId = $drinkId;

        return $this;
    }

    /**
     * @return string
     */
    public function getWide(): string {
        return $this->wide;
    }

    /**
     * @param string $wide
     * @return DrinkImages
     */
    public function setWide(string $wide) {
        $this->wide = $wide;

        return $this;
    }

    /**
     * @return string
     */
    public function getSquare(): string {
        return $this->square;
    }

    /**
     * @param string $square
     * @return DrinkImages
     */
    public function setSquare(string $square) {
        $this->square = $square;

        return $this;
    }
}
