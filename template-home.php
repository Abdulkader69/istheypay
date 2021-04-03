<?php

/* Template Name: Home Page */

get_header();
?>

    <main id="main-content" class="home-page-main">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 pay-main-content-wrapper">
                    <div class="pay-left">
						<?php get_template_part( 'template-parts/components/page-top', 'section' ); ?>
                        <div class="pay-premium-networks-section">
                            <div class="pay-premium-network-filters">
                                <form id="ppn-filter-form">
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
                                                <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
											<?php endforeach; ?>
                                        </select>
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
                                                <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
											<?php endforeach; ?>
                                        </select>
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
                                                <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                </form>
                            </div>
							<?php echo do_shortcode( '[pay_premium_networks_shortcodes category="affiliate-networks" per_page="15"]' ); ?>
                        </div>
                        <div class="pay-premium-networks-section">
							<?php echo do_shortcode( '[pay_premium_networks_shortcodes category="affiliate-programs" per_page="3"]' ); ?>
                        </div>
                        <div class="pay-premium-networks-section">
							<?php echo do_shortcode( '[pay_premium_networks_shortcodes category="advertising-networks" per_page="3"]' ); ?>
                        </div>
                    </div>
					<?php get_sidebar(); ?>
                </div>
            </div>
        </div>

    </main><!-- #main -->

<?php
get_footer();
