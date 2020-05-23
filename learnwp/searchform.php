<?php
/**
 * Template for displaying search forms in Learn WP
 *
 * @package WordPress
 * @subpackage Learn WP
 * @since Learn WP 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'OK', 'submit button', 'twentysixteen' ); ?></span></button>
</form>