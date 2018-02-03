<?php 
/**
 * The template for displaying all single pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package caveat
 */

get_header();

get_template_part( 'header', 'meta' ); ?>

	<div class="wrap clearfix">


		<main id="content" role="main" itemprop="mainContentOfPage">

			<?php while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>

					<?php wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) ); ?>

				</article>

			<?php endwhile; ?>
		
		</main>

		<!--Sidebar-->
		<?php get_sidebar(); ?>

	</div>
			
<?php get_footer();
