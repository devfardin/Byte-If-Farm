<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'BYTEITFARM_THEME_DIR', __DIR__ );
define( 'BYTEITFARM_THEME_URL', get_stylesheet_directory_uri() );

// Theme shortcode
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/blog-posts.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/categories-posts.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/author-post.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/search-posts.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/single-post-title.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/single-post-details.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/single-post-categories.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/single-popular-blog-posts.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/view-counter.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/reviews.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/latest-reviews.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/latest-posts.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/shortcodes/search-form.php');
require_once( BYTEITFARM_THEME_DIR . '/includes/setup.php' );

/** 
 * Frontend Styles and Scripts
 */
function irisx_theme_enqueue_frontend_scripts() {

	// Enqueue style  for applying style

	wp_enqueue_style(
		'byte_it_farm_main_style',
		BYTEITFARM_THEME_URL . '/assets/css/main.css',
		array(),
		filemtime( BYTEITFARM_THEME_DIR . '/assets/css/main.css' ),
	);
	wp_enqueue_style(
		'home_page_style',
		BYTEITFARM_THEME_URL . '/assets/css/home-page-style.css',
		array(),
		filemtime( BYTEITFARM_THEME_DIR . '/assets/css/home-page-style.css' ),
	);
	wp_enqueue_style(
		'about-page-style.css',
		BYTEITFARM_THEME_URL . '/assets/css/about-page-style.css',
		array(),
		filemtime( BYTEITFARM_THEME_DIR . '/assets/css/about-page-style.css' ),
	);


	// Register blog post style
	wp_register_style(
		'blog_post_page_style',
		BYTEITFARM_THEME_URL . '/assets/css/blog-posts.css',
		array(),
		filemtime( BYTEITFARM_THEME_DIR . '/assets/css/blog-posts.css' ),
	);

	wp_register_style(
		'iris_single_post_style',
		BYTEITFARM_THEME_URL . '/assets/css/single-posts.css',
		array(),
		filemtime( BYTEITFARM_THEME_DIR . '/assets/css/single-posts.css' ),
	);
	wp_register_style(
		'iris_single_post_categories',
		BYTEITFARM_THEME_URL . '/assets/css/single-post-categories.css',
		array(),
		filemtime( BYTEITFARM_THEME_DIR . '/assets/css/single-post-categories.css' ),
	);
	wp_register_style(
		'iris_single_popular_blog_post',
		BYTEITFARM_THEME_URL . '/assets/css/single-popular-blog-posts.css',
		array(),
		filemtime( BYTEITFARM_THEME_DIR . '/assets/css/single-popular-blog-posts.css' ),
	);
	wp_register_style(
		'byteitfarm_customer_reviews',
		BYTEITFARM_THEME_URL . '/assets/css/reviews.css',
		array(),
		filemtime( BYTEITFARM_THEME_DIR . '/assets/css/reviews.css' ),
	);
	wp_register_style(
		'byteitfarm_latest_blog_posts',
		BYTEITFARM_THEME_URL . '/assets/css/latest-blog-posts.css',
		array(),
		filemtime( BYTEITFARM_THEME_DIR . '/assets/css/latest-blog-posts.css' ),
	);
	wp_register_style(
		'byteitfarm_blog_post_search',
		BYTEITFARM_THEME_URL . '/assets/css/search-form.css',
		array(),
		filemtime( BYTEITFARM_THEME_DIR . '/assets/css/search-form.css' ),
	);

}
add_action( 'wp_enqueue_scripts', 'irisx_theme_enqueue_frontend_scripts' );


function load_dashicons_front_end() {
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'load_dashicons_front_end');