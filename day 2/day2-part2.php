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
            $len = strlen($s);

            for ($patternLen = 1; $patternLen <= $len / 2; $patternLen++) {

                if ($len % $patternLen !== 0) continue;

                $pattern = substr($s, 0, $patternLen);
                $repeatCount = $len / $patternLen;

                if (str_repeat($pattern, $repeatCount) === $s) {
                    $total += $id;
                    break;
                }
            }
        }
    }

    return $total;
}

$total = invalid_id_checker($productIdRanges);
echo "Sum total of invalid IDs: $total\n";
