<?php

namespace Cli;

use function cli\line;
use function cli\prompt;

function greeting()
{
    echo "Welcome to the Brain Game!\n";
    echo "May I have your name?\n";
    
    $name = trim(fgets(STDIN));
    echo "Hello, {$name}!\n";
}

function askName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}