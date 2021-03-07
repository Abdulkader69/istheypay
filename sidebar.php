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
						<div class="nm-review-slide-wrap">
							<div class="nm-review-slide-item">
								<a href="<?php the_permalink( $network_of_month->ID ) ?>">
									<div class="top-info">
										<p class="rating">
											<span><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></span>
											<span><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></span>
											<span><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></span>
											<span><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></span>
											<span><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></span>
										</p>
										<p>Omer</p>
									</div>
									<div class="review-coment">
										<p>Really nice crypto cpa network. Nice offers and nice support. I recommend Algo-Affiliates.</p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			
			<div class="newsletter-form-wrap pay-sidebar-item">
				<?php echo do_shortcode( '[mc4wp_form id="127"]' ); ?>
			</div>

			<?php
			$sidebar_smalls_ads = get_field('sidebar_smalls_ads', 'option');
			if( $sidebar_smalls_ads ): ?>
				<div class="pay-sidebar-smalls-ads-wrap pay-sidebar-item">
					<?php
					if( have_rows('sidebar_small_ads_repeater', 'option') ):?>
						<ul>
						<?php while( have_rows('sidebar_small_ads_repeater', 'option') ) : the_row(); ?>
							<li>
								<a href="<?php the_sub_field('ads_images', 'option') ?>"><img src="<?php the_sub_field('ads_url', 'option') ?>" alt=""></a>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php get_template_part( 'template-parts/components/featured-networks', 'sidebar' ); ?>

			<?php
			if( have_rows('sidebar_big_ads_1', 'option') ):?>
				<div class="pay-sidebar-big-ads pay-sidebar-item">
				<?php while( have_rows('sidebar_big_ads_1', 'option') ) : the_row(); ?>
					<a href="<?php the_sub_field('ad_url', 'option') ?>"><img src="<?php the_sub_field('ad_images', 'option') ?>" alt=""></a>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php get_template_part( 'template-parts/components/recent-reviews', 'sidebar' ); ?>

			<?php
			if( have_rows('sidebar_big_ads_2', 'option') ):?>
				<div class="pay-sidebar-big-ads pay-sidebar-item">
				<?php while( have_rows('sidebar_big_ads_1', 'option') ) : the_row(); ?>
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