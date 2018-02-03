<?php
/**
 * The sidebar contains the page left sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package caveat
 */ 
?>

<aside id="sidebar" class="page-left-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if( ! is_active_sidebar( 'sidebar-page-left' ) ) :
		return;
	else :
		dynamic_sidebar( 'sidebar-page-left' );
	endif; ?>

</aside>