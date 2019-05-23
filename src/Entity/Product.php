<?php


namespace Recruitment\Entity;

use InvalidArgumentException;
use Recruitment\Entity\Exception\InvalidTaxException;
use Recruitment\Entity\Exception\InvalidUnitPriceException;

class Product
{
    private $id;
    private $unitPrice;
    private $minimumQuantity;
    private $name;
    private $tax;

    private const ALLOWED_TAX_VALUES = [0, 5, 8, 23];


    public function __construct()
    {
        $this->minimumQuantity = 1;
        $this->id = mt_rand(); // it should be handled by db
        $this->tax = 23; // base VAT value
    }


    /**
     * @param int $tax
     *
     * @return Product
     * @throws InvalidTaxException
     */
    public function setTax(int $tax): Product
    {
        if (!in_array($tax, self::ALLOWED_TAX_VALUES)) {
            throw new InvalidTaxException();
        }

        $this->tax = $tax;
        return $this;
    }

    /**
     * @return int
     */
    public function getTax(): int
    {
        return $this->tax;
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
    public function getUnitPriceGross(): int
    {
        return $this->unitPrice + round($this->unitPrice * $this->tax / 100);
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
