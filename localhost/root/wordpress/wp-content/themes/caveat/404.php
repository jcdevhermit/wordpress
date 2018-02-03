<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package caveat
 */

get_header();

get_template_part( 'header', 'meta' ); ?>

	<div class="wrap clearfix">

		<main id="content" class="full-width" role="main" itemprop="mainContentOfPage">

				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

					<header class="entry-header">
						<h1 class="entry-title" itemprop="headline"><span class="big"><?php esc_html_e( '404' ,'caveat' ); ?></span><?php esc_html_e( 'Page Not Found', 'caveat' ); ?></h1>
					</header>

					<div class="entry-content" itemprop="text">
						<p><?php esc_html_e( 'Well, this is embarrassing. We can\'t seem to locate the page you\'re looking for.', 'caveat' ); ?> <br>
						<?php esc_html_e( 'Bad link? Mistyped address? We\'re not exactly sure.', 'caveat' ); ?>
						<br/><br/>
						<?php esc_html_e( 'You can always search for the page below.', 'caveat' ); ?>
						</p>
						<?php get_search_form(); ?>
					</div>
				</article>

		</main>

	</div>
			
<?php get_footer();
