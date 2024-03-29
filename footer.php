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
											<?php if( get_field('facebook', 'option') ) : ?><a target="_blank" href="<?php the_field('facebook', 'option') ?>"><i class="icofont-facebook"></i></a><?php endif; ?>
											<?php if( get_field('twitter', 'option') ) : ?><a target="_blank" href="<?php the_field('twitter', 'option') ?>"><i class="icofont-twitter"></i></a><?php endif; ?>
											<?php if( get_field('linkedin', 'option') ) : ?><a target="_blank" href="<?php the_field('linkedin', 'option') ?>"><i class="icofont-linkedin"></i></a><?php endif; ?>
											<?php if( get_field('instagram', 'option') ) : ?><a target="_blank" href="<?php the_field('instagram', 'option') ?>"><i class="icofont-instagram"></i></a><?php endif; ?>
											<?php if( get_field('youtube', 'option') ) : ?><a target="_blank" href="<?php the_field('youtube', 'option') ?>"><i class="icofont-youtube-play"></i></a><?php endif; ?>
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
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
