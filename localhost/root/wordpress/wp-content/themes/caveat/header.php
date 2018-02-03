<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package caveat
 */
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		<!-- Meta -->
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- Title -->
						
		<!-- RSS & Pingbacks -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<!-- Hooks -->
		<?php wp_head(); ?> 
	</head>
	
	<body <?php body_class( 'fadeDown' ); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	
	    <header id="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader" >

			<?php if( is_404() || is_search() ):
			elseif ( caveat_is_blog() ) :
		
				$blogpage = get_option( 'page_for_posts' );
				if( $blogpage ) :
					
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( absint( $blogpage ) ), 'full' );
			    	if ( $thumb == true ) { ?>

			    		<div class="masthead" style="background-image: url('<?php echo esc_url( $thumb['0'] ); ?>');"></div>
			    	<?php }
			    		
			  	endif; 
			else :
				if ( ! is_post_type_archive( 'product') ) {
					$pagebg = get_queried_object();
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( absint( $pagebg->ID ) ), 'full', '' ); ?>
			
				    <?php if ( $thumb == true ) : ?>
				    	<div class="masthead" style="background-image: url('<?php echo esc_url( $thumb['0'] ); ?>');"></div>
				    <?php endif;
			    }
			endif; ?>

		    <div class="wrap clearfix">

			    <section id="header-top" class="clearfix">
					        
				    <!-- Logo -->
					<div class="logo site-branding" itemprop="headline">
						<?php caveat_the_custom_logo(); ?>

						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					</div>

				    <!-- Navigation -->
				    <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

						<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
						
						    <?php
							    wp_nav_menu(
								    array(
									    'theme_location' => 'header-menu',
									    'container'      => false,
									    'menu_id'        => 'nav',
									    'menu_class'     => 'header-menu',
									    'depth'          => '4',
								    )
							    );
						    ?>
						
						<?php else : ?>
						
						<ul id="nav">
							<?php wp_list_pages( 'title_li=&depth=1' ); ?>
						</ul>
						
						<?php endif; ?>

					</nav>

				</section>

				<?php if ( is_front_page() ) : ?>
					<?php
					$caveat_banner_page_id = get_theme_mod( 'homepage_heading_dropdown_page' );
					if ( $caveat_banner_page_id != '' ) : ?>
						<section id="header-meta" class="clearfix">
								<h1><?php echo get_the_title( absint( $caveat_banner_page_id ) ); ?></h1>
								<h2><?php echo get_the_excerpt( absint( $caveat_banner_page_id ) ); ?></h2>
								<a href="<?php echo esc_url( get_permalink( absint( $caveat_banner_page_id )  ) ); ?>" class="btn"><?php esc_html_e( 'Read More', 'caveat' ); ?></a>					
						</section>
					<?php endif; ?>
				<?php endif; ?>
			</div>
	</header>
