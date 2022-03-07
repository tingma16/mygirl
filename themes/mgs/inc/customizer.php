<?php
/**
 * my girl shop Theme Customizer
 *
 * @package my_girl_shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mgs_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'mgs_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'mgs_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_setting( 'mgs_logo_alt' );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'mgs_logo_alt', array(
		'label' => 'Logo (alt)',
		'section' => 'title_tagline',
		'priority' => 9,
	) ) );

	$wp_customize->add_panel( 'mgs_social_media', array(
		'title' => esc_html__( 'social_media', 'mgs' ),
		
	) );

	$wp_customize->add_section( 'mgs_facebook', array(
		'title' => esc_html__( 'Facebook', 'mgs' ),
		'panel' => 'mgs_social_media',
	) );

	$wp_customize->add_setting( 'mgs_facebook_title' );

	$wp_customize->add_control( 'mgs_facebook_title', array(
		'label' => 'Title',
		'description'=>'Enter your Link title',
		'section' => 'mgs_facebook',
	));


	$wp_customize->add_setting( 'mgs_facebook_url' );

	$wp_customize->add_control( 'mgs_facebook_url', array(
		'label' => 'URL',
		'description'=>'Enter your Facebook profile',
		'type' => 'url',
		'section' => 'mgs_facebook',
	));

	$wp_customize->add_setting( 'mgs_facebook_icon' );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'mgs_facebook_icon', array(
		'label' => 'Icon',
		'section' => 'mgs_facebook',
	) ) );

	$wp_customize->add_section( 'mgs_twitter', array(
		'title' => esc_html__( 'Twitter', 'mgs' ),
		'panel' => 'mgs_social_media',
	) );

	$wp_customize->add_setting( 'mgs_twitter_url' );

	$wp_customize->add_control( 'mgs_twitter_url', array(
		'label' => 'URL',
		'description'=>'Enter your Twitter profile',
		'type' => 'url',
		'section' => 'mgs_twitter',
	));
	$wp_customize->add_setting( 'mgs_twitter_icon' );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'mgs_twitter_icon', array(
		'label' => 'Icon',
		'section' => 'mgs_twitter',
	) ) );

	
}
add_action( 'customize_register', 'mgs_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mgs_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mgs_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mgs_customize_preview_js() {
	wp_enqueue_script( 'mgs-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), MGS_VERSION, true );
}
add_action( 'customize_preview_init', 'mgs_customize_preview_js' );
