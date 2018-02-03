<?php
/**
 * caveat Theme Customizer.
 *
 * @package caveat
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function caveat_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'caveat_customize_partial_blogname',
		) );
	}

	/*
	=================================================
	General setting Customizer
	=================================================
	*/

	$wp_customize->add_section( 'basic_settings', array(
		'title'          => esc_html__( 'Basic Settings', 'caveat' ),
		'priority'       => 49,
	) );

	//Setting for blog layout
		$wp_customize->add_setting( 'caveat_blog_layout', array(
			'default' => 'blogright',
			'sanitize_callback' => 'caveat_sanitize_bloglayout',
		) );
	//Control for blog layout	
		$wp_customize->add_control( 'caveat_blog_layout', array(
			'label'   => esc_html__( 'Blog Layout', 'caveat' ),
			'section' => 'basic_settings',
			'priority' => 1,
			'type'    => 'radio',
				'choices' => array(
					'blogright' => esc_html__( 'Blog with Right Sidebar', 'caveat' ),
					'blogleft' => esc_html__( 'Blog with Left Sidebar', 'caveat' ),
					'blogwide' => esc_html__( 'Blog Full Width &amp; no Sidebars', 'caveat' ),
				),
		));

	/*    	
	=================================================
	Home Page Customizer
	=================================================
	*/

	$wp_customize->add_panel( 'homepage_setting_panel', array( // General Panel
	    'priority'       => 50,
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Home Page', 'caveat'),
	    'description'    => esc_html__('Changes the home page settings', 'caveat'),
	));

	/*HOME PAGE BANNER SETTING*/

	$wp_customize->add_section( 'home_page_banner' , array(
	    'title'       => esc_html__( 'Homepage Banner', 'caveat' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel',
	) );


	/*HOME PAGE portfolio SETTING*/
	 $wp_customize->add_setting( 'homepage_heading_dropdown_page', array(
		'sanitize_callback' => 'caveat_sanitize_page_dropdown',
	) );

	$wp_customize->add_control( 'homepage_heading_dropdown_page', array(
		'label'    => esc_html__( 'Banner Heading', 'caveat' ),
		'description'    => esc_html__('Select the page to display in home page banner', 'caveat'),
		'section'  => 'home_page_banner',
		'type'     => 'dropdown-pages',
		'priority' => 1,
	) );

	//bottom right column text
	 $wp_customize->add_section( 'home_page_portfolio' , array(
	    'title'       => esc_html__( 'Homepage Portfolio', 'caveat' ),
	    'priority'    => 2,
	    'panel' => 'homepage_setting_panel'
	) );


	 $wp_customize->add_setting( 
		'hide_portfolio', 
		array(
			'sanitize_callback' => 'caveat_sanitize_checkbox',	
			)
	);
	$wp_customize->add_control( 'hide_portfolio', array(
		'label'    => esc_html__( 'Hide portfolio section', 'caveat' ),
		'section'  => 'home_page_portfolio',
		'type'     => 'checkbox',
		'priority' => 1,
	) );
	//portfolio main heding
	$wp_customize->add_setting( 
		'portfolio_main_heading', 
		array(
			'sanitize_callback' => 'caveat_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'portfolio_main_heading', array(
		'label'    => esc_html__( 'Portfolio Main Heading', 'caveat' ),
		'section'  => 'home_page_portfolio',
		'type'     => 'text',
		'priority' => 2,
	) );

	//portfolio sub-main heding
	$wp_customize->add_setting( 
		'portfolio_sub_heading', 
		array(
			'sanitize_callback' => 'caveat_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'portfolio_sub_heading', array(
		'label'    => esc_html__( 'Portfolio Sub Heading', 'caveat' ),
		'section'  => 'home_page_portfolio',
		'type'     => 'textarea',
		'priority' => 3,
	) );

	$wp_customize->add_setting(
	    'homepage_portfolio_category',
	    array(
	        'sanitize_callback' => 'caveat_sanitize_dropdown_general',
	        )
	);

	$wp_customize->add_control( new Caveat_Category_Dropdown( $wp_customize, 'homepage_portfolio_category',
	    array(
	        'label' => esc_html__( 'Choose Portfolio Category', 'caveat' ),
	        'section' => 'home_page_portfolio',
	        'description' => esc_html__(' Select Category to show posts in portfolio section) ','caveat'),
	        'type' => 'select',
	        'priority' => 3,
	    )
	) ); 

	/*HOME PAGE blog post SETTING*/
	$wp_customize->add_section( 'home_page_blog' , array(
	    'title'       => esc_html__( 'Homepage Blog', 'caveat' ),
	    'priority'    => 2,
	    'panel' => 'homepage_setting_panel'
	) );

	//bottom right column text
	 $wp_customize->add_setting( 
		'hide_blog', 
		array(
			'sanitize_callback' => 'caveat_sanitize_checkbox',	
			)
	);
	$wp_customize->add_control( 'hide_blog', array(
		'label'    => esc_html__( 'Hide blog section', 'caveat' ),
		'section'  => 'home_page_blog',
		'type'     => 'checkbox',
		'priority' => 1,
	) );
	//blog main heding
	$wp_customize->add_setting( 
		'blog_main_heading', 
		array(
			'sanitize_callback' => 'caveat_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'blog_main_heading', array(
		'label'    => esc_html__( 'Blog Main Heading', 'caveat' ),
		'section'  => 'home_page_blog',
		'type'     => 'text',
		'priority' => 2,
	) );

	//blog sub-main heding
	$wp_customize->add_setting( 
		'blog_sub_heading', 
		array(
			'sanitize_callback' => 'caveat_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'blog_sub_heading', array(
		'label'    => esc_html__( 'Blog Sub Heading', 'caveat' ),
		'section'  => 'home_page_blog',
		'type'     => 'textarea',
		'priority' => 3,
	) );

	/*    	
	=================================================
	Footer setting customizer
	=================================================
	*/	
	$wp_customize->add_panel( 'caveat_footersetting', array( // General Panel
	    'priority'       => 51,
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Footer Setting', 'caveat'),
	    'description'    => esc_html__('Changes the home page settings', 'caveat'),
	));

	//foter basic setting
	$wp_customize->add_section( 'caveat_footerbasicsetting' , array(
	    'title'       => esc_html__( 'Basic setting', 'caveat' ),
	    'priority'    => 1,
	    'panel'		=> 'caveat_footersetting',
	) );

	//copyright text
	$wp_customize->add_setting( 'caveat_copyright', array(
		'sanitize_callback' => 'caveat_sanitize_text',
	) );

	$wp_customize->add_control( 'caveat_copyright', array(
		'label'    => esc_html__( 'Copyright Text', 'caveat' ),
		'section'  => 'caveat_footerbasicsetting',
		'type'     => 'textarea',
		'priority' => 1,
	) );

	//Hide copyright section
	$wp_customize->add_setting( 'caveat_hide_copyright', array(
		'sanitize_callback' => 'caveat_sanitize_url',
	) );

	$wp_customize->add_control( 'caveat_hide_copyright', array(
		'label'    => esc_html__( 'Hide Copyright Section', 'caveat' ),
		'section'  => 'caveat_footerbasicsetting',
		'type'     => 'checkbox',
		'priority' => 3,
	) );

	//socila links section
	$wp_customize->add_section( 'caveat_sociallinks' , array(
	    'title'       => esc_html__( 'Social Links', 'caveat' ),
	    'priority'    => 3,
	    'panel'		=> 'caveat_footersetting',
	) );

	//twitter url
	$wp_customize->add_setting( 'caveat_twiturl', array(
		'sanitize_callback' => 'caveat_sanitize_url',
	) );

	$wp_customize->add_control( 'caveat_twiturl', array(
		'label'    => esc_html__( 'Twitter Link', 'caveat' ),
		'description' => esc_html__( 'Enter the full URL to your Twitter profile', 'caveat' ),
		'section'  => 'caveat_sociallinks',
		'type'     => 'text',
		'priority' => 1,
	) );

	//facbook url
	$wp_customize->add_setting( 'caveat_fburl', array(
		'sanitize_callback' => 'caveat_sanitize_url',
	) );

	$wp_customize->add_control( 'caveat_fburl', array(
		'label'    => esc_html__( 'Facebook Link', 'caveat' ),
		'description' => esc_html__( 'Enter the full URL to your Facebook page, group, or profile', 'caveat' ),
		'section'  => 'caveat_sociallinks',
		'type'     => 'text',
		'priority' => 2,
	) );

	//header background color setting on section:colors
	$wp_customize->add_setting( 'caveat_headerbg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'caveat_headerbg', array(
		'default' => '#232932',
		'label'    => esc_html__( 'Header Background', 'caveat' ),
		'section'  => 'colors',
		'priority'=> 1,
	) ) );

	$wp_customize->add_setting( 'caveat_accentcolor', array(
		'default'        => esc_html__( '#19a9e5', 'caveat' ),
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'caveat_accentcolor', array(
		'label'    => esc_html__( ' Link And Accent Color', 'caveat' ),
		'section'  => 'colors',
		'description' => esc_html__( 'This changes both the link and accent color used in the theme.', 'caveat' ),
		'priority'=> 2,
	) ) ); 

