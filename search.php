<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>
<div class="byteitfarm-body">
    <div id="content">
        <?php echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display(577); ?>
    </div>
</div>

<?php
get_footer();