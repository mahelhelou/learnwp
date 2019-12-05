# Documentation

## Files
1. `index.php`
2. `style.css`
3. `functions.php`
4. `screenshot.png`
5. `header.php`
6. `footer.php`

## Slicing files
1. `<?php get_header(); ?>`
2. `<?php get_footer(); ?>`

## Register styles & scripts
1. Create `functions.php` and write this code:

```php
function learno_files() {
   // Fonts

   // Styles
   wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0', 'all');
   wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0', 'all');

   wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
   wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', NULL, '1.0', true);
}

add_action('wp_enqueue_scripts', 'learno_files');
```

2. In the `header.php` and `footer.php` files, write this code:

```php
// Before </head>
<?php wp_head(); ?>

// Before </body>
<?php wp_footer(); ?>
```

## Register menus in wordpress
1. Create pages from admin area
2. Register the menu in the `functions.php` file

```php
register_nav_menus(array(
   // slug => name in dashboard (Appearance -> Menus)
   'main_menu' => 'Main Menu'
));
```

3. In admin area `Appearance -> Menus`:
* Create a new menu
* Drag links of pages
* Choose location `Main Menu`
* Click `save` button

5. Show area in the website:

```html
<nav class="menu__main-menu col-12 col-md-10 text-right">
   <?php
      $args = array(
         'theme_location' => 'main_menu'
      );
   wp_nav_menu($args);
   ?>
</nav>
```

## Looping posts
1. Create some posts from admin area
2. Show the posts by using `wordpress loop`:

```php
<?php
   // Fetching
   if(have_posts()):
      while(have_posts()):
         the_post(); ?>
<article>
   // Show post(s)
   <h2><?php the_title(); ?></h2>
   <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
   <p>Categories: <?php the_category(' '); ?></p>
   <?php the_content(); ?>
</article>
      <?php endwhile;
      else: ?>
      <p>No posts to show yet.</p>
   <?php endif;
?>
```

## Template pages
* To create a template for a specific page, just name the page as `page-any-name.php`
* The name must begin with `page-`
* By default, every page will output the same content of `page.php` layout
* If `page.php` not found, every page will output the content inside it. Content will be like post layout!
* This means, the default template is `index.php` template

## General Template
* General templates used to output the same content on every page in the case of:
   - No `page-page-name.php` found
   - Or we want the design & layout of a specific page to be different

* To create a general template, or a page template:

```php
<?php
/*
Template Name: General Template
*/
?>

<?php get_header(); ?>

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
```

* To assign a template to a specific page, we choose the required template from `Page Attributes` from admin area of the page

## Template parts
* Template parts use the concept `DRY` of the programming, don't repeat yourself

* Cut `<article>...</article>` in `index.php` file and put it in `template-parts/content` file
* Call the file in `index.php` file

```php
<?php 
   if(have_posts()):
      while(have_posts()):
         the_post(); ?>
      
      <?php get_template_part('template-parts/content'); ?>

      <?php endwhile;
      else: ?>
      <p>No posts to show yet.</p>
   <?php endif;
?>
```

## Theme support
### 1. Menus -> defined above

### 2. Custom header image
1. Write the code in `functions.php` file

```php
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
}

add_action('after_setup_theme', 'learno_features');
```

2. In the admin area, `Apperance -> Header`, upload images & use `crop, resize` and `randomize uploaded headers` if you want to change header while reloading the browser

3. Write the code of `custom-header` on every place you want to use it:

```php
<!-- Header image from theme features -->
<img class="img-fluid" src="<?php header_image();?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="Header custom image">
```

* We have used it on `index.php` & `general-template` files

### 3. Post thumbnail
* To make your theme support `post thumbnail`:
1. Use this code in the `functions.php` file

```php
// Post thumbnail (There're options for the sizes of each uploaded image -> [150*150 def, medium, large, full, custom(array)])
add_theme_support('post-thumbnails');
```

2. Upload featured image for the post
3. Write this code in `index.php` or under the post you want to print the image for

```php
<!-- Options: //( thumbnail(150*150), medium, larage, full, custom) -->
<?php the_post_thumbnail(array(1000, 400)); ?>
```

### 4. Post formats
1. Add the code to `functions.php` file

```php
 // Post formats
add_theme_support('post-formats', array('video', 'image'));
```

2. Creat 2 posts, One for image and another for video. Choose the `Post Format` for each post
3. Create a specific template for the post
   * Create a `template-parts/content-image.php` file
   * Create a `template-parts/content-vidoe.php` file

4. Delete some code or design from the files
   * From `content-image.php` file, delete `Post date`
   * From `content-video.php` file, delete `Post author`

5. Show this format / desgin in `index.php` file

```php
<?php get_template_part('template-parts/content', get_post_format()); ?>
```

## Sidebars
1. Write this code in the `functions.php` file:

```php
// Registering sidebars
function learno_sidebars() {
   $home_sidebar = array(
      'name' => 'Home Sidebar',
      'id' => 'sidebar-1',
      'description' => 'This is the homepage sidebar. Start adding widgets here.',
      'before_widget' => '<div class="widget__wrapper">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget__title">',
      'after_title' => '</h2>'
   );

   $blog_sidebar = array(
      'name' => 'Blog Sidebar',
      'id' => 'sidebar-2',
      'description' => 'This is the blog sidebar. Start adding widgets here.',
      'before_widget' => '<div class="widget__wrapper">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget__title">',
      'after_title' => '</h2>'
   );

   register_sidebar($home_sidebar);
   register_sidebar($blog_sidebar);
}

add_action('widgets_init', 'learno_sidebars');
```

* Two sidebars were created, one for `Home` page and another for `Blog` page, perfect!

2. Add required widgets (built-in with wordpress) to each sidebar
3. Create a file with the name `sidebar.php` and write this code:

```php
<?php
// If the there're widgets in sidebar -> Show this sidebar
if (is_active_sidebar('sidebar-2')) {
   <?php dynamic_sidebar('sidebar-2');  
}
```

* If you plan to use different `sidebars` in pages, create a file `sidebar-page-name.php`

4. Show the sidebar in the website

* Show `Home Sidebar`, `sidebar-home.php` has been created

```php
<?php // get_sidebar(); // if single sidebar for all pages ?>
<?php get_sidebar('home'); ?>
```

* Show `Blog Sidebar`, `sidebar-blog.php` has been created

```php
<?php // get_sidebar(); // if single sidebar for all pages ?>
<?php get_sidebar('blog'); ?>
```

## Sidebars for services items
1. Add the name of `sidebars` to function

```php
...
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
...
```

2. Add `image` and `text` widgets to each `sidebar`. Upload an image, write a service title and short discription
3. Show the sidebars in `page-home.php` file

```php
// container > row ..
<div class="col-sm-4">
   <div class="services__item">
      <?php 
         if (is_active_sidebar('service-1')) {
            dynamic_sidebar('service-1');
         } 
      ?>
   </div>
</div>
// more columns(services) ...
```