<?php

function learno_files() {
   // Fonts

   // Styles
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