/*	=================================================
	Extras setting customizer
	=================================================
	*/	
	$wp_customize->add_panel( 'caveat_extras', array( // General Panel
	    'priority'       => 51,
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Extra Setting', 'caveat'),
	    'description'    => esc_html__('Change for extra settings', 'caveat'),
	));

	//move to top basic setting
	$wp_customize->add_section( 'caveat_moveto_top' , array(
	    'title'       => esc_html__( 'Move to top', 'caveat' ),
	    'priority'    => 1,
	    'panel'		=> 'caveat_extras',
	) );

	$wp_customize->add_setting( 
		'hide_move_to_top', 
		array(
			'sanitize_callback' => 'caveat_sanitize_checkbox',	
			)
	);
	$wp_customize->add_control( 'hide_move_to_top', array(
		'label'    => esc_html__( 'Hide move to top', 'caveat' ),
		'section'  => 'caveat_moveto_top',
		'type'     => 'checkbox',
		'priority' => 1,
	) );
	

} //end of caveat_customize_register customizer 
add_action( 'customize_register', 'caveat_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function caveat_customize_preview_js() {
	wp_enqueue_script( 'caveat_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'caveat_customize_preview_js' );

/**
 * Render the site title for the selective refresh partial.
 *
 *
 * @return void
 */
function caveat_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * adds sanitization callback function : checkbox
 * @package caveat 
*/
function caveat_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
	    return 1;
	} else {
	    return '';
	}
}

