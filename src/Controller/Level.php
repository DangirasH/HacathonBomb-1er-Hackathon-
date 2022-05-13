<?php

namespace App\Controller;

class Level
{
    public static function calculate(int $xps): int
    {
        return intval(ceil($xps / 100));
    }
}
