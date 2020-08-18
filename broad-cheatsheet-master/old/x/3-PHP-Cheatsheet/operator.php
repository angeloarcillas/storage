<?php
// OPERATOR PREDECENCE
++
!
*/%
+-
< <= > >=
=== !==
&&
||
AND
OR
XOR

/**
 * Spaceship operator
 * x != y? 0 : (x > y? 1 : -1)
 */
echo 2 <=> 3; //outputs -1
echo 1 <=> 1; //outputs 0
echo 5 <=> 4; //outputs 1

echo "x" <=> "y"; //-1
echo "x" <=> "x"; // 0
echo "y" <=> "x"; //1

// Return 0 if value on either side are equal
// Return 1 if value on the left is greater
// Return -1 if the value on the right is greater
