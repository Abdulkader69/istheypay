<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Is_They_Pay
 */
?>

		<footer id="main-footer">
			<div class="pay-main-footer">
				<div class="container">
					<div class="row">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
							<div class="col-md-4">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
							<div class="col-md-4">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
							<div class="col-md-4">
								<?php dynamic_sidebar( 'footer-3' ); ?>
								<div class="pay-widget footer-social-newsletter">
									<?php if( get_field('footer_social_icons_toggle_button', 'option') ) : ?>
										<div class="footer-social-wrap">
											<?php if( get_field('facebook', 'option') ) : ?><a target="_blank" href="<?php the_field('facebook', 'option') ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/facebook.svg" alt=""></a><?php endif; ?>
											<?php if( get_field('twitter', 'option') ) : ?><a target="_blank" href="<?php the_field('twitter', 'option') ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/twitter.svg" alt=""></a><?php endif; ?>
											<?php if( get_field('linkedin', 'option') ) : ?><a target="_blank" href="<?php the_field('linkedin', 'option') ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/linkedin.svg" alt=""></a><?php endif; ?>
											<?php if( get_field('instagram', 'option') ) : ?><a target="_blank" href="<?php the_field('instagram', 'option') ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/instagram-logo.svg" alt=""></a><?php endif; ?>
											<?php if( get_field('youtube', 'option') ) : ?><a target="_blank" href="<?php the_field('youtube', 'option') ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/youtube.svg" alt=""></a><?php endif; ?>
										</div>
									<?php endif; ?>
									<?php echo do_shortcode( '[mc4wp_form id="127"]' ); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php if( get_field('footer_credit_text', 'option') ) : ?>
				<div class="pay-main-footer-bottom">
					<p><?php the_field('footer_credit_text', 'option') ?></p>
				</div>
			<?php endif; ?>
		</footer>
		<?php get_template_part( 'template-parts/components/reviews-form', 'popup' ); ?>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
