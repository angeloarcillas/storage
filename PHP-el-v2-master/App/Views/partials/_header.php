<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP</title>

  <link rel="stylesheet" href="<?php assets("css/normalize.css")?>">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="<?php assets("css/main.css")?>">
    
  <script src="<?php assets("js/main.js")?>" defer></script>
</head>

<body>
  <header>
 <?php require '_nav.php'; ?>
  </header>
<main>
  <div class="main-container">
  <?php require '_msg.php'; ?>
