<?php


namespace Recruitment\Entity\Exception;

use Exception;

class InvalidTaxException extends Exception
{
    public function __construct()
    {
        parent::__construct();
    }
}
