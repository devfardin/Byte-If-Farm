<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Wordpress custom search form

function custom_search_in_post()
{
  wp_enqueue_style('    byteitfarm_blog_post_search');
  ?>

  <aside class="sub-search widget widget_search">
    <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform" class="search-form">
      <div class="custom-search-wrapper">
        <input type="text" name="s" class="blog_post_search_input" placeholder="Search blog posts..." />
        <input type="hidden" name="post_type" value="products" />
        <button type="submit" class="blog_post_search_button" aria-label="Search">
        </button>
      </div>
    </form>
  </aside>




<?php }
add_shortcode('byteitfarm_post_search', 'custom_search_in_post');