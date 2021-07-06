<?php

namespace App;

class TagParser
{

    /**
     * TagParser constructor.
     */
    public function __construct()
    {
    }

    public function parse($string)
    {
        /** means look for comma and maybe for space. ? - last char is optional */
        return preg_split('/ ?[,|] ?/', $string);
    }
}