<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Is_They_Pay
 */
get_header();
?>

	<main id="main-content">

		<div class="container">
			<div class="row">
				<?php 
				$text = get_the_title();
				$text = preg_replace('~[^\pL\d]+~u', '-', $text);
				$text = strtolower($text);
				?>
				<div class="col-lg-12 pay-main-content-wrapper <?php echo $text; ?>">
					<div class="pay-left">
						<?php get_template_part( 'template-parts/components/page-top', 'section' ); ?>
						<div class="page-top-with-ad">
							<h1 class="page-title"><?php the_title(); ?></h1>
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
							<?php the_content(); ?>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
