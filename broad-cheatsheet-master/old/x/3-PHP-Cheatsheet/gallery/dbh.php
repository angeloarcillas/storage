<?php
$server = "localhost";
$user = "root";
$pwd = "";
$db = "uploadGallery";

$conn = mysqli_connect($server,$user,$pwd,$db);

/*
-gallery
idGallery int(11) not null auto_inc primary key
titleGallery LONGTEXT not null
descGallery LONGTEXT not null
imgFullNameGallery LONGTEXT not null
orderGallery LONGTEXT not null

-
*/
