<?php

  /**
  *@desc A page. See single.php is for a blog post layout.
  */

  get_header();?>
    <?php

  if (have_posts()) : while (have_posts()) : the_post();
  ?>
  
  <div class = "cuadrado">
  	
  </div>

  

  <div class = "container">
  	<div class = "row">
  		<div class = "col-md-12 contenido">
  			<h1><?php the_title() ?></h1>
  			<?php the_content() ?>
  		</div>
  	</div>
  </div>


  


  <?php
  comments_template();?>

  
  <?php

  endwhile; else: ?>

    <p>Sorry, no pages matched your criteria.</p>

<?php
  endif;?>


     
 <?php get_footer();
?>