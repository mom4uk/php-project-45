<?php

namespace Games\Even;

require_once __DIR__ . '/../../vendor/autoload.php';

use function cli\line;
use function cli\prompt;
use function Engine\engine;

function isEven(int $number)
{
    return $number % 2 === 0;
}

function startEven()
{
    line('Welcome to the brain game!');
    $name = prompt('May i have your name?');
    line("hello, %s!", $name);

    $question = 'Answer "yes" if the number is even, otherwise answer "no".';

    engine('even', $question, $name);
}
