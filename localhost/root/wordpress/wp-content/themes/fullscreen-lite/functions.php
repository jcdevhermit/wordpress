<?php
/**
 * Fullscreen functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */
/**
 * Registers widget areas.
 *
 */
function fullscreen_lite_widgets_init() {
	register_sidebar(array(
		'name'          => __( 'Page Sidebar', 'fullscreen-lite' ),
		'id'            => 'page-sidebar',
		'before_widget' => '<li id="%1$s" class="ske-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="ske-title">',
		'after_title'  => '</h3>',
	));
	register_sidebar(array(
		'name'          => __( 'Blog Sidebar', 'fullscreen-lite' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<li id="%1$s" class="ske-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="ske-title">',
		'after_title' 	=> '</h3>',
	));
}
add_action( 'widgets_init', 'fullscreen_lite_widgets_init' );

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Fullscreen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
*/
function fullscreen_lite_theme_setup() {
	/*
	 * Makes Fullscreen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'fullscreen-lite' to the name of your theme in all
	 * template files.
	 */
	 load_theme_textdomain( 'fullscreen-lite', get_template_directory() . '/languages' );
	 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	add_theme_support( 'title-tag' );

	$pre_options = ( get_option('fullscreen_lite_option_tree') != '' ) ? get_option( 'fullscreen_lite_option_tree' ) : false ;
	if ($pre_options) {
		// This theme allows users to set a custom header.
		add_theme_support( 'custom-header', array( 'flex-width' => true, 'width' => 1600, 'flex-height' => true, 'height' => 750, 'default-image' => fullscreen_lite_get_option( 'fullscreen_frontslider_stype' ) ) );
	} else {
		// This theme allows users to set a custom header.
		add_theme_support( 'custom-header', array( 'flex-width' => true, 'width' => 1600, 'flex-height' => true, 'height' => 750, 'default-image' => get_template_directory_uri() . '/images/static-img.jpg') );
	}
	

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'fullscreen_lite_custom_background_args', array('default-color' => 'f5f5f5', 'default-image' => get_template_directory_uri() . '/images/linedpaper.png' ) ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Enable support for Post Formats
	 */
	set_post_thumbnail_size( 600, 220, true );
	add_image_size( 'fullscreen_standard_img',770,365,true); //standard size
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header' => __( 'Main Navigation', 'fullscreen-lite' ),
	));

	/**
	 * SETS UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN.
	 */
	if ( ! isset( $content_width ) ){
	    $content_width = 900;
	}
}
add_action( 'after_setup_theme', 'fullscreen_lite_theme_setup' ); 

/**
* Funtion to add CSS class to body
*/
function fullscreen_lite_body_class( $classes ) {

	if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && is_front_page() ) {
		$classes[] = 'front-page';
	}
	
	return $classes;
}
add_filter( 'body_class','fullscreen_lite_body_class' );

/**
 * Filter content with empty post title
 *
 */

add_filter('the_title', 'fullscreen_lite_untitled');
function fullscreen_lite_untitled($title) {
	if ($title == '') {
		return __('Untitled','fullscreen-lite');
	} else {
		return $title;
	}
}


/********************************************************
 INCLUDE REQUIRED FILE FOR THEME (PLEASE DON'T REMOVE IT)
*********************************************************/
/**
 * Add Customizer 
 */
require get_template_directory() . '/includes/customizer.php';
/**
 * Add Customizer 
 */
require_once(get_template_directory() . '/SketchBoard/functions/admin-init.php');



/**
 * Get Option.
 *
 * Helper function to return the option value.
 * If no value has been saved, it returns $default.
 *
 * @param     string    The option ID.
 * @param     string    The default option value.
 * @return    mixed
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'fullscreen_lite_get_option' ) ) {

  function fullscreen_lite_get_option( $option_id, $default = '' ) {
    
    /* get the saved options */ 
    $options = get_option( 'fullscreen_lite_option_tree' );
    

    /* look for the saved value */
    if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {

      return fullscreen_lite_wpml_filter( $options, $option_id );
      
    }
    
    return $default;
    
  }
  
}


//---------------------------------------------------------------------
//---------------------------------------------------------------------
/* Theme Recommended Plugins
/*---------------------------------------------------------------------------*/
if ( !defined( 'FULLSCREEN_REQUIRED_PLUGINS' ) ) {
	define( 'FULLSCREEN_REQUIRED_PLUGINS', trailingslashit(get_theme_root()) . 'fullscreen-lite/includes/plugins' );
}
include_once('includes/skt-required-plugins.php');
//---------------------------------------------------------------------
/* Upshell Pro Theme
/*---------------------------------------------------------------------------*/
require_once( trailingslashit( get_template_directory() ) . 'sketchthemes-upsell/class-customize.php' );

?>