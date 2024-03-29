<?php
/**
 * Is They Pay functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Is_They_Pay
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'is_they_pay_setup' ) ) :
	function is_they_pay_setup() {
		load_theme_textdomain( 'is-they-pay', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'is-they-pay' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'is_they_pay_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'is_they_pay_setup' );

function is_they_pay_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'is_they_pay_content_width', 640 );
}

add_action( 'after_setup_theme', 'is_they_pay_content_width', 0 );

function is_they_pay_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'is-they-pay' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'is-they-pay' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'is_they_pay_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function is_they_pay_scripts() {
	wp_enqueue_style( 'is-they-pay-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'is-they-pay-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'is-they-pay-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'pay-custom-js', get_template_directory_uri() . '/inc/js/custom.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'magnific-js', '//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js', array( 'jquery' ), '4.1.0', true );
	wp_enqueue_style( 'magnific-css', '//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css', null, '4.1.0', 'all' );

	wp_enqueue_style( 'icon-fonts', get_template_directory_uri() . '/inc/css/icofont.min.css', null, '4.1.0', 'all' );

	wp_enqueue_script( 'chart-js', '//cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js', array( 'jquery' ), '2.1.6', true );
	wp_enqueue_script( 'owl-js', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
	wp_enqueue_style( 'owl-css', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', null, '2.3.4', 'all' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'itp-ajax', get_stylesheet_directory_uri() . '/inc/js/itp-ajax.js', array( 'jquery' ), _S_VERSION, true );
	wp_localize_script( 'itp-ajax', 'itpAjax', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'siteUrl' => get_site_url(),
	) );
}

add_action( 'wp_enqueue_scripts', 'is_they_pay_scripts' );

// Theme Shortcodes File
require_once dirname( __FILE__ ) . '/inc/shortcodes.php';


require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function pay_register_widgets_func() {

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'istheypay' ),
		'id'            => 'footer-1',
		'description'   => __( 'The main sidebar appears on the right on each page except the front page template', 'istheypay' ),
		'before_widget' => '<aside id="%1$s" class="pay-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="pay-widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'istheypay' ),
		'id'            => 'footer-2',
		'description'   => __( 'The main sidebar appears on the right on each page except the front page template', 'istheypay' ),
		'before_widget' => '<aside id="%1$s" class="pay-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="pay-widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'istheypay' ),
		'id'            => 'footer-3',
		'description'   => __( 'The main sidebar appears on the right on each page except the front page template', 'istheypay' ),
		'before_widget' => '<aside id="%1$s" class="pay-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="pay-widget-title">',
		'after_title'   => '</h3>',
	) );

}

add_action( 'widgets_init', 'pay_register_widgets_func' );


// Adding Theme Option Page
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Pannel',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
	acf_add_options_sub_page( array(
		'page_title'  => 'Manage Ads Settings',
		'menu_title'  => 'Ads Options',
		'parent_slug' => 'theme-general-settings',
	) );

}

// custom search for custom post type
function searchfilter( $query ) {
	if ( $query->is_search && ! is_admin() ) {
		if ( isset( $_GET['post_type'] ) ) {
			$type = $_GET['post_type'];
			if ( $type == 'networks' ) {
				$query->set( 'post_type', array( 'networks' ) );
			}
		}
	}

	return $query;
}

add_filter( 'pre_get_posts', 'searchfilter' );

// Log any data into a file
function custom_logs( $message ) {
	if ( is_array( $message ) ) {
		$message = json_encode( $message );
	}
	$file = fopen( __DIR__ . '/debug.log', "a" );
	echo fwrite( $file, "\n" . date( 'Y-m-d h:i:s' ) . " :: " . $message );
	fclose( $file );
}

// Send a notification to the user once the network is published.
function network_approval_notification( $new_status, $old_status, $post ) {
	if ( $old_status == 'draft' && $new_status == 'publish' && $new_status != $old_status ) {
		$email_address = get_field( 'email', $post->ID );

		$email_message = '
			<table width="100%" border="0" cellpadding="5" cellspacing="0" style="border: 2px solid rgba(247, 51, 69); max-width: 600px; margin: auto;">
				<thead>
					<tr>
						<th colspan="6" style="padding: 15px 20px;text-align: center">
							<a style="text-decoration: none;" target="_blank" href="https://istheypay.com/"><img style="width: 300px;" src="https://istheypay.abdulkader.me/wp-content/themes/istheypay/assets/images/istheypay.png" alt=""></a>
						</th>
					</tr>
				</thead>
				<tbody style="border-top: 5px solid rgba(247, 51, 69);">
					<tr>
						<td colspan="6" style="padding: 20px 20px; border-top: 5px solid rgba(247, 51, 69); font-family:sans-serif; font-size: 16px;line-height: 1.5">Congrats,<br/> Your Network Post has been approved. The admin will contact you if needed. <br/>Thank you.</td>
					</tr>
				</tbody>
				<tfoot style="background-color: rgba(247, 51, 69);">
					<tr>
						<td colspan="6" style="color: #fff; font-family:sans-serif; padding: 15px 20px; font-size: 14px; line-height: 1.4; text-align: center;">Copyright © 2021 | <a style="color: #fff;" target="_blank" href="https://istheypay.com/">istheypay.com</a></td>
					</tr>
				</tfoot>
			</table>
		';

		$headers   = [];
		$headers[] = "Content-Type: text/html";
		$headers[] = "charset=UTF-8";
		$headers[] = "From: IsTheyPay";

		wp_mail( $email_address, 'Network has been approved on IsTheyPay', $email_message, $headers );
	}
}

add_action( 'transition_post_status', 'network_approval_notification', 10, 3 );

require get_template_directory() . '/inc/helpers/network.php';
require get_template_directory() . '/inc/helpers/review.php';

function custom_pagination() {
	global $wp_query;
	$big = 999999999; // need an unlikely integer
	echo paginate_links( array(
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'    => '/paged/%#%',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'prev_text' => '<',
		'next_text' => '>',
		'type'      => 'list',
		'mid_size'  => 2,
		'end_size'  => 1
	) );
}