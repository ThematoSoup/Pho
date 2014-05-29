<?php
/**
 * The Sidebar containing the footer widget area.
 *
 * @package Bolt
 */
?>

	<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>

	<?php tha_sidebars_before(); ?>
	<div id="footer-widgets" class="widget-area" role="complementary">
		<?php tha_sidebar_top(); ?>

		<?php dynamic_sidebar( 'footer-widget-area' ); ?>

		<?php tha_sidebar_bottom(); ?>
	</div><!-- #secondary -->
	<?php tha_sidebars_after(); ?>

	<?php endif; ?>	