<?php get_header(); ?>

   <!-- Header image from theme features -->
   <img class="img-fluid" src="<?php header_image();?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="Header custom image">

   <!-- Content -->
   <div class="content">
      <main>
         <section class="slider"></section>
         <section class="services">
            <div class="container">
               <div class="row">Services</div>
            </div>
         </section>
         <section class="middle-area">
         <div class="container">
            <div class="row">
               <div class="news col-md-9">
                  <?php 
                     if(have_posts()):
                        while(have_posts()):
                           the_post(); ?>
                        
                        <?php get_template_part('template-parts/content', get_post_format()); ?>

                        <?php endwhile; ?>
                        
                        <div class="container">
                           <div class="row">
                              <div class="col-md-6 btn-link text-white">
                                 <?php next_posts_link('<< Newer Posts'); ?>
                              </div>
                              <div class="col-md-6 btn-link">
                                 <?php previous_posts_link('>> Older Posts'); ?>
                              </div>
                           </div>
                        </div>

                        <?php else: ?>
                        <p>No posts to show yet.</p>
                     <?php endif;
                  ?>
               </div>
               <aside class="sidebar col-md-3">
                  <?php get_sidebar(); // if single sidebar for all pages ?>
                  <?php get_sidebar('blog'); ?>
               </aside>
            </div>
         </div>
         </section>
         <section class="map">
            <div class="container">
               <div class="row">Map</div>
            </div>
         </section>

         <section class="featured-post">
            <div class="container">
               <?php
                  // Prepare the query
                  $featured = new WP_Query('post_type=post&posts_per_page=2&cat=9');

                  // Start the loop
                  if ($featured->have_posts()) :
                     while ($featured->have_posts()) :
                        $featured->the_post();
                     endwhile;
                  endif;
                  // Reset custom WP_Query to allow this query work here only not for other places
                  wp_reset_postdata();
               ?>
               <h2 class="display-3"><?php the_title(); ?></h2>
               <?php the_content(); ?>
            </div>
         </section>
      </main>
   </div>

<?php get_footer(); ?>