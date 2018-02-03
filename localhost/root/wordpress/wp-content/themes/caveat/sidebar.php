<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package caveat
 */

if( is_active_sidebar( 'sidebar-page' ) || is_active_sidebar( 'sidebar-blog' ) ) : ?>

	<aside id="sidebar" class="widget-area blog-right-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php if ( caveat_is_blog() ) :

			dynamic_sidebar( 'sidebar-blog' ); 
		else :

			dynamic_sidebar( 'sidebar-page' ); 

		endif; ?>
	</aside>
<?php endif;