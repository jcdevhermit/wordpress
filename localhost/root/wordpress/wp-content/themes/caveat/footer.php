<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package caveat
 */
?>

<footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

	<div id="sub-footer">
		<div class="wrap clearfix">
											
		    <!-- Footer Navigation -->
		    <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

				<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
				
				    <?php
					    wp_nav_menu(
						    array(
							    'theme_location' => 'footer-menu',
							    'container'      => false,
							    'menu_id'        => 'nav',
							    'menu_class'     => 'footer-menu',
							    'depth'          => '4',
						    )
					    );
				    ?>				
				<?php endif; ?>

			</nav>					
		</div>
	</div>
	
	<div class="wrap clearfix">

	<?php if ( get_theme_mod( 'caveat_twiturl' ) || get_theme_mod( 'caveat_fburl' ) ) : ?>

		<!-- Social Media -->
		<div class="social-media">

		<?php if ( get_theme_mod( 'caveat_twiturl' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'caveat_twiturl' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i><?php esc_html_e( 'Follow us on Twitter', 'caveat' ); ?></a>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'caveat_fburl' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'caveat_fburl' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i><?php esc_html_e( 'Like us on Facebook', 'caveat' ); ?></a>
		<?php endif; ?>

		</div>

	<?php endif;
	if ( get_theme_mod( 'caveat_hide_copyright' ) == '' ) { ?>
		    <!-- Copyright -->
			<p class="copyright">
				<?php if ( get_theme_mod( 'caveat_copyright' ) ) : ?>
					<?php
					$caveat_footer_text = get_theme_mod( 'caveat_copyright' );
					     echo wp_kses( $caveat_footer_text, array(
					        'p' => array(),
					        'a' => array(
					                'href' => array(),
					                'class' => array(),
					            )
					    ) );
					?>
				<?php else :
					esc_html_e( 'Caveat WordPress Theme by', 'caveat' ); ?>
					<a href="<?php echo esc_url('http://styledthemes.com/'); ?>" target="_blank"><?php esc_html_e( 'StyledThemes', 'caveat' ); ?></a></span>
				<?php endif; ?>
			</p>

	<?php } ?>	

	</div>

	<?php if(get_theme_mod( 'hide_move_to_top' ) != '1' ){ ?>
		<div class="caveat_move_to_top"> 
			<i class="fa fa-arrow-up"></i>
		</div>		
	<?php }?>


</footer>


<?php wp_footer(); ?>
</body>
</html>
