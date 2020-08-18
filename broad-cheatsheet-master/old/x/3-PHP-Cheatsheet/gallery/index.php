<?php
include_once "dbh.php";
session_start();
$_SESSION['id'] = 1;


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <header>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Gallery</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section>
        <div class="">
          <h2>Gallery</h2>

          <div class="">
            <?php

            $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "sql error";
              exit();
            }else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#">
                <div style="background-image: url(img/gallery/' . $row["imgFullNameGallery"] . ');"></div>
                  <h3>'.$row['tittleGallery'].'</h3>
                  <p>'.$row['descGallery'].'</p>
                </a>';
              }
            }
             ?>
          </div>

          <div class="gallery-upload">
            <?php

            echo '<form class="" action="gallery-uploads.php" method="post">
              <input type="text" name="filename" placeholder="file Name">
              <input type="text" name="title" placeholder="file Title">
              <input type="text" name="fileDesc" placeholder="Image Discription">
              <input type="file" name="file">
              <button type="submit" name="submit">Upload</button>
            </form>';
             ?>
          </div>

        </div>
      </section>
    </main>

  </body>
</html>
