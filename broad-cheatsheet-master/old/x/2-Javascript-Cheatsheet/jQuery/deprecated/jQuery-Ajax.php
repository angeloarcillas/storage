<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>jquery+php+ajax</title>
</head>

<body>

  <!-- this is info.php but not sure if it can be separated-->
  <?php
    //jQuery commentNewCount used here to pass value
      $commentNewCount = $_POST['commentNewcount'];

      //query
      $sql = "SELECT * FROM datas LIMIT $commentNewCount";

      //query
      $reuslt = mysqli_query($conn,$sql);

      //check if result has a value
      if (mysqli_num_rows($result) > 0 )
      {
        //array value of result
        while ($row = mysqli_fetch_assoc($result))
         {
          //show comments while show
          echo "<div><h2>".
          $row['tittle']."</h2><p>".
          $row['comment']."</p></div>";
        }
      }
      else
      {
        //if no comments/$result empty
        echo "there are no comments";
      }
     ?>

  <!-- form goes here-->
  <div id="comments">

    <?php
    //query to limit 2 comments to show
        $sql = "SELECT * FROM datas LIMIT 2";
        $reuslt = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0 ){
          while ($row = mysqli_fetch_assoc($result)){
          echo "<div><h2>".
          $row['tittle']."</h2><p>".
          $row['comment']."</p></div>";
           
            // echo = "<p>";
            // echo = $row['tittle'];
            // echo "<br>";
            // echo = $row['comment'];
            // echo = "</p>";
          }
        }
        else{
          echo "there are no comments";
        }
       ?>

  </div>
  <button class="btn" type="button" name="button"></button>
</body>

<!--ajax and jQuery src here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>

//fix or might not show comment at 1st
  $(document).ready(function() {

    //limit 2 comments
    let commentCount = 2;

    //.btn sellected
    $('.btn').click(function() {

      //add 2 more comments to show
      commentCount = commentCount + 2;

      //#comments selected then loads info.php
      $('#comments').load("info.php", {
        //this 2nd param is for post method
        //value of commentCount passed to commentNewCount
        commentNewCount: commentCount;
        //goto info.php

      });
    });
  });
</script>

</html>
