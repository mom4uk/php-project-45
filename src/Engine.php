<?php

namespace Engine;

use function cli\line;
use function cli\prompt;
use function General\isEven;
use function Games\Calculate\getTask as getTaskCalc;
use function Games\Calculate\getAnswer;
use function Games\Gcd\getTask as getTaskGcd;

function printQuestion(string $question)
{
    line($question);
}

function makeExercise ($taskAndAnswer, $name, $counter)
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

function getTaskAndAnswer ($gameFlag) {
        switch ($gameFlag) {
            case 'even':
                $task = mt_rand(1, 1000);
                $answer =  isEven($task) ? 'yes' : 'no';
                return [$task, $answer];
            case 'calc':
                $task = getTaskCalc();
                $answer = getAnswer($task);
                return [$task, $answer];
            case 'gcd':
                [$firstNumber, $secondNubmer] = [mt_rand(1,20), mt_rand(1,20)];
                $task = getTaskGcd($firstNumber, $secondNubmer);
                $answer = gmp_gcd($firstNumber, $secondNubmer);
                return [$task, $answer];
            default:
                line("Error: Incorrect game flag type: {$gameFlag}");
                return;
        }
}

function engine($gameFlag, $question, $name)
{
    printQuestion($question);
    $counter = 0;
    while($counter < 3) {

        $taskAndAnswer = getTaskAndAnswer($gameFlag);
        $exercise = makeExercise($taskAndAnswer, $name, $counter);

        if ($exercise === 0) {
            return;
        }
        $counter += $exercise;
    }
}