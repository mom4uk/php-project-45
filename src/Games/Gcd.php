<?php

namespace Games\Gcd;

require_once __DIR__ . '/../../vendor/autoload.php';

use function cli\line;
use function cli\prompt;
use function Engine\engine;

function getTask(int $firstNum, int $secondNum)
{
    return "{$firstNum} {$secondNum}";
}

function startGcd()
{
    line('Welcome to the brain game!');
    $name = prompt('May i have your name?');
    line("hello, %s!", $name);

    $question = 'Find the greatest common divisor of given numbers.';

    engine('gcd', $question, $name);
}
