<?php
/**
 * singl Theme Customizer
 *
 * @package Singl
 */

/**
 * Customizer real-time preview and settings.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function singl_customize_register( $wp_customize ) {
	/**
	 * Add real-time preview.
	 */
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Add the Theme section and settings.
	 */
	$wp_customize->add_section( 'singl_theme_options', array(
		'title'             => esc_html__( 'Theme Options', 'singl' ),
		'priority'          => 200,
	) );

	// Full background cover
	$wp_customize->add_setting( 'singl_background_size', array(
		'sanitize_callback' => 'singl_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'singl_background_size', array(
		'label'			    => esc_html__( 'Full Page Background Image', 'singl' ),
		'section'		    => 'singl_theme_options',
		'type'              => 'checkbox',
	) );

	// Subscribe form
	$wp_customize->add_setting( 'singl_subscribe_form', array(
		'sanitize_callback' => 'singl_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'singl_subscribe_form', array(
		'label'			    => esc_html__( 'Subscribe Form', 'singl' ),
		'section'		    => 'singl_theme_options',
		'type'              => 'checkbox',
	) );

	// Social media links
	$wp_customize->add_setting( 'singl_twitter_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_twitter_link', array(
		'label'             => esc_html__( 'Twitter Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_facebook_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_facebook_link', array(
		'label'             => esc_html__( 'Facebook Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_pinterest_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_pinterest_link', array(
		'label'             => esc_html__( 'Pinterest Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_google_plus_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_google_plus_link', array(
		'label'             => esc_html__( 'Google+ Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_instagram_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_instagram_link', array(
		'label'             => esc_html__( 'Instagram Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_youtube_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_youtube_link', array(
		'label'             => esc_html__( 'YouTube Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_vimeo_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_vimeo_link', array(
		'label'             => esc_html__( 'Vimeo Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_wordpress_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_wordpress_link', array(
		'label'             => esc_html__( 'WordPress Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_vine_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_vine_link', array(
		'label'             => esc_html__( 'Vine Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_soundcloud_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_soundcloud_link', array(
		'label'             => esc_html__( 'SoundCloud Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_lastfm_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_lastfm_link', array(
		'label'             => esc_html__( 'Last.fm Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_spotify_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_spotify_link', array(
		'label'             => esc_html__( 'Spotify Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_itunes_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_itunes_link', array(
		'label'             => esc_html__( 'iTunes Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_beatport_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_beatport_link', array(
		'label'             => esc_html__( 'Beatport Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_bandcamp_link', array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'singl_bandcamp_link', array(
		'label'             => esc_html__( 'Bandcamp Link', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );

	$wp_customize->add_setting( 'singl_email_link', array(
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'singl_email_link', array(
		'label'             => esc_html__( 'Email Address', 'singl' ),
		'section'           => 'singl_theme_options',
		'type'              => 'text',
	) );
}
add_action( 'customize_register', 'singl_customize_register' );

/**
 * Sanitize a checkbox setting.
 */
function singl_sanitize_checkbox( $value ) {
	return ( 1 == $value );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function singl_customize_preview_js() {
	wp_enqueue_script( 'singl-customizer-script', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130410', true );
}
add_action( 'customize_preview_init', 'singl_customize_preview_js' );