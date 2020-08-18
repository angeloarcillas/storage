<?php

/**
 *
 */
$pathStatus = false;
$path = "model/Course.php";
if (file_exists($path) && $pathStatus === false) {
    $pathStatus = true;
    require_once($path);
}
$path = "../model/Course.php";
if (file_exists($path) && $pathStatus === false) {
    $pathStatus = true;
    require_once($path);
}
$path = "../../model/Course.php";
if (file_exists($path) && $pathStatus === false) {
    $pathStatus = true;
    require_once($path);
}

class CourseController extends Course
{
    public function index()
    {
        echo $this->getCourse();
    }
}
