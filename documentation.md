# Documentation

## Echo(s):

- Post meta: `<p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>`
- Post categories: `<p>Categories: <?php the_category(' '); ?></p>`
- Post tags: `<?php the_tags( 'Tags: ', ', '); ?>`

## Register styles & scripts

1. Enqueue scripts inside `functions.php` file

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

1. In `header.php` and `footer.php` files, write this code:

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

- Create a new menu
- Drag links of pages
- Choose location `Main Menu`
- Click `save` button

5. Show menu in the website:

```php
<nav class="menu__main-menu col-12 col-md-10 text-right">
  <?php
      $args = array(
         'theme_location' =>
  'main_menu' ); wp_nav_menu($args); ?>
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

- To create a template for a specific page, just name the page as `page-$page-slug.php`
- The name must begin with `page-`
- By default, every page will output the same content of `page.php` layout
- If `page.php` not found, every page will output the content inside it. Content will be like post layout!
- This means that `page.php` inherits the default template `index.php` layout

## General Template / templates in admin dashboard

- General templates used to output the same content on every page in the case of:

  - No `page-$page-slug.php` found
  - Or we want the design & layout of a specific page to be different

### To create a general template, or a page template:

- Create a `general-template.php` file

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

- To assign a template to a specific page, we choose the required template from `Page Attributes` from admin area of the page

## Template parts

- Template parts use the concept `DRY` of the programming, don't repeat yourself

- Cut `<article>...</article>` in `index.php` file and put it in `template-parts/content` file
- Call the file in `index.php` file

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

## Custom header image feature

1. Write the code in `functions.php` file

```php
function learno_features() {
   // Custom header
   $args = array(
      'width' => 1920,
      'height' => 225
   );
   add_theme_support('custom-header', $args);
}

add_action('after_setup_theme', 'learno_features');
```

2. In the admin area, `Apperance -> Header`, upload images & use `crop, resize` and `randomize uploaded headers` if you want to change header while refreshing the browser

3. Write the code of `custom-header` on every place you want to use it:

```php
<!-- Header image from theme features -->
<!-- By default the image will be large, use img-fluid to set img with 100% of its parent -->
<img class="img-fluid" src="<?php header_image();?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="Header custom image">
```

- We have used it on `index.php` & `general-template` files

## Post thumbnail feature

- Declare support in `functions.php` file

```php
// Post thumbnail (There're options for the sizes of each uploaded image -> [150*150 def, medium, large, full, custom(array)])
add_theme_support('post-thumbnails');
```

- Upload featured image for the post
- Write this code in `index.php` or in file(s) you want to show post's images

```php
<!-- Options: //( thumbnail(150*150), medium, larage, full, custom) -->
<?php the_post_thumbnail(array(1000, 400)); ?>
```

## Post formats

1. Write this code in `functions.php` file

```php
 // Post formats
add_theme_support('post-formats', array('video', 'image'));
```

2. Creat 2 posts, One for image and another for video. Choose the `Post Format` for each post
3. Create a specific template for the post

   - Create a `template-parts/content-image.php` file
   - Create a `template-parts/content-vidoe.php` file

4. Write the design for these posts. Delete/add some code or design from the files

   - From `content-image.php` file, delete `Post date`
   - From `content-video.php` file, delete `Post author`

5. Show this format/desgin in `index.php` file

```php
<?php get_template_part('template-parts/content', get_post_format()); ?>
// Will call 'template-parts/content-image.php' or '-video.php' files
```

## Sidebars

1. Write this code in `functions.php` file:

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

- Two sidebars were created, one for `Home` page and another for `Blog` page, perfect!

2. Add required widgets (built-in with wordpress) to each sidebar
3. Create a file with the name `sidebar.php` and write this code:

```php
<?php
// If there're widgets in sidebar -> Show this sidebar
if (is_active_sidebar('sidebar-2')) {
   <?php dynamic_sidebar('sidebar-2');
}
```

- If you plan to use different `sidebars` in pages, create a file `sidebar-$page-slug.php`

4. Show the sidebar in the website

- Show `Home Sidebar`, `sidebar-home.php` has been created

```php
<?php // get_sidebar(); // if single sidebar for all pages ?>
<?php get_sidebar('home'); ?>
```

- Show `Blog Sidebar`, `sidebar-blog.php` has been created

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

## Custom `WP Query`

- Used in the case of fetching specific categoriess posts
- Here you don't want to show normal loop posts, but you want to allow the query to start loop and seach in a place you specify

### Parameter string method

```php
<section class="featured-post">
   <div class="container">
      <?php
         // Prepare the query
         $featured = new WP_Query('post_type=post&posts_per_page=2&cat=9'); // You can use array() method

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
```

### Array method

```php
// Prepare the custom WP_Query
$args = array(
   'post_type' => 'post', // be default is post
   'posts_per_page' => 2,
   'category__not_in' => array(5), // e.g.
   'category__in' => array(3, 9),
   'offset' => 1 // ignore the first item from the list (to not repeat elements)
);
$secondary = new WP_Query($args);

// Start the loop
if ($secondary->have_posts()) :
   while ($secondary->have_posts()) :
      $secondary->the_post();
   endwhile;
endif;
// Reset custom WP_Query to allow this query work here only not for other places
wp_reset_postdata();
```

## Single post

1. Give each post in the blog `<a href="<?php the_permalink();"></a>` around `<?php the_title(); ?>` tag
2. Create a file `single.php` and write this code:

```php
<?php get_header(); ?>
   <article class="single-post">
      <?php
         // You don't have to check (if) there're posts, because you're in the post!
         while (have_posts()) :
            the_post();

            // Show the content -> design
            get_template_part('template-parts/content', 'single');
         endwhile;
      ?>
   </article>
<?php get_footer(); ?>
```

## Comments

- To disable comments in new posts, disable the choice from `settings -> discussion -> allow people to commnet on new posts`

- Create a `commnets.php` file
- Write this code in `single.php` file:

```php
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
```

## Search feature

- Write this code in `header.php` file or the place you want search to appear

```php
<div class="top-bar__search col-6 col-sm-4 col-xl-2 text-right">
   <?php get_search_form(); ?>
</div>
```

- Start searching for something

### Extra with search

- Create `search.php` file
- Copy content of `single` to the file
- Include a `'template-parts/content', 'search'` file
- Copy content of `content-single.php` file inside this file

## Pagination

### Posts pagination

1. Edit `Settings -> Reading` from admin area
2. Write this code in `index.php` file

```php
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
```
