<?php

namespace App\Utils;

class Tools
{
    public static function thisyear()
    {
        $date = new \DateTime();
        return $date->format('Y-m-d');
    }

    public static function lien(string $string): string
    {
        return "../../public/load/" . $string . ".PNG";
    }
}
