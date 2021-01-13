<?php

function reverseWord($str)
{
    return strrev(preg_replace('/[^a-zA-Z]/', '', $str));
}