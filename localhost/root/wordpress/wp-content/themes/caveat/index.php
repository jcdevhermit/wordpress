<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package caveat
 */

get_header();

get_template_part( 'header', 'meta' );
$blog_layout = get_theme_mod( 'caveat_blog_layout', 'blogright' );
switch ( $blog_layout ) {
	case 'blogright': ?>
		<div class="wrap clearfix" id="blog-right-sidbear">

			<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<!-- Article -->
					<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
						<?php get_template_part( 'content' );?>
					</article>

				<?php endwhile; ?>

					<?php if ( $wp_query->max_num_pages > 1 ) : ?>

						<!--Pagination-->
						<div class="pagination">

							<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>

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

				<?php endif; ?>
			
			</main>
			<!--Sidebar-->
			<?php get_sidebar(); ?>
		</div>
		
	<?php break;
	case 'blogleft': ?>
		<div class="wrap clearfix" id="blog-left-sidbear">
			<!--Sidebar-->
			<?php get_sidebar( 'blog-left' ); ?>

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

							<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>

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

				<?php endif; ?>
			
			</main>
			
		</div>
	<?php break;
	case 'blogwide': ?>
		<div class="wrap clearfix" id="blog-full-width">

			<main id="content" role="main" class="full-width" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

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

							<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>

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
				<?php endif; ?>
			</main>
		</div>
<?php 
	break;
	default: ?>
		<div class="wrap clearfix" id="blog-right-sidbear">

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

							<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>

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

				<?php endif; ?>
			
			</main>
			<!--Sidebar-->
			<?php get_sidebar(); ?>
	</div>
		
	<?php break;
}
get_footer();
