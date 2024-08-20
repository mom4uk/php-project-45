<?php

namespace Games\Prime;

require_once __DIR__ . '/../../vendor/autoload.php';

use function cli\line;
use function cli\prompt;
use function Engine\engine;

function startPrime()
{
    line('Welcome to the brain game!');
    $name = prompt('May i have your name?');
    line("hello, %s!", $name);

    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    engine('prime', $question, $name);
}
