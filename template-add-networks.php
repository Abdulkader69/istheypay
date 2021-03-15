<?php

/* Template Name: Add Network */

get_header();
?>

    <main id="main-content">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 pay-main-content-wrapper">
                    <div class="pay-left">
						<?php get_template_part( 'template-parts/components/add-network', 'program' ); ?>
                    </div>
					<?php get_sidebar(); ?>
                </div>
            </div>
        </div>

    </main><!-- #main -->

<?php
get_footer();
