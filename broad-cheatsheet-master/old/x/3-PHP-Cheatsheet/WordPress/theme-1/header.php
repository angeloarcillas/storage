<!DOCTYPE html>
<!-- set lng attr-->
<html <?php language_attributes(); ?>>
  <head>

    <!-- set charset -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- set title -->
    <title><?php bloginfo('name'); ?></title>

    <!-- used for dynamic <head> -->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="container">


<header class="site-header">

  <h1><a href="<?php echo home_url();
  //go homepage
  ?>"><?php bloginfo('name');
  //site name
  ?></a> </h1>
  <h5><?php bloginfo('description');
  //site description
  ?></h5>

  <nav class="site-nav">
    <?php
$args = array('theme_location' => 'primary' );
     ?>
    <?php wp_nav_menu($args);
//aray menu list
     ?>
  </nav>

</header>
