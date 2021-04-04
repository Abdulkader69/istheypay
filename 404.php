<?php
/**
 * The template for displaying 404 pages (not found)
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package Is_They_Pay
 */

get_header();
?>

	<main id="main-content">

		<div class="container">
			<div class="row">
				<div class="col-lg-12 pay-main-content-wrapper">
					<div class="pay-left">
						<?php get_template_part( 'template-parts/components/page-top', 'section' ); ?>
						<div class="page-top-with-ad">
							<?php
							if( have_rows('pages_global_ad', 'option') ):?>
								<?php while( have_rows('pages_global_ad', 'option') ) : the_row();
									$ad_image = get_sub_field( 'ad_image', 'option' );
									if ( $ad_image != '' ) : ?>
										<div class="page-ad-wrap">
											<a href="<?php the_sub_field('ad_link', 'option') ?>"><img src="<?php echo $ad_image; ?>" alt=""></a>
										</div>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
						<div class="page-content">
							<div class="page_404">
								<div class="four_zero_four_bg">
									<h1 class="text-center ">404</h1>
								</div>
								<div class="contant_box_404">
									<h3 class="h2"> Look like you're lost</h3>
									<p>the page you are looking for not avaible!</p>
									<a href="/" class="link_404">Go to Home</a>
								</div>
							</div>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
