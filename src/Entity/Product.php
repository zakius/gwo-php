<?php


namespace Recruitment\Entity;


class Product
{
    private $unitPrice;

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

}