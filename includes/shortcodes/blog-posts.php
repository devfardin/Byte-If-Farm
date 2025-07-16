<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
function rander_byteit_blog_posts()
{
    ob_start(); ?>

    <!-- Enqueue style  -->
    <?php
    wp_enqueue_style('blog_post_page_style');

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged,
    );
    $query = new \WP_Query($args);
    ?>
    <section class="latest-posts">
        <div class="latest-posts__container">
            <?php if ($query->have_posts()): ?>
                <!-- Get all post here  -->
                <div class="latest-posts__row">
                    <?php while ($query->have_posts()):
                        $query->the_post(); ?>
                        <div class='latest-posts__inner'>
                            <div class='latest-posts__media'>
                                <a href="<?php the_permalink(); ?>" rel="bookmark"
                                    aria-label="More about <?php echo get_the_title(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                            <div clas="latest-posts__meta_info">
                                <div class="latest-posts__auther">
                                    <div class="latest-posts__profile_name">
                                        <?php $author_id = get_the_author_meta('ID'); ?>
                                        <a class='author_box latest-posts__autherInfo'>
                                            <img class='latest-posts__author_avatar' src="<?php echo get_avatar_url($author_id) ?>"
                                                alt="<?php echo get_the_author_meta('display_name', $author_id) ?>" />
                                            <h3 class='auther_display_name'>
                                                <?php echo get_the_author_meta('display_name', $author_id); ?>
                                            </h3>
                                        </a>
                                    </div>
                                    <div class="latest-post__category">
                                        <?php
                                        $categories = get_the_terms(get_the_ID(), 'category');
                                        if ($categories) {
                                            $first_three_categories = array_slice($categories, 0, 1, false);
                                            foreach ($first_three_categories as $category):
                                                $link = get_term_link($category, 'category'); ?>
                                                <span class='blog_post_category'>
                                                    <?php echo esc_html($category->name) ?>
                                                </span>
                                                <?php
                                            endforeach;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="latest-post__title">
                                    <h1><?php echo substr(get_the_title(), 0, 35); ?>...</h1>
                                    <P><?php echo substr(get_the_excerpt(), 0, 100) ?></P>
                                    <a class="lates-post__read_more" href="<?php the_permalink(); ?>">
                                        Read More
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.22 19.03a.75.75 0 0 1 0-1.06L18.19 13H3.75a.75.75 0 0 1 0-1.5h14.44l-4.97-4.97a.749.749 0 0 1 .326-1.275.749.749 0 0 1 .734.215l6.25 6.25a.75.75 0 0 1 0 1.06l-6.25 6.25a.75.75 0 0 1-1.06 0Z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="blog_post_navigation" role="navigation">
                    <?php
                    $total_pages = $query->max_num_pages;
                    if ($total_pages > 1) {
                        $current_page = max(1, get_query_var('paged'));
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text' => __(' <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><polyline points="15 18 9 12 15 6"></polyline></svg>'),

                            'next_text' => __('<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="m9 18 6-6-6-6"></path></svg>'),
                        ));
                    }
                    ?>
                </div>

            <?php else: ?>
                <h1 class="blog_no_post_message">No posts are available at the moment</h1>
            <?php endif; ?>
        </div>
    </section>

    <?php
    return ob_get_clean();
}
add_shortcode('byteit_blog_posts', 'rander_byteit_blog_posts');