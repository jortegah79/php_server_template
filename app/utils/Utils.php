<?php

namespace App\utils;

class Utils{

    public static function cleanStrings(string $string):string{

        $string=str_replace("'","/'",$string);
        return trim($string);
    }
}