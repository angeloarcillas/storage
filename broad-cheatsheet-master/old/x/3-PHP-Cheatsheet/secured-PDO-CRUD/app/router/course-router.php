<?php

require_once '../model/connection.php';
require_once '../control/course-control.php';

$object = new Course($db_conn);
$object->GetCourse();
?>
