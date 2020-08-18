<?php
/*  Credit goes to Dominic Barnes - http://stackoverflow.com/users/188702/dominic-barnes
http://stackoverflow.com/questions/2594211/php-simple-dynamic-breadcrumb    */
 
// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
 
    // This will build our "base URL" ... Also accounts for HTTPS :)
    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
 
    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = Array("<a href=\"$base\">$home</a>");
 
    // Find out the index for the last value in our path array
    $last = end(array_keys($path));
 
    // Build the rest of the breadcrumbs
    foreach ($path AS $x => $crumb) {
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));
 
        // If we are not on the last index, then display an <a> tag
        if ($x != $last)
            $breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
        // Otherwise, just display the title (minus)
        else
            $breadcrumbs[] = $title;
    }
 
    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}
 
?>
 
<?php
// Default options - Home » Page Title
echo breadcrumbs() ;
// Change » to >
// echo breadcrumbs(' > ');
// Change 'Home' to 'Index' and » to ^^
// echo breadcrumbs(' ^^ ', 'Index');
?>