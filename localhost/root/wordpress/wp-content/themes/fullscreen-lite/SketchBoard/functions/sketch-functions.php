<?php
/***************** EXCERPT LENGTH ************/
function fullscreen_lite_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'fullscreen_lite_excerpt_length');

/***************** READ MORE ****************/
function fullscreen_lite_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'fullscreen_lite_excerpt_more');

add_filter('body_class','fullscreen_lite_class_name');
function fullscreen_lite_class_name($classes) {
	$classes[] = 'fullscreen-lite';
	return $classes;
}