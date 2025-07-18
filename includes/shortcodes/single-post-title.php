<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function rander_byteitfarm_single_post_title()
{
    ob_start(); ?>
    <?php if (is_single()): ?>
        <style>
            .byteitfarm_single_post_title {
                font-size: 30px;
                font-weight: 700;
                line-height: 1.4em;
                color: #fff;
                margin-bottom: -15px;
            }

            @media only screen and (min-width: 768px) {
                .byteitfarm_single_post_title {
                    font-size: 35px;
                    margin-bottom: -20px;
                }
            }

            @media only screen and (min-width: 992px) {
                .byteitfarm_single_post_title {
                    font-size: 40px;
                    margin-bottom: -20px;
                }
            }
        </style>
        <h2 class="byteitfarm_single_post_title">
            <?php echo get_the_title(); ?>
        </h2>
    <?php endif; ?>
    <?php return ob_get_clean();
}
add_shortcode('byteitfarm_single_post_title', 'rander_byteitfarm_single_post_title');