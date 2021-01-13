<?php

function binaryArrayToNumber(array $arr): int
{
    return bindec(implode('', $arr));
}