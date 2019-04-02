<?php

  get_header();?>

  <?php

  if (have_posts()): ?>

<?php

    while (have_posts()) : the_post(); ?>

    

    <?php comments_template(); // Get wp-comments.php template ?>

    <?php endwhile; ?>

  </ol>

<?php else: ?>

  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php

  endif;
  ?>

    


 <?php get_footer();
?>