<?php
if (isset($_SESSION['msg'])) {
  if (isset($_SESSION['msg']['success']))
  {
    $msg = $_SESSION['msg']['success'];
    $color = "text-green";
  }

  if (isset($_SESSION['msg']['error']))
  {
    $msg = $_SESSION['msg']['error'];
    $color = "text-red";
  }

  unset($_SESSION['msg']);
?>

<div class="msg-box">
<p class=" <?php echo $color ?>"> <?php echo $msg ?> </p>
</div>
<?php
  }
?>