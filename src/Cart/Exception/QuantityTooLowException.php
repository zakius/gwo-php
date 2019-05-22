<?php


namespace Recruitment\Cart\Exception;


use Exception;

class QuantityTooLowException extends Exception
{
    public function __construct()
    {
        parent::__construct();
    }
}