<?php /* Header Meta */ ?>

	<section id="header-meta" class="clearfix">
	
		<div class="wrap clearfix">

			<?php if ( is_archive() ) : ?>
			
			<h1>
			<?php
				if ( is_category() ) {
					printf( __( 'Category: %s', 'caveat' ), single_cat_title( '', false ) );
				} elseif ( is_tag() ) {
				    printf( __( 'Tagged: %s', 'caveat' ), single_tag_title( '', false ) );
				} elseif ( is_author() ) {
					$curauth = get_queried_object();
					printf( __( 'Author: ', 'caveat' ));
					echo $curauth->display_name;
				} elseif ( is_day() ) {
				    printf( __( 'Day: %s', 'caveat' ), get_the_date() );
				} elseif ( is_month() ) {
				    printf( __( 'Month: %s', 'caveat' ), get_the_date( 'F Y' ) );
				} elseif ( is_year() ) {
				    printf( __( 'Year: %s', 'caveat' ), get_the_date( 'Y' ) );
				} else {
				    _e( 'Archives', 'caveat' );
				}
			?>
			</h1>
			
			<?php elseif ( is_search() ) : ?>
							
				<h1><?php _e( 'Search results for', 'caveat' ) ?>: '<?php the_search_query(); ?>'</h1>
					 
			<?php else : ?>
								
				<h1><?php single_post_title(); ?></h1>
			
				<?php if ( !is_archive() && !is_search() && !is_404() ) :
				
					$page_id = get_queried_object_id(); ?>
					<span><?php echo get_post_field( 'post_excerpt', $page_id, 'display' ); ?></span>
				
				<?php endif;?>
		
			<?php endif; ?>
		</div>

	</section>
