<?php

namespace Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Engine\play;

function getTaskGcd(int $firstNum, int $secondNum)
{
    return "{$firstNum} {$secondNum}";
}

function startGcd()
{
    line('Welcome to the brain game!');
    $name = prompt('May i have your name?');
    line("hello, %s!", $name);

    $question = 'Find the greatest common divisor of given numbers.';

    play('gcd', $question, $name);
}
