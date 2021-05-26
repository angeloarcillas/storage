<?php

function multiplicativePersistenceSteps(int $num): int
{
    // +1 => 1st step
    return strlen($num) > 1 ? 1 + persistence(array_product(str_split($num))) : 0;
}
