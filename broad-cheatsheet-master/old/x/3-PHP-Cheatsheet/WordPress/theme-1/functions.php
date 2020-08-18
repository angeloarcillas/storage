<?php

function learningWP_resources(){
  //link style.css
  wp_enqueue_style('style', get_stylesheet_uri());
}
  //call function
add_action('wp_enqueue_scripts','learningWP_resources');

//nav menu
register_nav_menus(array(
  'primary' => __('primary menu'),  
  'footer' => __('footer menu'),
));
 ?>
