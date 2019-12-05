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

                        <?php endwhile;
                        else: ?>
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
      </main>
   </div>

<?php get_footer(); ?>