<?php

require_once '../model/connection.php';
require_once '../control/register-control.php';

$object = new Register($db_conn);
$object->GetRegYear();
?>
