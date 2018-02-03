<?php
/**
 * The sidebar contains the blog left sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package caveat
 */ 
?>

<aside id="sidebar" class="blog-left-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if( ! is_active_sidebar( 'sidebar-blog-left' ) ) :
		return;
	else :
		dynamic_sidebar( 'sidebar-blog-left' );
	endif; ?>

</aside>