<?php
/**
 * The template for displaying search results pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
							<h1 class="page-title">
								<?php
									printf( esc_html__( 'Search Results for: %s', 'is-they-pay' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
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
						
						<div class="pay-networks-row">
							<?php if ( have_posts() ) : ?>

								<?php
								while ( have_posts() ) : the_post();
									if(isset($_GET['post_type'])) {
										$type = $_GET['post_type'];
										if($type == 'networks') {
							
												get_template_part( 'template-parts/components/networks', 'item' );
									
											} else { ?>
									
											<?php } ?>
										<?php } else { ?>
									
									<?php } 

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									// get_template_part( 'template-parts/content', 'search' );

								endwhile;

								the_posts_navigation();

							else : ?>

								<p class="no-post">No Networks Found!</p>

							<?php endif; ?>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
