<?php

namespace Cli;

use function cli\line;
use function cli\prompt;

function x() {
    echo "Welcome to the Brain Game!\n";
}
function greeting()
{ 
    echo "May I have your name?\n";
    
    $name = trim(fgets(STDIN));
    echo "Hello, {$name}!\n";
    return;
}
