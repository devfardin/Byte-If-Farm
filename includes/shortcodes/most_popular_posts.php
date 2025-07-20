<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function most_popular_posts()
{
    ob_start();
    wp_enqueue_style('byteitfarm_popular_blog_posts');
    $popularpost = new WP_Query(array(
        'posts_per_page' => 6,
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'meta_value_num',
        'meta_key' => 'post_views_count',
        'order' => 'DESC'
    ));
    ?>
    <div class="most_popular_post_container">

        <?php if ($popularpost->have_posts()):
            while ($popularpost->have_posts()):
                $popularpost->the_post(); ?>
                <div class="most_popular_post_wrapper">

                    <div class="popular_post_thumb">
                        <a href="<?php the_permalink(); ?>" rel="bookmark" aria-label="More about <?php echo get_the_title(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    </div>

                    <div class="most_popular_post_info">
                        <a href="<?php the_permalink(); ?>" class="most-popular-posts__post__title">
                            <?php echo substr(get_the_title(), 0 , 40); ?>
                        </a>
                        <?php $post_time = get_post_time(); ?>
                        <span> <?php echo date("h:i a, d M Y", $post_time); ?> </span>
                    </div>

                </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        <?php endif; ?>
    </div>

    <?php return ob_get_clean();
}
add_shortcode("byteitfarm_most_popular_post", "most_popular_posts");