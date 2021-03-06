<?php
/**
 * The template for displaying search results pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package Is_They_Pay
 */

get_header();
?>

	<main id="main-content">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'is-they-pay' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				if(isset($_GET['post_type'])) {
					$type = $_GET['post_type'];
					if($type == 'networks') {
		
							get_template_part( 'template-parts/content', 'search' );
				
						 } else { ?>
				
							/* Format for custom post types that are not "book,"
							or you can use elseif to specify a second post type the
							same way as above. Copy the default format here if you
							only have one custom post type. */
				
						<?php } ?>
					<?php } else { ?>
				
							/* Format to display when the post_type parameter
							is not set (i.e. default format) */
				<?php } 

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			// get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main>

<?php
get_sidebar();
get_footer();
