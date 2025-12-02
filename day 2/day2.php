<?php

$productIdString = file_get_contents('data.txt');
$productIdRanges = explode(',', trim($productIdString));

function invalid_id_checker($idRanges)
{
    $total = 0;

    foreach ($idRanges as $range) {
        list($start, $end) = array_map('intval', explode('-', $range));

        for ($id = $start; $id <= $end; $id++) {
            $s = (string)$id;

            if (strlen($s) % 2 !== 0) {
                continue;
            }

            $half = strlen($s) / 2;

            $firstHalf  = substr($s, 0, $half);
            $secondHalf = substr($s, $half);

            if ($firstHalf === $secondHalf) $total += $id;
        }
    }

    return $total;
}

$total = invalid_id_checker($productIdRanges);
echo "Sum total of invalid IDs: $total\n";
