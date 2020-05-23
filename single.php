<?php get_header(); ?>
   <article class="single-post">
      <?php
         // You don't have to check (if) there're posts, because you're in the post!
         while (have_posts()) :
            the_post();

            // Show the content
            get_template_part('template-parts/content', 'single');
            
            // Showing comments in posts
            if (comments_open() || get_comments_number()):
               comments_template();
            endif;
         endwhile;
      ?>
   </article>
<?php get_footer(); ?>