<?php

namespace Cli;

use function cli\line;
use function cli\prompt;

function greeting()
{    
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("\nHello, %s!", $name);
}
