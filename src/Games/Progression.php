<?php

namespace Games\Progression;

use function cli\line;
use function cli\prompt;
use function Engine\play;

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
