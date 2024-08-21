<?php

namespace Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Engine\play;

function getTask(int $firstNum, int $secondNum)
{
    return "{$firstNum} {$secondNum}";
}

function getGcd(int $firstNum, int $secondNum)
{
    while ($firstNum !== 0 && $secondNum !==  0) {
        if ($firstNum > $secondNum) {
            $firstNum = $firstNum % $secondNum;
        } else {
            $secondNum = $secondNum % $firstNum;
        }
    }

    return $firstNum + $secondNum;
}
