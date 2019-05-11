<?php


namespace App\Services;


use Exception;

class TownNameNotPrivided extends Exception
{

    /**
     * TownNameNotPrivided constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}