<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!-- META -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E-Learn</title>
  
  <!-- SCRIPT -->
  <script src="/el/assets/js/main.js" defer></script>

  <!-- STYLE -->
  <link rel="stylesheet" href="/el/assets/css/reset-style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="/el/assets/css/main.css">
</head>

<body>
  <header class="mb-5">
    <nav class="navbar navbar-light bg-light">
    <!-- BRAND -->
      <a class="navbar-brand col-md-4">Navbar</a>

      <div class="d-flex justify-content-between">
      <!-- NAV -->
        <ul class="mr-auto mt-2 mt-lg-0 nav">
          <li class="nav-item active">
            <a class="nav-link" href="/el">Home</a>
          </li>
          <?php
            if (isset($_SESSION['acct_type']) && ($_SESSION['acct_type'] == "pos2" || $_SESSION['acct_type'] == "pos3" || $_SESSION['acct_type'] == "pos1")) {
                echo '<li class="nav-item">
                  <a class="nav-link" href="/el/view/applicant">Monitor</a>
                </li>';
            }
            // if user logged in
            if ($_SESSION['acct_auth'] === true) {
                echo '<li class="nav-item">
                <a class="nav-link btn btn-outline-danger" href="#">Logout</a>
              </li>';

            } else {
                echo '<li class="nav-item">
                <a class="nav-link" href="#">Login</a>
              </li>';
            }
          ?>

        </ul>
      </div>
    </nav>
  </header>
  <main>
    <div class="container">