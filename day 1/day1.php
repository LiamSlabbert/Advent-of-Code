<?php

$dialRotations = file('data.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$dial = 50;

function findPassword($dialStart, $dialRotations)
{

    $password = 0;

    foreach ($dialRotations as $rotation) {
        $direction = $rotation[0];
        $rotations = intval(substr($rotation, 1));

        if ($direction === 'L') {
            $dialStart = ($dialStart - $rotations) % 100;
            $dialStart < 0 && $dialStart += 100;
        } else if ($direction === 'R') {
            $dialStart = ($dialStart + $rotations) % 100;
        }

        $dialStart === 0 && $password++;
    }

    echo "Password: $password\n";
}

findPassword($dial, $dialRotations);
