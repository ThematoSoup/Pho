<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Bolt
 */
?>

		<?php tha_content_bottom(); ?>
	</div><!-- #content -->
	<?php tha_content_after(); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar( 'footer' ); ?>

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bolt' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'bolt' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'bolt' ), 'Bolt', '<a href="http://thematosoup.com" rel="designer">ThematoSoup</a>' ); ?>
		</div><!-- .site-info -->

		<?php wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => 1, 'fallback_cb' => '' ) ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>
