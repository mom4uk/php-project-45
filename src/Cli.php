<?php

namespace Cli;

use function cli\line;
use function cli\prompt;

function greeting()
{    
    line('Welcome to the Brain Game!\n');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
