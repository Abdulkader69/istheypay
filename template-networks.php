<?php

/* Template Name: Networks Template */

get_header();
?>

    <main id="main-content">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 pay-main-content-wrapper">
                    <div class="pay-left">
						<?php get_template_part( 'template-parts/components/page-top', 'section' ); ?>
                        <div class="page-top-with-ad">
                            <h1 class="page-title">Affiliate Networks</h1>
							<?php
							if ( have_rows( 'pages_global_ad', 'option' ) ):?>
								<?php while ( have_rows( 'pages_global_ad', 'option' ) ) : the_row();
									$ad_image = get_sub_field( 'ad_image', 'option' );
									if ( $ad_image != '' ) : ?>
                                        <div class="page-ad-wrap">
                                            <a href="<?php the_sub_field( 'ad_link', 'option' ) ?>"><img
                                                        src="<?php echo $ad_image; ?>" alt=""></a>
                                        </div>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
                        </div>

                        <div class="pay-premium-network-filters">
                            <form id="ppn-filter-form">
                                <div class="filter-label"><i class="icofont-filter"></i> <p>Filters</p></div>
                                <div class="tracking-software filter-dropdown">
									<?php
									$tracking_software = get_terms( array(
										'taxonomy'   => 'tracking_software',
										'hide_empty' => false,
									) )
									?>
                                    <select name="tracking_software" id="tracking_software" class="filter-select">
                                        <option value="">Tracking Software</option>
										<?php foreach ( $tracking_software as $term ) : ?>
                                            <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?>&emsp;(<?php echo $term->count; ?>)</option>
										<?php endforeach; ?>
                                    </select>
                                    <i class="icofont-caret-down"></i>
                                </div>
                                <div class="payment-frequency filter-dropdown">
									<?php
									$payment_frequency = get_terms( array(
										'taxonomy'   => 'payment_frequency',
										'hide_empty' => false,
									) )
									?>
                                    <select name="payment_frequency" id="payment_frequency" class="filter-select">
                                        <option value="">Payment Frequency</option>
										<?php foreach ( $payment_frequency as $term ) : ?>
                                            <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?>&emsp;(<?php echo $term->count; ?>)</option>
										<?php endforeach; ?>
                                    </select>
                                    <i class="icofont-caret-down"></i>
                                </div>
                                <div class="payment-method filter-dropdown">
									<?php
									$payment_method = get_terms( array(
										'taxonomy'   => 'payment_method',
										'hide_empty' => false,
									) )
									?>
                                    <select name="payment_method" id="payment_method" class="filter-select">
                                        <option value="">Payment Method</option>
										<?php foreach ( $payment_method as $term ) : ?>
                                            <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?>&emsp;(<?php echo $term->count; ?>)</option>
										<?php endforeach; ?>
                                    </select>
                                    <i class="icofont-caret-down"></i>
                                </div>
                            </form>
                        </div>
						<?php
						echo do_shortcode( '[pay_networks_shortcodes]' )
						?>
                    </div>
					<?php get_sidebar(); ?>
                </div>
            </div>
        </div>

    </main><!-- #main -->

<?php
get_footer();
