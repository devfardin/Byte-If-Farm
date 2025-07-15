<?php
/**
 * Sets up theme defaults
 */
function devzet_theme_setup(){

	// Thumbnails
	add_theme_support( 'post-thumbnails' );

	update_option( 'thumbnail_size_w', 114 );
	update_option( 'thumbnail_size_h', 114 );
	update_option( 'thumbnail_crop', 1 );

	update_option( 'medium_size_w', 388 );
	update_option( 'medium_size_h', 285 );
	update_option( 'medium_crop', 1 );

	update_option( 'medium_large_size_w', 872 );
	update_option( 'medium_large_size_h', 529 );
	update_option( 'medium_large_crop', 1 );

	add_image_size('thumb_lg', 648, 467, true );

}
add_action( 'after_setup_theme', 'devzet_theme_setup' );