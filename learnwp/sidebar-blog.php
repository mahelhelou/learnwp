<?php 

// Checks if there's a widget area with id sidebar-2
if( is_active_sidebar( 'sidebar-2' ) ){
	// If we find it, load its widgets
	dynamic_sidebar( 'sidebar-2' );
}

?>