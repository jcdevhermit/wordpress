<!-- Search -->
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
	<input class="search-input" type="search" value="<?php echo get_search_query(); ?>"  name="s" placeholder="<?php esc_attr_e( 'Enter search term here', 'caveat' ); ?>">
	<button class="search-submit btn" type="submit" role="button"><?php esc_html_e( 'Search', 'caveat' ); ?></button>
</form>
