<?php

namespace Prime;

function isPrime(int $number)
{
    for ($i = 2; $i <= round($number / 2); $i += 1) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
