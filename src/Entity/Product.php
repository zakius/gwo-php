<?php


namespace Recruitment\Entity;

use InvalidArgumentException;
use Recruitment\Entity\Exception\InvalidUnitPriceException;

class Product
{
    private $id;
    private $unitPrice;
    private $minimumQuantity;
    private $name;


    public function __construct()
    {
        $this->minimumQuantity = 1;
        $this->id = mt_rand(); // it should be handled by db
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
     * @param string $name
     *
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
