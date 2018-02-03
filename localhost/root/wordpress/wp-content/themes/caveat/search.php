<?php get_header();

get_template_part( 'header', 'meta' ); ?>

	<div class="all-content wrap clearfix">

		<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

					<?php 
						get_template_part( 'content' );
					?>

				</article>

			<?php endwhile; ?>

				<?php if ( $wp_query->max_num_pages > 1 ) : ?>

					<!--Pagination-->
					<div class="pagination">

						<?php if( function_exists( 'wp_pagenavi' ) ) : ?>

							<?php wp_pagenavi(); ?>

						<?php else : ?>

							<?php 
							the_posts_navigation( array(
                                'prev_text' => '<span>&larr;</span> ' . esc_html__( 'Older Posts', 'caveat' ) .'',
                                'next_text' => esc_html__( 'Newer Posts', 'caveat' ).' <span>&rarr;</span>'
                            ) );
                            ?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			<?php else : ?>

				<?php esc_html_e( 'Your search did not match any entries', 'caveat' ) ?>

			<?php endif; ?>
		
		</main>

		<!--Sidebar-->
		<aside id="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<?php dynamic_sidebar( 'sidebar-blog' ); ?>
		</aside>
	
	</div>
			
<?php get_footer();
