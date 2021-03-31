<?php
/**
 * The sidebar containing the main widget area
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Is_They_Pay
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php if ( get_field( 'enable_disable_sidebar', 'option' ) ): ?>

	<div class="pay-right">
		<div class="pay-sidebar-wrap">

			<?php get_template_part( 'template-parts/components/search', 'form' ); ?>

			<?php
			$network_of_month = get_field('network_of_the_month', 'option');
			if( $network_of_month ): ?>
				<div class="pay-network-of-the-month-wrap pay-sidebar-item">
					<h2 class="title">Network of The Month</h2>
					<div class="pay-network-month-content">
						<div class="thumbnail">
							<img src="<?php echo get_the_post_thumbnail_url( $network_of_month->ID, 'full' ); ?>" alt="<?php $network_of_month->post_title; ?>">
						</div>
						<?php 
							$network = new Network();
							$reviews = $network->get_all_reviews( $network_of_month->ID );
							// echo '<pre>';
							// print_r( $reviews );
							// echo '</pre>';
						?>
						<div class="nm-review-slide-wrap owl-carousel">
							<?php foreach ($reviews->posts as $review) : ?>
								<div class="nm-review-slide-item">
									<a href="<?php the_permalink( $network_of_month->ID ) ?>">
										<div class="top-info">
											<?php $rating = get_field( 'overall_rating', $review->ID );
											if( !$rating == '') { ?>
												<p class="rating rat<?php echo $rating; ?>">
													<span><i class="icofont-star"></i></span>
													<span><i class="icofont-star"></i></span>
													<span><i class="icofont-star"></i></span>
													<span><i class="icofont-star"></i></span>
													<span><i class="icofont-star"></i></span>
												</p>
											<?php } ?>
											<p><?php the_field( 'name', $review->ID ); ?></p>
										</div>
										<?php $your_review = get_field( 'your_review', $review->ID );
										if( !$your_review == '') { ?>
											<div class="review-coment">
												<p><?php echo $your_review; ?></p>
											</div>
										<?php } ?>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php
			if( have_rows('sidebar_smalls_ads', 'option') ):?>
				<?php while( have_rows('sidebar_smalls_ads', 'option') ) : the_row(); ?>
					<div class="pay-sidebar-smalls-ads-wrap pay-sidebar-item">
						<?php
						if( have_rows('sidebar_small_ads_repeater', 'option') ):?>
							<ul>
							<?php while( have_rows('sidebar_small_ads_repeater', 'option') ) : the_row(); ?>
								<li>
									<a target="_blank" href="<?php the_sub_field('ads_url', 'option') ?>"><img src="<?php the_sub_field('ads_images', 'option') ?>" alt=""></a>
								</li>
							<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php get_template_part( 'template-parts/components/featured-networks', 'sidebar' ); ?>

			<div class="newsletter-form-wrap pay-sidebar-item">
				<?php echo do_shortcode( '[mc4wp_form id="127"]' ); ?>
			</div>

			<?php
			if( have_rows('sidebar_big_ads_1', 'option') ):?>
				<div class="pay-sidebar-big-ads pay-sidebar-item">
				<?php while( have_rows('sidebar_big_ads_1', 'option') ) : the_row(); ?>
					<a href="<?php the_sub_field('ad_url', 'option') ?>"><img src="<?php the_sub_field('ad_images', 'option') ?>" alt=""></a>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php echo do_shortcode( '[pay_review_sidebar_shortcodes]' ); ?>

			<?php
			if( have_rows('sidebar_big_ads_2', 'option') ):?>
				<div class="pay-sidebar-big-ads pay-sidebar-item">
				<?php while( have_rows('sidebar_big_ads_2', 'option') ) : the_row(); ?>
					<a href="<?php the_sub_field('ad_url', 'option') ?>"><img src="<?php the_sub_field('ad_images', 'option') ?>" alt=""></a>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php get_template_part( 'template-parts/components/top-rated', 'networks' ); ?>
			
		</div>
		<!-- <aside id="secondary" class="widget-area">
			<?php //dynamic_sidebar( 'sidebar-1' ); ?>
		</aside> -->
	</div>

<?php else: ?>
	
<?php endif; ?>