<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Is_They_Pay
 */

get_header();
?>

	<main id="main-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 pay-main-content-wrapper">
					<div class="pay-left">
						<div class="single-blog-post-wrap">
							<h1 class="title"><?php the_title(); ?></h1>
							<div class="thumbnail">
								<img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
							</div>
							<div class="blog-context">
								<?php the_content(); ?>
							</div>
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
