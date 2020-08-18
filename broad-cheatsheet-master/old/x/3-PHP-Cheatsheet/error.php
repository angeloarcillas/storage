<?php
/**
 * E_ERROR
 * 
 * This is a fatal runtime error. 
 * Your application cannot recover from an E_ERROR.
 * Therefore, the script is halted. 
 * Example cause: Attempting to call a function that doesn’t exist.
 */

/**
 *  E_PARSE
 * 
 * This occurs whenever PHP fails to parse / compile your code. 
 * Your script will not run as a result. 
 * Example cause: Failing to close your brackets properly.
 */

/**
 * E_WARNING
 * 
 * This is a runtime warning that does not prevent the rest of your application from running. 
 * Example: Trying to access a file or URL that doesn’t exist.
 */

/**
 * E_NOTICE
 * 
 * An E_NOTICE occurs whenever PHP encounters something that may indicate an error. 
 * Example: Trying to access an array index that doesn’t exist.
 */

/**
 * E_STRICT
 * 
 * Occurs whenever PHP warns you about the future compatibility of your code. 
 * Example cause: Using functions or language features that have been deprecated.
 */