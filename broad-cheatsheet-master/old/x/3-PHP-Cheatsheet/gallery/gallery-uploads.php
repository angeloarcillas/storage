<?php
    include_once "dbh.php";

if (isset($_POST['submit'])) {

  $newFileName = $_POST['filename'];
  $fileTittle = $_POST['title'];
  $fileDesc = $_POST['fileDesc'];
  $file = $_FILES['file'];

  if (empty($newFileName)) {
    $newFileName = "gallery";
  }else {
    $newFileName = strtolower(str_replace(" ","-",$newFileName));
  }
#error handlers here

  $fileName = $file["name"];
  $fileType = $file["type"];
  $fileTempName = $file["tmp_name"];
  $fileError = $file["error"];
  $fileSize = $file["size"];

  $fileExt = explode(".",$fileName);
  $fileActualName = strtolower(end($fileExt));

  $allowed = array("jpeg", "jpg", "png");


if (in_array($fileExt, $allowed)) {
  if ($fileError == 0) {
    if ($fileSize < 20000000) {
    $imgFullName = $newFileName . "." . uniqid("",true) . "." . $fileActualName;
    $filePath = "img/gallery" . $imgFullName;


    $sql = " SELECT * FROM gallery";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "sql error";
      exit();
    }else {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $rowCount = mysqli_num_rows($result);
      $setImgOrder = $rowCount + 1;

      $sql = "INSERT INTO gallery (titleGallery,descGallery,imgFullNameGallery,orderGallery) VALUES (?,?,?,?);";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "sql error";
        exit();
      }else {
        mysqli_stmt_bind_param($stmt,"ssss",$imgTitle,$imgDesc,$imgFullName,$setImgOrder);
        mysqli_stmt_execute($stmt);

        move_uploaded_file($fileTempName, $filePath);

        header("location:index.php?success");
      }
    }

    }else {
      echo "file size is too big";
      exit();
    }
  }else {
    echo "you have an error";
    exit();
  }
}else {
  echo "you need to upload the proper file type";
  exit();
}
}