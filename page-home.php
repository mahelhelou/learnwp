<?php get_header(); ?>

   <!-- Content -->
   <div class="content">
      <main>
         <section class="slider"></section>
         <section class="services bg-warning">
            <div class="container">
               <h2 class="text-center">Our Services</h2>
               <div class="row">
                  <div class="col-sm-4">
                     <div class="services__item">
                        <?php 
                           if (is_active_sidebar('service-1')) {
                              dynamic_sidebar('service-1');
                           } 
                        ?>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="services__item">
                        <?php 
                           if (is_active_sidebar('service-3')) {
                              dynamic_sidebar('service-3');
                           } 
                        ?>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="services__item">
                        <?php 
                           if (is_active_sidebar('service-2')) {
                              dynamic_sidebar('service-2');
                           } 
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="middle-area">
         <div class="container">
            <div class="row">
               <div class="news col-md-9">
                  
               </div>
               <aside class="sidebar col-md-3">
                  <?php // get_sidebar(); // if single sidebar for all pages ?>
                  <?php get_sidebar('home'); ?>
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