
<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<?php if ( get_theme_mod( 'hide_portfolio' ) == '' ) : ?>

	<!--Portfolio Posts-->
	<section id="portfolio">
		<div class="wrap">

		<?php if ( get_theme_mod( 'portfolio_main_heading' ) ) : ?>

			<div class="heading">
				<h1><?php echo  esc_html( get_theme_mod( 'portfolio_main_heading' ) ); ?></h1>
			</div>

		<?php endif; ?>

		<?php if ( get_theme_mod( 'portfolio_sub_heading' ) ) : ?>

			<h2 class="subhead"><?php echo  esc_html( get_theme_mod( 'portfolio_sub_heading' ) ); ?></h2>
			
		<?php endif; ?>

		<?php $caveat_portfolio_id = get_theme_mod( 'homepage_portfolio_category' ); ?>
			<?php
				$loop = new WP_Query( array( 
					'cat' => absint( $caveat_portfolio_id ) , 
					'posts_per_page' => 3 
				) );
				$count = 1;
			?>

			<div class="clearfix">

				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<!-- Article -->
					<article class="post<?php if( $count %3 == 0 ) { echo esc_attr(' last'); }; $count ++; ?>" itemscope="itemscope" itemtype="http://schema.org/CreativeWork" itemprop="associatedArticle">

						<?php if ( has_post_thumbnail() ) : ?>

							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<?php the_post_thumbnail( 'caveat-s' ); ?>
								<div class="overlay"></div>
								<span><?php the_title(); ?></span>
							</a>

						<?php endif; ?>

					</article>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			</div>

			<?php ?>

		</div>
	</section>

<?php endif; ?>


<?php if ( get_theme_mod( 'hide_blog' ) == '' ) : ?>

	<!--Blog-->
	<section id="blog">
		<div class="wrap clearfix">
		
			<?php if ( get_theme_mod( 'blog_main_heading' ) ) : ?>

				<div class="heading">
					<h1><?php echo esc_html( get_theme_mod( 'blog_main_heading' ) ); ?></h1>
				</div>

			<?php endif; ?>
			
			<?php if ( get_theme_mod( 'blog_sub_heading' ) ) : ?>

				<h2 class="subhead"><?php echo esc_html( get_theme_mod( 'blog_sub_heading' ) ); ?></h2>

			<?php endif; ?>
			
			<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 6,
					'tax_query' => array( 
						array(
							'taxonomy' => 'post_format',
							'field' => 'slug',
							'terms' => 'post-format-link',
							'operator' => 'NOT IN',
						)
					)
				);

				$loop = new WP_Query( $args );
				$count = 1;
			?>

			<div class="clearfix">

				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<!-- Article -->
					<article class="post<?php if ( $count %3 == 0 ) { esc_html_e( ' last', 'caveat' ); } ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
						<i class="fa fa-file-text-o"></i>
						<h2 class="entry-title" itemprop="headline">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2>
						<?php the_excerpt(); ?>
						<p class="entry-meta">
							<i class="fa fa-comments-o"></i>
							<?php comments_popup_link( __( '0 Comments', 'caveat' ), __( '1 Comment', 'caveat' ), __( '% Comments', 'caveat' ) ); ?>
						</p>
					</article>

				<?php if ( $count %3 == 0 ) : ?>
					<div class="clearfix"></div>
				<?php endif; ?>

				<?php $count ++; ?>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			</div>

		</div>
	</section>

<?php endif; ?>

<?php get_footer();