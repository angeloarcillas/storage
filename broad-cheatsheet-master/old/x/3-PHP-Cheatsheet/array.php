        <?php

/**
 * Array Types
 */

// indexed array
 $arr[0] = "foo";

//  associative array
 $arr = ["foo" => "bar"];

 // multidimentional array
$arr = [0 => ["foo" => "bar"],
        1 => ["bar" => "foo", 0 => "foobar"]];

/**
 * Array functions
 */

//append data to array
array_push($arr, "foo", "bar");

array_key_exists()
array_key_first() // get first array key
array_key_last() // get last array key
is_countable()

implode() //array to string
explode() //string to array
chunk_split() //string to smaller chunk
str_getcsv() // Parse CSV string to array
str_split() // split string to array


/**
 * Array sort
 */
count(); // return array length
sort(); // ascending
rsort(); // descending

// [ Associative Arrays ]
asort(); //  ascending by value
ksort(); // ascending by key
arsort(); // descending by value
krsort(); // descending by key


/**
 * Array to Object
 */
$JSON = json_encode($array);
$object = json_decode($JSON, false);


/**
 * Replace array key
 */
function replaceArrayKey($array, $oldKey, $newKey)
{
  if(!isset($array[$oldKey])){
    // array key doesnt exist
  }

  $keys = array_keys($array);
  $oldKeyIndex = array_search($oldKey, $keys);
  $keys[$oldKeyIndex] = $newKey;
  $newArray =  array_combine($keys, $array); // key, value
  
  return $newArray;
    }