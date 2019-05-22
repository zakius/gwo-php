<?php


namespace Recruitment\Entity;


use InvalidArgumentException;

class Product
{
    private $unitPrice;
    private $minimumQuantity;


    /**
     * @param int $unitPrice
     * @return $this
     * @throws InvalidUnitPriceException
     */
    public function setUnitPrice(int $unitPrice){
        if($unitPrice < 1){
            throw new InvalidUnitPriceException();
        }
        $this->unitPrice = $unitPrice;
        return $this;
    }


    /**
     * @param int $minimumQuantity
     * @return $this
     */
    public function setMinimumQuantity(int $minimumQuantity){
        if($minimumQuantity < 1){
            throw new InvalidArgumentException();
        }
        $this->minimumQuantity = $minimumQuantity;
        return $this;
    }

}