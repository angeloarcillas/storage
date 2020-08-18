<?php
$mc = new Memcache; // create object
$mc->connect(localhost:port); // connect memcached
$file = $mc->get('file'); //get memcached file

if (){ // check if memcached cached
  echo "cached";
}else{
  $filename = `path/file`; // set file path
  $handle = fopen($filename,'f'); // open file
  $content = fread($handle,filesize($filename)) // read file
          //file.php , $content ,flags,cache for 30sec
  $mc->set('file',$content,0,30); // set file to memcached for 30sec
  echo $file = $mc->get('file');
}

 ?>
