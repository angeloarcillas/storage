<?php

function capitalize(string $s): array
{
    $result = [$s, $s];

    foreach (str_split($s) as $i => $letter) {
        $result[$i % 2][$i] = strtoupper($letter);
    }

    return $result;
}
