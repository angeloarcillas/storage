<?php

require_once '../model/connection.php';
require_once '../control/view-control.php';

$object = new View($db_conn);

$object->GetRegUsers();
?>
