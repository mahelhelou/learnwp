<article>
   <!-- Printing the post format to screen -->
   <?php // echo get_post_format(); ?>
   <div class="container">
      <h2><?php the_title(); ?></h2>
      <!-- Options: //( thumbnail(150*150), medium, larage, full, custom) -->
      <?php the_post_thumbnail(array(1000, 400)); ?>
      <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
      <p>Categories: <?php the_category(' '); ?></p>
      <?php the_content(); ?>
   </div>
</article>