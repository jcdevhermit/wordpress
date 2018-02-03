<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package caveat
 */

get_header(); ?>

<?php get_template_part( 'header', 'meta' ); ?>
	<div class="wrap clearfix">
		<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
				<?php
					//the_archive_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
	               // the_archive_description( '<div class="taxonomy-description">', '</div>' ); 
	            ?>
			</header>

			<?php if ( is_author( $author ) ) : ?>

				<!-- Author -->
				<section class="author-bio clearfix" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
					<?php echo get_avatar( get_the_author_meta( 'email' ), '90', get_the_author() ); ?>
					<h1 class="author-name" itemprop="name">
						<?php the_author_posts_link(); ?>
					</h1>
					<p class="author-description" itemprop="description">
						<?php the_author_meta( 'description' ); ?>
					</p>
				</section>


			<?php endif; ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

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
			
<?php get_footer();
