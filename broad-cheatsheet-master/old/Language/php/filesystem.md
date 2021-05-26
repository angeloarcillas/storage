# Filesystem

```php
// !NOTE: $handle = file pointer

file_exists($file)                             // validate file
fopen($file)                                   // opens file or url
fclose($handle)                                // close file
fgets($handle)                                 // read line
fgetc()                                        // read character
feof($handle)                                  // Tests for end-of-file on a file pointer
fpassthru($handle)                             // output remaining data on file pointer
fread($handle, $size)                          // read file
fwrite($file, $string)                         // write file
glob($pattern)                                 // find pathnames matching pattern
file_get_contents()                            // read entire file to string
file_put_contents()                            // write data to file
file()                                         // read entire file to array
stat()                                         // Gives info about a file

ftell($handle)                                 // return current position of the file read/write pointer
fseek($handle, $offset)                        // seeks on file pointer
fstat($handle)                                 // file stats
rewind()                                       // rewind the position of a file pointer

fileatime()                                    // Gets last access time of file
filemtime()                                    // Gets file modification time
fileowner()                                    // Gets file owner
fileperms()                                    // Gets file permissions
filesize()                                     // Gets file size
filetype()                                     // Gets file type

move_uploaded_file($file, $destination)        // move & upload file to new path
readfile($file)                                // output file

fflush()                                       // force write of all buffered output to resource pointer
realpath()                                     // return canonicalized absolute pathname
rename($file, $new)                            // rename file
tempnam($dir, $prefix)                         // temporary file name
tmpfile()                                      // temporary file
unlink()                                       // delete file
```
