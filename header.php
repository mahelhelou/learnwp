<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <?php wp_head(); ?>
   <title>Learno WP</title>
</head>
<body <?php body_class(); ?>>
   <header>
      <!-- Top Bar -->
      <section class="top-bar">
         <div class="container">
            <div class="row">
               <div class="top-bar__sm-icons col-6 col-sm-8 col-xl-10">Social Media Icons</div>
               <div class="top-bar__search col-6 col-sm-4 col-xl-2 text-right">
                  <?php get_search_form(); ?>
               </div>
            </div>
         </div>
      </section>

      <!-- Navigation -->
      <section class="menu">
         <div class="container">
            <div class="row">
               <section class="logo col-12 col-md-2 text-center">Logo</section>
               <nav class="menu__main-menu col-12 col-md-10 text-right">
                  <?php
                     $args = array(
                        'theme_location' => 'main_menu'
                     );
                  wp_nav_menu($args);
                  ?>
               </nav>
            </div>
         </div>
      </section>
   </header>