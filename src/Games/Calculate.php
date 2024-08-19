<?php

namespace Games\Calculate;

require_once __DIR__ . '/../../vendor/autoload.php';

use function cli\line;
use function cli\prompt;
use function Engine\engine;

function getTask()
{
    $expression = ['+', '-', '*'];
    $randomExpression = $expression[mt_rand(0, 2)];
    return implode(' ', [mt_rand(0, 15), $randomExpression, mt_rand(0, 15)]);
}

function getAnswer ($equation)
{
    $splitedEquation = explode(' ', $equation);
    [$firstNumber, $expression, $secondNumber] = $splitedEquation;
    $intFirstNubmer = intval($firstNumber);
    $intSecondNumber = intval($secondNumber);

    switch ($expression) {
        case '+':
            return $intFirstNubmer + $intSecondNumber;
        case '-':
            return $intFirstNubmer - $intSecondNumber;
        case '*':
            return $intFirstNubmer * $intSecondNumber;
        default:
            print_r("Error: Incorrect expression {$expression}");
            return;
    }
}

function startCalculate()
{
    line('Welcome to the brain game!');
    $name = prompt('May i have your name?');
    line("hello, %s!", $name);

    $question = 'What is the result of the expression?';

    engine('calc', $question, $name);
}

