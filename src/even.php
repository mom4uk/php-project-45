<?php

namespace Even;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;
use function General\isEven;

function startEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $counter = 0;
    while($counter < 3) {
        $number = mt_rand(1, 1000);
        line('Question: %s', $number);
        $answer = prompt('Your answer is ');
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        if ($answer === $correctAnswer) {
            $counter += 1;
            line('Correct!');
        } else {
            break;
        }
    }
    if ($counter >= 3) {
        line('Congratulations, %s', $name);
    } else {
        line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $correctAnswer);
        line('Let\'s try again, %s', $name);
    }
}
