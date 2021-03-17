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