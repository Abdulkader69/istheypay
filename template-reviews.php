<?php

/* Template Name: Reviews Template */

get_header();
?>

	<main id="main-content">

		<div class="container">
			<div class="row">
				<div class="col-lg-12 pay-main-content-wrapper">
					<div class="pay-left">
                        <?php
                        echo do_shortcode( '[pay_review_shortcodes]' )
                        ?>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