/**
 * adds sanitization callback function : URL
 * @package caveat 
 * @version 1.0
*/
function caveat_sanitize_url( $value ) {
	$value = esc_url_raw( $value );
	return $value;
}

/**
 * adds sanitization callback function : TEXT
 * @package caveat 
 * @version 1.0
*/
function caveat_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
/**
 * Sanitize radio checkbox
 * @since caveat 1.0
 * @see caveat_sanitize_bloglayout()
 * @return sanitiize data
 */
function caveat_sanitize_bloglayout( $input ) {
	$valid = array(
			'blogright' => esc_html__( 'Blog with Right Sidebar', 'caveat' ),
			'blogleft' => esc_html__( 'Blog with Left Sidebar', 'caveat' ),
			'blogwide' => esc_html__( 'Blog Full Width &amp; no Sidebars', 'caveat' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
	return $input;
	} else {
	return '';
	}
}

/**
 * Sanitizes page/post in home banner
 * @param  $input entered value
 * @return sanitized output
 *
 * @since caveat 1.0.1
 */
function caveat_sanitize_page_dropdown( $input ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $input );
	// If $page_id is an ID of a published page, return it; otherwise, return false
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : false );
}

//General dropdown sanitize for integer value
    function caveat_sanitize_dropdown_general( $input ) {
        return absint( $input );
    }