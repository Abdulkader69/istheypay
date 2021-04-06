<?php

/* Template Name: Home Page */

get_header();
?>

    <main id="main-content" class="home-page-main">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 pay-main-content-wrapper">
                    <div class="pay-left">
						<?php 
                        get_template_part( 'template-parts/components/page-top', 'section' ); 
                        echo do_shortcode( '[pay_premium_networks_shortcodes category="affiliate-networks" per_page="15"]' );
                        echo do_shortcode( '[pay_premium_networks_shortcodes category="affiliate-programs" per_page="3"]' );
                        echo do_shortcode( '[pay_premium_networks_shortcodes category="advertising-networks" per_page="3"]' ); 
                        ?>
                    </div>
					<?php get_sidebar(); ?>
                </div>
            </div>
        </div>

    </main><!-- #main -->

<?php
get_footer();
