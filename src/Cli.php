<?php

namespace Cli;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Game!\n');
    line('May I have your name?\n');
    
    $name = prompt();
    line('Hello, {$name}!\n');
    return;
}

function askName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}