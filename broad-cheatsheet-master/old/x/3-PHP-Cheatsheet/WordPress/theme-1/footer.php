<footer class="site-footer">

  <nav class="site-nav">
    <?php
  $args = array('theme_location' => 'footer' );
     ?>
    <?php wp_nav_menu($args);
//array menu list
    ?>
  </nav>

  <p><?php bloginfo('name');
  //site name - copyrite year
  ?> - &copy <?php echo date('Y'); ?></p>
</footer>
</div>

<!-- dynamic footer -->
<?php wp_footer(); ?>
</body>
</html>
