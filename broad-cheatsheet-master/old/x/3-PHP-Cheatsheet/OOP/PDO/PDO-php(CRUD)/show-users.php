<?php

require 'dbh.php';
include_once 'server.php';
//create object
$object = new Users($DB_conn);
//execute function getUsers() then encode array to JSON
$object_string=json_encode($object->getUsers());
//decode JSON to array
$object_set=json_decode($object_string,true);
$html = '';

if ($object_set <>false){
foreach($object_set as $object_item){
	$html.='<span>' . $object_item['user_id'] . '</span>';
	$html.='<span>' . $object_item['user_name'] . '</span>';
	$html.='<span>' . $object_item['user_email'] . '</span>';
  $html.='<span>' . $object_item['user_password'] . '</span>';
  $html.='<br>';
		}
}else{
	$html.='<p>No alumni found.</p>';
}


echo $html;
 ?>
