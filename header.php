<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Is_They_Pay
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="preloader">
	<div class="preloader-orbit-loading">
		<div class="cssload-inner cssload-one"></div>
		<div class="cssload-inner cssload-two"></div>
		<div class="cssload-inner cssload-three"></div>
	</div>
</div>
<div id="page-container" class="<?php if( get_field('site_layout', 'option') ) : ?>boxed-layout<?php else: ?>fullwidth-layout<?php endif;?>"
	<?php if( get_field('site_layout', 'option') ) : ?>
		style="background-image:url(<?php the_field('site_background_images', 'option') ?>);
	<?php endif;?>
">
	<div class="<?php if( get_field('site_layout', 'option') ) : ?>boxed-layout<?php else: ?>fullwidth-layout<?php endif;?>">
		<header id="main-header">
			<div class="pay-top-header">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<a href="<?php echo esc_url( get_site_url() . '/add-network/' ) ?>" id="add-network-program-btn">Add Network / Program</a>
						</div>
					</div>
				</div>
			</div>
			<div class="pay-main-header">
				<div class="container">
					<div class="row align-center">
						<div class="col-md-4">
							<div class="logo"><?php the_custom_logo(); ?></div>
						</div>
						<div class="col-md-8">
							<?php if( have_rows('header_ads', 'option') ): ?>
								<?php while( have_rows('header_ads', 'option') ): the_row();
									if( get_sub_field('ad_images') ) : ?>
										<div class="header-banner-ads-wrap"><a href="<?php the_sub_field('ad_url'); ?>"><img src="<?php the_sub_field('ad_images'); ?>" alt="header ads"></a></div>
									<?php
									endif;
								endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="pay-main-menu">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<nav id="main-navigation">
									<div class="ham">
										<button class="hamburger hamburger--collapse" type="button">
											<span class="hamburger-box">
												<span class="hamburger-inner"></span>
											</span>
										</button>
									</div>
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
										)
									);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
