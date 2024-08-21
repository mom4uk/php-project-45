<?php

namespace Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Engine\play;

function getTask(int $firstNum, int $secondNum)
{
    return "{$firstNum} {$secondNum}";
}
