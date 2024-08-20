<?php

namespace Cli;

use function cli\line;
use function cli\prompt;

function greeting()
{
    $name = prompt('Welcome to the Brain Game!\nMay I have your name?');
    line("Hello, %s!", $name);
}
