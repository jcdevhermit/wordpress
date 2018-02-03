<?php

/* ----------------------------------------------------------------

 TABLE OF CONTENTS
	 1. LOCALIZATION
	 2. CONTENT WIDTH
	 3. THEME SETUP
	 4. REGISTER SIDEBAR
	 5. ENQUEUE SCRIPTS
	 7. COMMENTS
	 8. MORE LINK
	10. POST FORMAT: GALLERY
	11. HAS POST THUMB CLASS
	12. CONTACT FORM
	13. INIT
	-----------------------------------------------------------------*/

/* ----------------------------------------------------------------
   1. LOCALIZATION
-----------------------------------------------------------------*/

function caveat_localization() {
	load_theme_textdomain( 'caveat', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'caveat_localization' );


/* ----------------------------------------------------------------
   2. CONTENT WIDTH
-----------------------------------------------------------------*/

function caveat_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'caveat_content_width', 920 );
}
add_action( 'after_setup_theme', 'caveat_content_width', 0 );

/* ----------------------------------------------------------------
   3. THEME SETUP
-----------------------------------------------------------------*/

if ( ! function_exists( 'caveat_theme_setup' ) ) {
	function caveat_theme_setup() {
		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'header-menu' => __( 'Header Menu', 'caveat' ),
			'footer-menu'  => __( 'Footer Links Menu', 'caveat' ),
		) );

		/* Configure WP 2.9+ thumbnails */
		add_theme_support( 'post-thumbnails' );
	    add_image_size( 'caveat-s', 300, 300, true );
	    add_image_size( 'caveat-m', 640, 300, true );
	    add_image_size( 'caveat-l', 980, 300, true );
		/*
		* Enable support for custom logo.
		*
		*  @since caveat 1.0
		*/

			add_theme_support( 'custom-logo',
				array(
				   'height'      => 240,
				   'width'       => 240,
				   'flex-width' => true,
				   'flex-height' => true,
			) );

		    add_theme_support( 'automatic-feed-links' );
		    add_post_type_support( 'page', 'excerpt' );
		    add_theme_support( 'title-tag' );
		    add_theme_support( 'woocommerce' );
	}
}
add_action( 'after_setup_theme', 'caveat_theme_setup' );


/* ----------------------------------------------------------------
   4. REGISTER SIDEBAR
-----------------------------------------------------------------*/
function caveat_register_sidebar() {

	//register blog sidebar
	register_sidebar( array(
		'name' => __( 'Blog Right Sidebar', 'caveat' ),
		'id' => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	//register blog left sidebar
	register_sidebar( array(
		'name' => __( 'Blog Left Sidebar', 'caveat' ),
		'id' => 'sidebar-blog-left',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	//register right sidebar
	register_sidebar( array(
		'name' => __( 'Page Right Sidebar', 'caveat' ),
		'id' => 'sidebar-page',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	//register page left sidebar
	register_sidebar( array(
		'name' => __( 'Page Left Sidebar', 'caveat' ),
		'id' => 'sidebar-page-left',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar(array(
			'name' => __( 'Shop Page Sidebar', 'caveat' ),
			'id' => 'sidebar-shop',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));
	}
}
add_action( 'widgets_init', 'caveat_register_sidebar' );

/* ----------------------------------------------------------------
   5. ENQUEUE SCRIPTS
-----------------------------------------------------------------*/

if ( ! function_exists( 'caveat_enqueue_scripts' ) ) {
	function caveat_enqueue_scripts() {
		$caveat_theme_ver = wp_get_theme()->get( 'Version' );
		/* Register */
		wp_register_script( 'jquery-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array( 'jquery' ), '1.0.7' );
		wp_register_script( 'caveat-custom-js', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '1.0', true );

		/* Enqueue */
		wp_enqueue_script( 'jquery-slicknav' );
		wp_enqueue_script( 'caveat-custom-js' );

		if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_style( 'caveat-googlefont-montserrat', '//fonts.googleapis.com/css?family=Montserrat:400,700' );
		wp_enqueue_style( 'caveat-main-style', get_stylesheet_uri(), false, $caveat_theme_ver );

		wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/css/slicknav.min.css', false, '1.0.7' );

		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.4.0' );
		wp_enqueue_style( 'caveat-responsive', get_template_directory_uri() . '/css/responsive.css', false, $caveat_theme_ver );

		$caveat_dynamic_accent = '';
		include get_template_directory().'/css/style.css.php';
		wp_add_inline_style( 'caveat-responsive', $caveat_dynamic_accent );

	}
}

add_action( 'wp_enqueue_scripts', 'caveat_enqueue_scripts' );

/* ----------------------------------------------------------------
   9. IS BLOG
   *@since version 1.0.7
-----------------------------------------------------------------*/

function caveat_is_blog() {

	global $post;
	$posttype = get_post_type( $post );
	return ( ( ( is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() ) || ( is_search() ) ) && ( $posttype == 'post' )  ) ? true : false;
}

/* ----------------------------------------------------------------
   7. COMMENTS
-----------------------------------------------------------------*/

if ( ! function_exists( 'caveat_comment' ) ) {

	function caveat_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment; ?>       
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		    <article class="clearfix" itemprop="comment" itemscope="itemscope" itemtype="http://schema.org/UserComments">
				<?php echo get_avatar( $comment, $size = '90' ); ?>
		        <div class="comment-author">
					<p class="vcard" itemprop="creator" itemscope="itemscope" itemtype="http://schema.org/Person">
						<cite class="fn" itemprop="name"><?php comment_author_link(); ?></cite>
						<time itemprop="commentTime" datetime="<?php comment_time( 'c' ); ?>">
							<?php comment_date( 'n.j.y' ); ?>
						</time>
			            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
			            <?php edit_comment_link( esc_html__( 'Edit', 'caveat' ), ' &middot; ', '' ) ?>
					</p>
		        </div>
				<div class="comment-content" itemprop="commentText">
		            <?php comment_text() ?>
		            <?php if ( $comment->comment_approved == '0' ) : ?>
		                <p><em class="awaiting"><?php esc_html_e( 'Your comment is awaiting moderation.', 'caveat' ) ?></em></p>
		            <?php endif; ?>
				</div>
		    </article>
		</li>

<?php }
}


/* ----------------------------------------------------------------
   8. MORE LINK
-----------------------------------------------------------------*/

function caveat_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, esc_html__( 'Continue Reading', 'caveat' ), $more_link );
}

add_filter( 'the_content_more_link', 'caveat_more_link', 10, 2 );


/* ----------------------------------------------------------------
   11. ADD .POST-THUMB CLASS TO POST IF HAS POST THUMB
-----------------------------------------------------------------*/

function caveat_has_post_thumb( $classes ) {
	global $post;
	if ( isset ( $post->ID ) && get_the_post_thumbnail( $post->ID ) ) {
		$classes[] = 'post-thumb';
	}
	return $classes;
}

add_filter( 'post_class', 'caveat_has_post_thumb' );



if ( ! function_exists( 'caveat_the_custom_logo' ) ) :
	/**
	 * Displays the optional custom logo.
	 *
	 * Does nothing if the custom logo is not available.
	 *
	 * @since caveat 1.0.0
	 */
	function caveat_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
endif;


/* ----------------------------------------------------------------
   14. INIT
-----------------------------------------------------------------*/
/*include category dropdown*/
require get_template_directory() . '/includes/category-dropdown.php';
/*include customizer*/
require get_template_directory() . '/includes/customizer.php';

/**
 * Load class for upsells links
 */
require get_template_directory(). '/caveat-upsells/caveat-pro-btn/class-customize.php';

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}
