<?php
get_header();

//if site has post
if (have_posts()):
  //loop posts
  while (have_posts()):
    //call post
    the_post();
    ?>
    <article class="post">

  <h2><a href="<?php the_permalink();
    //individual posts link
    ?> "> <?php  the_title();
    //post title
    ?> </a></h2>
  <?php the_content();
  //post content
  ?>
    </article>
  <?php endwhile;
else:
  //else echo none
  echo '<p>No content found</p>';
endif;

get_footer();
 ?>
