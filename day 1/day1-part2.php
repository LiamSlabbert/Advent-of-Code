<?php

$dialRotations = file('data.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

function findPasswordPartTwo($dialStart, $dialRotations)
{
    $password = 0;

    foreach ($dialRotations as $rotation) {
        $direction = $rotation[0];
        $steps = intval(substr($rotation, 1));

        for ($i = 0; $i < $steps; $i++) {
            if ($direction === 'L') {
                $dialStart = ($dialStart - 1 + 100) % 100;
            } elseif ($direction === 'R') {
                $dialStart = ($dialStart + 1) % 100;
            }

            $dialStart === 0 && $password++;
        }
    }

    echo "Password: $password\n";
}

findPasswordPartTwo(50, $dialRotations);
