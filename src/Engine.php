<?php

namespace Engine;

use function cli\line;
use function cli\prompt;
use function Games\Even\isEven;
use function Games\Calculate\getTask;
use function Games\Calculate\getAnswer;

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
                $task = getTask();
                $answer = getAnswer($task);
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