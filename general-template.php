<?php
/*
Template Name: General Template
*/
?>

<?php get_header(); ?>

   <!-- Header image from theme features -->
   <img class="img-fluid" src="<?php header_image();?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="Header custom image">

   <!-- Content -->
   <div class="content">
      <main>
         <section class="middle-area">
         <div class="container">
            <div class="general-template">
               <?php 
                  if(have_posts()):
                     while(have_posts()):
                        the_post(); ?>
               <article>
                  <div class="container">
                     <h2><?php the_title(); ?></h2>
                     <?php the_content(); ?>
                  </div>
               </article>
                     <p>This template page is the same on selected pages</p>
                     <?php endwhile;
                     else: ?>
                     <p>No posts to show yet.</p>
                  <?php endif;
               ?>
            </div>
         </div>
         </section>
      </main>
   </div>

<?php get_footer(); ?>