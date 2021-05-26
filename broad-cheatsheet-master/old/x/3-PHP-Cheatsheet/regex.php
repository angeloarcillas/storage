<?php
/**
 * PCRE Functions
 */

//Perform a regular expression match
preg_match ( string $pattern , string $subject [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]] ) : int

//Perform a global regular expression match
preg_match_all ( string $pattern , string $subject [, array &$matches [, int $flags = PREG_PATTERN_ORDER [, int $offset = 0 ]]] ) : int

//preg_replace
preg_replace ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] ) : mixed

//Perform a regular expression search and replace
preg_filter ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] ) : mixed

//Split string by a regular expression
preg_split ( string $pattern , string $subject [, int $limit = -1 [, int $flags = 0 ]] ) : array

//Return array entries that match the pattern
preg_grep ( string $pattern , array $input [, int $flags = 0 ] ) : array

//Returns the error code of the last PCRE regex execution
preg_last_error ( void ) : int 

//Quote regular expression characters
preg_quote ( string $str [, string $delimiter = NULL ] ) : string

//Perform a regular expression search and replace using callbacks
preg_replace_callback_array ( array $patterns_and_callbacks , mixed $subject [, int $limit = -1 [, int &$count ]] ) : mixed

//Perform a regular expression search and replace using a callback
preg_replace_callback ( mixed $pattern , callable $callback , mixed $subject [, int $limit = -1 [, int &$count ]] ) : mixed

/**
 * Regex
 */

//start end indicator
^ - match from start
$ - match from end
//count indicator
+ match 1...n
* match 0...n
? match 0-1
//logic operators
| - or
^ - not
//grouping
[] - match any char in group
() - match specific in group

// Search
\d  digit 
\D  !digit
\s  space 
\S  !space
\w  word
\W  !word