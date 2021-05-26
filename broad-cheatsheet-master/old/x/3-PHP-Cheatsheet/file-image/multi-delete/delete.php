<?php
$filenames = $_POST['filename'];

//" ", -> check what to replace
//"", -> replace if there are spaces
//$filenames -file to replace
$rmvSpaces = str_replace(" ", "", $filenames);

$allFileNames = explode(",", $rmvSpaces);
$countAllNames = count($allFileNames);// count -> count num of value on array

for ($limit=0; $limit < $countAllNames; $limit++) {
  if (file_exists("uploads/".$allFileNames[$limit]) == false) {
    echo "error";
    header("location:index.php?error");
    exit();//php function -> exit everything
  }
}

for ($limit=0; $limit < $countAllNames; $limit++) {
  $path = "uploads/".$allFileNames[$limit];

  if (!unlink($path)) { //unlink() -> delete files
    echo "error";
  }else {
    header("location:index.php?success");
    exit();
}

}




 ?>
