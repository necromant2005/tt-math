<?php
namespace TweeMath\Algorithm;
use InvalidArgumentException;

class TrigonometricInterpolation
{
    public static function apply(array $input, $nextPosition)
    {
        if (count($input) < 2) {
            return reset($input);
        }
        $y0 = reset($input);
        $x0 = key($input);
        $y1 = end($input);
        $x1 = key($input);

        $y = $y0 + ($y1 - $y0) * ($nextPosition - $x0) / ($x1 - $x0);
        return $y * (sin($nextPosition) / 2 + 1);
    }
}