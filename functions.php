<?php

function learno_files() {
   // Styles & fonts
   wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0', 'all');
   wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0', 'all');

   wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
   wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', NULL, '1.0', true);
}

add_action('wp_enqueue_scripts', 'learno_files');

function learno_features() {
   // Registering menus
   register_nav_menus(array(
      // slug => name in dashboard (menus)
      'main_menu' => 'Main Menu'
   ));

   // Custom header
   $args = array(
      'width' => 1920,
      'height' => 225
   );
   add_theme_support('custom-header', $args);

   // Post thumbnail (There're options for the sizes of each uploaded image -> [150*150 def, medium, large, full, custom(array)])
   add_theme_support('post-thumbnails');

   // Post formats
   add_theme_support('post-formats', array('video', 'image'));
}

add_action('after_setup_theme', 'learno_features');

// Registering sidebars
function learno_sidebars() {
   // Home sidebar
   $home_sidebar = array(
      'name' => 'Home Sidebar',
      'id' => 'sidebar-1',
      'description' => 'This is the homepage sidebar. Start adding widgets here.',
      'before_widget' => '<div class="widget__wrapper">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget__title">',
      'after_title' => '</h2>'
   );

   // Blog sidebar
   $blog_sidebar = array(
      'name' => 'Blog Sidebar',
      'id' => 'sidebar-2',
      'description' => 'This is the blog sidebar. Start adding widgets here.',
      'before_widget' => '<div class="widget__wrapper">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget__title">',
      'after_title' => '</h2>'
   );

   // Service 1 sidebar
   $service1 = array(
      'name' => 'Service 1 Sidebar',
      'id' => 'service-1',
      'description' => 'This is the service 1 sidebar. Start adding widgets here.',
      'before_widget' => '<div class="widget__wrapper">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget__title">',
      'after_title' => '</h2>'
   );

   // Service 2 sidebar
   $service2 = array(
      'name' => 'Service 2 Sidebar',
      'id' => 'service-2',
      'description' => 'This is the service 2 sidebar. Start adding widgets here.',
      'before_widget' => '<div class="widget__wrapper">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget__title">',
      'after_title' => '</h2>'
   );

   // Service 3 sidebar
   $service3 = array(
      'name' => 'Service 3 Sidebar',
      'id' => 'service-3',
      'description' => 'This is the service 3 sidebar. Start adding widgets here.',
      'before_widget' => '<div class="widget__wrapper">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget__title">',
      'after_title' => '</h2>'
   );

   register_sidebar($home_sidebar);
   register_sidebar($blog_sidebar);
   register_sidebar($service1);
   register_sidebar($service2);
   register_sidebar($service3);
}

add_action('widgets_init', 'learno_sidebars');