<?php

// function likes(array $names): string
// {
//     switch (count($names)) {
//     case 0:
//       return 'no one likes this';
//     case 1:
//       return vsprintf('%s likes this', $names);
//     case 2:
//       return vsprintf('%s and %s like this', $names);
//     case 3:
//       return vsprintf('%s, %s and %s like this', $names);
//     default:
//       return sprintf('%s, %s and %d others like this', $names[0], $names[1], count($names) - 2);
//   }
// }