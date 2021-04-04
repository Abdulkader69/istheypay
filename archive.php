<?php
/**
 * The template for displaying archive pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
							<h1 class="page-title"><?php the_archive_title(); ?></h1>
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
							<?php 
							$tax = get_queried_object();
							$tax_slug = $tax->slug;
							
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

							$args = array(
								'post_type'      => 'networks',
								'posts_per_page' => 5,
								'order'          => 'DESC',
								'post_status'    => 'publish',
								'paged'          => $paged,
								'tax_query' => array(
									array(
										'taxonomy' => 'network_category',
										'field'    => 'slug',
										'terms'    => $tax_slug,
									),
								),
							);
						
							//ob_start();
							?>
						
							<?php $archive_tax = new WP_Query( $args );

							if ( $archive_tax->have_posts() ) :
								while ( $archive_tax->have_posts() ) : $archive_tax->the_post(); 
									get_template_part( 'template-parts/components/networks', 'item' );
								endwhile; ?>
								<div class="pagination-wrap">
									<?php
									$big = 999999999; // need an unlikely integer
									echo paginate_links( array(
										'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format'    => '/paged/%#%',
										'current'   => max( 1, $paged ),
										'total'     => $archive_tax->max_num_pages,
										'prev_text' => '<',
										'next_text' => '>',
										'type'      => 'list',
										'mid_size'  => 2,
										'end_size'  => 1
									) );
									?>
								</div>
							<?php else: ?>
								<p class="no-post">No Networks Found!</p>
							<?php 
							endif; 
							// wp_reset_postdata();
							// return ob_get_clean();
							?>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
