<?php


namespace Recruitment\Entity;


use Exception;

class InvalidUnitPriceException extends Exception
{

    /**
     * InvalidUnitPriceException constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}