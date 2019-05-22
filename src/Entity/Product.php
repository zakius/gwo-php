<?php


namespace Recruitment\Entity;


use InvalidArgumentException;
use Recruitment\Entity\Exception\InvalidUnitPriceException;


class Product
{
    private $id;
    private $unitPrice;
    private $minimumQuantity;


    public function __construct()
    {
        $this->minimumQuantity = 1;
    }

    /**
     * @param int $unitPrice
     *
     * @return $this
     * @throws InvalidUnitPriceException
     */
    public function setUnitPrice(int $unitPrice): Product
    {
        if ($unitPrice < 1) {
            throw new InvalidUnitPriceException();
        }
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }


    /**
     * @param int $minimumQuantity
     *
     * @return $this
     */
    public function setMinimumQuantity(int $minimumQuantity): Product
    {
        if ($minimumQuantity < 1) {
            throw new InvalidArgumentException();
        }
        $this->minimumQuantity = $minimumQuantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinimumQuantity(): int
    {
        return $this->minimumQuantity;
    }


    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }


}