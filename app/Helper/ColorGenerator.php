<?php

namespace App\Helper;

class ColorGenerator
{
   public static function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

   public static function randomColor()
    {
        return self::random_color_part() . self::random_color_part() . self::random_color_part();
    }
}
