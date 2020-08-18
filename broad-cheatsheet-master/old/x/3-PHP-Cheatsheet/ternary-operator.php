 <?php
 // (condition)? true : false
echo (true)  ? "yes" : "no";  // prints yes
echo (false) ? "yes" : "no";  // prints no

// ADVANCE
 echo (true) ? // if
      (true) ? 'yes': // if
      (false) ? 'yes': 'no' // elseif
      :'no'; //else
