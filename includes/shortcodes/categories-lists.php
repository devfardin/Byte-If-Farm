<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function all_category_list()
{
    ob_start();
    $all_categories = get_categories(array(
        'taxonomy' => 'category',
        'orderby' => 'post',
        'order' => 'ASC',
        'hide_empty' => true // Set to true to hide empty categories
    ));
    ?>
    <div class="all_post_categories_continer">
        <ul class="all_post_categories__wrap">
            <?php foreach ($all_categories as $category): ?>
                <li class="categories_items">
                    <a href="<?php echo get_term_link($category); ?>">
                        <?php echo esc_html($category->name); ?>

                        <span class="span">
                            <?php echo intval($category->count); ?>
                        </span>
                    </a>

                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <?php return ob_get_clean();
}
add_shortcode("byteitfarm_all_category_list", "all_category_list");