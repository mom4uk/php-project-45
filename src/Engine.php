<?php

namespace Engine;

use function cli\line;
use function cli\prompt;
use function Cli\run;
use function Even\isEven;
use function Prime\isPrime;
use function Games\Calculate\getTask as getTaskCalc;
use function Games\Calculate\getAnswer as getCalcAnswer;
use function Games\Gcd\getTask as getTaskGcd;
use function Games\Gcd\getGcd;
use function Games\Progression\getTask as getProgTask;
use function Games\Progression\getAnswer as getProgAnswer;

function printQuestion(string $question)
{
    line($question);
}

function doExercise(array $taskAndAnswer, string $name, int $counter)
{
    [$task, $correctAnswer] = $taskAndAnswer;
    $result = 0;
    $lastIteration = 2;

    line('Question: %s', $task);
    $userAnswer = prompt('Your answer is ');

    if ($userAnswer === strval($correctAnswer)) {
        line('Correct!');
        $result = 1;
    } else {
        line('\'%s\' is wrong answer ;(. correct answer was \'%s\'.', $userAnswer, $correctAnswer);
        line('Let\'s try again, %s!', $name);
        return $result;
    }
    if ($counter === $lastIteration) {
        line('Congratulations, %s!', $name);
    }

    return $result;
}

function getTaskAndAnswer(string $gameFlag)
{
    switch ($gameFlag) {
        case 'even':
            $task = mt_rand(1, 1000);
            $answer =  isEven($task);
            return [$task, $answer];
        case 'calc':
            $task = getTaskCalc(mt_rand(0, 15), mt_rand(0, 15));
            $answer = getCalcAnswer($task);
            return [$task, $answer];
        case 'gcd':
            [$firstNumber, $secondNubmer] = [mt_rand(1, 20), mt_rand(1, 20)];
            $task = getTaskGcd($firstNumber, $secondNubmer);
            $answer = getGcd($firstNumber, $secondNubmer);
            return [$task, $answer];
        case 'progression':
            $task = getProgTask();
            $answer = getProgAnswer($task);
            return [$task, $answer];
        case 'prime':
            $task = mt_rand(1, 100);
            $answer = isPrime($task) ? 'yes' : 'no';
            return [$task, $answer];
        default:
            line("Error: Incorrect game flag type: {$gameFlag}");
            return;
    }
}

function play(string $gameFlag, string $question)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    printQuestion($question);
    $counter = 0;
    $gameCycles = 3;
    while ($counter < $gameCycles) {
        $taskAndAnswer = getTaskAndAnswer($gameFlag);
        $exercise = doExercise($taskAndAnswer, $name, $counter);

        if ($exercise === 0) {
            return;
        }
        $counter += $exercise;
    }
}
