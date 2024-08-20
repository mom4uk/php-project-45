<?php

namespace Games\Progression;

require_once __DIR__ . '/../../vendor/autoload.php';

use function cli\line;
use function cli\prompt;
use function Engine\engine;

function getTask()
{
    $progressionStep = mt_rand(1, 15);
    $result = [mt_rand(1, 100)];
    $progressionLength = 10;

    for ($i = 0; $i <= $progressionLength - 2; $i += 1) {
        $result[] = $result[$i] + $progressionStep;
    }

    $randomReplacement = array(mt_rand(0, 9) => '..');
    $progression = implode(' ', array_replace($result, $randomReplacement));

    return $progression;
}

function getAnswer(string $progression)
{
    $coll = explode(' ', $progression);
    $result = 0;
    for ($i = 0; $i < count($coll) - 1; $i += 1) {
        if ($coll[$i] === '..' && $i <= 5) {
            $step = intval($coll[$i + 2]) - intval($coll[$i + 1]);
            $result = $coll[$i + 1] - $step;
            break;
        } elseif ($coll[$i] === '..' && $i >= 5) {
            $step = intval($coll[$i - 1]) - intval($coll[$i - 2]);
            $result = $coll[$i - 1] + $step;
            break;
        }
    }
    return $result;
}

function startProgression()
{
    line('Welcome to the brain game!');
    $name = prompt('May i have your name?');
    line("hello, %s!", $name);

    $question = 'What number is missing in the progression?';

    engine('prog', $question, $name);
}
