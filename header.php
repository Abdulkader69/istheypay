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
<div id="page-container">
	<header id="main-header">
		<div class="pay-top-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<span id="add-network-program-btn">Add Network / Program</span>
					</div>
				</div>
			</div>
		</div>
		<div class="pay-main-header">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="logo"><?php the_custom_logo(); ?></div>
					</div>
					<div class="col-md-8"></div>
				</div>
			</div>
			<div class="pay-main-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<nav id="main-navigation">
								<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'is-they-pay' ); ?></button> -->
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
