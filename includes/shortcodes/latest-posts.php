
<?php
function rander_byteit_latest_post()
{
    ob_start(); ?>

    <!-- Enqueue style  -->
    <?php
    wp_enqueue_style('byteitfarm_latest_blog_posts');

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
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
                                    <h1><?php echo substr(get_the_title(), 0, 70); ?>...</h1>
                                    <a class="lates-post__read_more" href="<?php the_permalink(); ?>">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            <?php else: ?>
                <h1 class="latest-posts__empty_mesage">No posts are available at the moment</h1>
            <?php endif; ?>
        </div>
    </section>

    <?php
    return ob_get_clean();
}
add_shortcode('byteit_last_blog', 'rander_byteit_latest_post');