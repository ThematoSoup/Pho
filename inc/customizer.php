<?php
/**
 * Bolt Theme Customizer
 *
 * @package Bolt
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bolt_customize_register( $wp_customize ) {
	// Primary Color setting
	$wp_customize->add_setting( 'bolt_primary_color', array(
		'default'     => '#50b0b8',
		'type'        => 'theme_mod',
		'capability'  => 'edit_theme_options',
		'transport'   => 'postMessage',
	) );     

	// Primary Color control
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'bolt_primary_color',
		array(
			'label'      => __( 'Primary Color', 'bolt' ),
			'section'    => 'colors',
			'settings'   => 'bolt_primary_color',
			'priority'   => 5,
		) 
	) );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'bolt_customize_register' );

/**
 * Adds Customizer CSS to front-end.
 */
function bolt_customize_css() { ?>
	<style type="text/css">
		a { color:<?php echo get_theme_mod( 'bolt_primary_color' ); ?>; }
	</style>
<?php }
add_action( 'wp_head', 'bolt_customize_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bolt_customize_preview_js() {
	wp_enqueue_script( 'bolt_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bolt_customize_preview_js' );
