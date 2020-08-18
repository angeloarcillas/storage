<?php
/* */
$string = "foo";
$rand = str_shuffle($str); //shuffle string
$keylength = 8;
$rand = substr(str_shuffle($rand), 0, $keylength); //substr(shuffledStr,start,length)

/* */
$rand = uniqid(); // generate random string
$rand = uniqid("foo"); // add foo at start
$rand = uniqid("foo", true); // add more string at end


/**
* Unique key using database
*/
function verifyKey($db, $rand)
{
  $query = $db->query("SELECT * FROM keys");

  while ($row = $query->fetch()) {
    if (!$row['key'] == $rand) {
      return false;
    }
  }
    return true;
}

$rand = substr(str_shuffle("foo"), 0, 10);
$checked = verifyKey($db, $rand);

while ($checked) {
  $rand = substr(str_shuffle($rand), 0, 10);
  $checked = verifyKey($db, $rand);
}

echo $rand;