<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
*/
?>

<div class="clearfix"></div>
</div>
<!-- #main --> 

<!-- #footer -->
<div id="footer" class="skt-section">
	<div class="container">
		<div class="row-fluid">
				<!-- Social Links Section -->
				<div class="social_icon">
					<ul class="clearfix">
						<?php if( get_theme_mod('fullscreen_lite_fbook_link', '') != '' ) { ?><li class="fb-icon"><a target="_blank" href="<?php echo esc_url( get_theme_mod('fullscreen_lite_fbook_link') ); ?>"><span class="fa fa-facebook" title="Facebook"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_twitter_link', '') != '' ){?><li class="tw-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_twitter_link') ); ?>"><span class="fa fa-twitter" title="Twitter"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_pinterest_link', '') != '' ){ ?><li class="pinterest-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_pinterest_link') ); ?>"><span class="fa fa-pinterest" title="Pinterest"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_dribbble_link', '') != '' ){ ?><li class="dribbble-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_dribbble_link') ); ?>"><span class="fa fa-dribbble" title="dribbble"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_tumblr_link', '') != ''){ ?><li class="tumblr-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_tumblr_link') ); ?>"><span class="fa fa-tumblr" title="tumblr"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_linkedin_link', '') != ''){ ?><li class="linkedin-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_linkedin_link') ); ?>"><span class="fa fa-linkedin" title="linkedin"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_vk_link', '') != ''){ ?><li class="vk-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_vk_link') ); ?>"><span class="fa fa-vk" title="vk"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_skype_link', '') != ''){ ?><li class="skype-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_skype_link') ); ?>"><span class="fa fa-skype" title="skype"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_instagram_link', '') != ''){ ?><li class="instagram-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_instagram_link') ); ?>"><span class="fa fa-instagram" title="instagram"></span></a></li><?php } ?>

						<?php if(get_theme_mod('fullscreen_lite_vimeo_link', '') != ''){ ?><li class="vimeo-icon"><a target="_blank" href="<?php echo esc_url(get_theme_mod('fullscreen_lite_vimeo_link') ); ?>"><span class="fa fa-vimeo" title="vimeo"></span></a></li><?php } ?>
					</ul>
				</div>
				<!-- Social Links Section -->
				<div class="clearfix"></div>
		</div>
	</div>

	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">
				<div class="copyright span6 alpha omega"> <?php echo wp_kses_post( get_theme_mod('fullscreen_lite_copyright', 'Proudly Powered by WordPress') ); ?> </div>
				<div class="owner span6 alpha omega"><?php printf( __( 'Fullscreen Theme By %s', 'fullscreen-lite' ), '<a href="'.esc_url('https://sketchthemes.com').'"><strong>SketchThemes</strong></a>');?>
                </div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper --> 
</div>
<!-- #footer -->

</div>
<!-- #wrapper -->
	<a href="JavaScript:void(0);" title="<?php _e('Back To Top','fullscreen-lite')?>" id="backtop"></a>
	<?php wp_footer(); ?>
</body>
</html>