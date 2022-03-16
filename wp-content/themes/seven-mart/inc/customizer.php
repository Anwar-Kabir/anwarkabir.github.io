<?php
/**
 * Seven Mart Theme Customizer
 *
 * @package seven_mart
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function seven_mart_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Load sanitize functions.
	include get_template_directory() . '/inc/sanitize.php';

	include get_template_directory() . '/inc/upsell/upsell-section.php';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'seven_mart_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'seven_mart_customize_partial_blogdescription',
		) );
	}

	$wp_customize->register_section_type( 'seven_mart_Customize_Upsell_Section' );

	// Register section.
	$wp_customize->add_section(
		new seven_mart_Customize_Upsell_Section(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Seven Mart Pro', 'seven-mart' ),
				'pro_text' => esc_html__( 'Buy Pro', 'seven-mart' ),
				'pro_url'  => 'https://kantipurthemes.com/downloads/seven-mart-pro/',
				'priority' => 10,
			)
		)
	);
}
add_action( 'customize_register', 'seven_mart_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function seven_mart_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function seven_mart_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function seven_mart_customize_preview_js() {
	wp_enqueue_script( 'seven-mart-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'seven_mart_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function seven_mart_customizer_control_scripts() {

	wp_enqueue_style( 'seven-mart-customize-controls', get_template_directory_uri() . '/assets/css/customize-controls.css', '', '1.0.0' );

	wp_enqueue_script( 'seven-mart-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls.js', array( 'customize-controls' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'seven_mart_customizer_control_scripts', 0 );
