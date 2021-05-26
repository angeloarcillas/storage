<?php
// TODO:: Research more
readfile(x); // output file
fopen(name, mode); // open file
    // mode: -r -read | w -write | x+ - r/w return error if file exist
fread($file, filesize()); // read open file
fwrite($file, string);
fclose(x); // close file
fgets(x); // read single line
fgetc(x); // read single character
feof(x); // check if end of the file reached


// parse_ini_file(<filename>) - return assoc array of config file
// simplexml_load_file(<filename>)  return object of XML data

/**
 * Read large file
 */
// get file
$file = fopen('file.txt', "r");

// throw error if fopen() failed
if($file === false){
    throw new Exception('error');
}

// read each line
while(!feof($file)) {
    $line = fgets($file);
    // body
}

fclose($file);