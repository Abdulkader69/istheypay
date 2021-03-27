<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Is_They_Pay
 */

get_header();

$network = new Network();
?>

    <main id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pay-main-content-wrapper">
                    <div class="pay-left">
                        <div class="pay-single-networks-wrapper">

                            <div class="pay-sn-top-section">
                                <div class="pay-sn-categories">
									<?php
									$networkID  = get_the_ID();
									$categories = get_the_terms( $networkID, 'network_category' );
									if ( $categories ) {
										foreach ( $categories as $cat ) {
											if ( $cat->parent == 0 ) {
												echo $cat->name;
											}
										}
									}
									?>
                                </div>
                                <div class="pay-sn-header-meta">
                                    <div class="left">
                                        <h1 class="pay-sn-title"><?php the_title(); ?></h1>
                                        <div class="pay-sn-rat-rev-so">
                                            <span><?php $average = $network->get_rating( $networkID ); ?></span>

                                            <p class="rating <?php echo 'rat' . round( $average ); ?>">
                                                <span><i class="icofont-star"></i></span>
                                                <span><i class="icofont-star"></i></span>
                                                <span><i class="icofont-star"></i></span>
                                                <span><i class="icofont-star"></i></span>
                                                <span><i class="icofont-star"></i></span>
                                            </p>
                                            <div class="reviews">
												<?php echo $network->get_total_rating_count( $networkID ); ?> reviews
                                            </div>

                                            <div class="socials-icons">
												<?php $mail = get_field( 'email' );
												if ( ! $mail == '' ) : ?>
                                                    <p><a href="mailto:<?php echo $mail; ?>">
                                                            <i class="icofont-ui-message"></i>
                                                        </a></p>
												<?php endif; ?>

												<?php $networksType = get_field( 'network_program_type' );
												if ( '1' == $networksType ) { ?>
													<?php $website = get_field( 'afn_network_url' );
													if ( ! $website == '' ) : ?>
                                                        <p><a href="<?php echo $website; ?>">
                                                                <i class="icofont-web"></i>
                                                            </a></p>
													<?php endif; ?>
												<?php } elseif ( '2' == $networksType ) { ?>
													<?php $website = get_field( 'afp_program_url' );
													if ( ! $website == '' ) : ?>
                                                        <p><a href="<?php echo $website; ?>">
                                                                <i class="icofont-web"></i>
                                                            </a></p>
													<?php endif; ?>
												<?php } elseif ( '3' == $networksType ) { ?>
													<?php $website = get_field( 'adn_network_url' );
													if ( ! $website == '' ) : ?>
                                                        <p><a href="<?php echo $website; ?>">
                                                                <i class="icofont-web"></i>
                                                            </a></p>
													<?php endif; ?>
												<?php } ?>

												<?php $facebook = get_field( 'facebook' );
												if ( ! $facebook == '' ) : ?>
                                                    <p><a href="<?php echo $facebook; ?>">
                                                            <i class="icofont-facebook"></i>
                                                        </a></p>
												<?php endif; ?>

												<?php $twitter = get_field( 'twitter' );
												if ( ! $twitter == '' ) : ?>
                                                    <p><a href="<?php echo $twitter; ?>">
                                                            <i class="icofont-twitter"></i>
                                                        </a></p>
												<?php endif; ?>

												<?php $linkedin = get_field( 'linkedin' );
												if ( ! $linkedin == '' ) : ?>
                                                    <p><a href="<?php echo $linkedin; ?>">
                                                            <i class="icofont-linkedin"></i>
                                                        </a></p>
												<?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="pay-about-sn">
                                            <p>
                                                Offers
                                                <span><?php echo $network->get_rating( $networkID, 'offers' ) ?></span>
                                            </p>
                                            <p>
                                                PAYOUT
                                                <span><?php echo $network->get_rating( $networkID, 'payout' ) ?></span>
                                            </p>
                                            <p>
                                                TRACKING
                                                <span><?php echo $network->get_rating( $networkID, 'tracking' ) ?></span>
                                            </p>
                                            <p>
                                                SUPPORT
                                                <span><?php echo $network->get_rating( $networkID, 'support' ) ?></span>
                                            </p>
                                        </div>
                                        <div class="pay-sn-btns">
                                            <span class="write-review-btn">Write a reviews</span>
											<?php $networksType = get_field( 'network_program_type' );
											if ( '1' == $networksType ) { ?>
                                                <a class="join" target="_blank"
                                                   href="<?php the_field( 'afn_network_url' ); ?>">Join Now</a>
											<?php } elseif ( '2' == $networksType ) { ?>
                                                <a class="join" target="_blank"
                                                   href="<?php the_field( 'afp_program_url' ); ?>">Join Now</a>
											<?php } elseif ( '3' == $networksType ) { ?>
                                                <a class="join" target="_blank"
                                                   href="<?php the_field( 'adn_network_url' ); ?>">Join Now</a>
											<?php } ?>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="thumbnail">
                                            <img src="<?php the_post_thumbnail_url( 'full' ); ?>"
                                                 alt="<?php the_title(); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="pay-about-sn-description">
                                    <div class="pay-about-sn-description-inner">
										<?php
										$networksType = get_field( 'network_program_type' );
										if ( '1' == $networksType ) { ?>
                                            <p><?php the_field( 'afn_network_description' ); ?></p>
										<?php } elseif ( '2' == $networksType ) { ?>
                                            <p><?php the_field( 'afp_program_description' ); ?></p>
										<?php } elseif ( '3' == $networksType ) { ?>
                                            <p><?php the_field( 'adn_network_description' ); ?></p>
										<?php }
										?>
                                    </div>
                                </div>
                            </div>

                            <div class="pay-sn-networks-details-wrap">
                                <div class="left">
                                    <div class="pay-sn-details-title">
                                        <h3>
											<?php
											$networksType = get_field( 'network_program_type' );
											if ( '1' == $networksType ) { ?>
                                                <i class="icofont-listine-dots"></i> Affiliate Network Details
											<?php } elseif ( '2' == $networksType ) { ?>
                                                <i class="icofont-listine-dots"></i> Affiliate Program Details
											<?php } elseif ( '3' == $networksType ) { ?>
                                                <i class="icofont-listine-dots"></i> Advertising Network Details
											<?php }
											?>
                                        </h3>
                                    </div>
                                    <div class="pay-sn-details-items-wrap">
										<?php
										$networksType = get_field( 'network_program_type' );
										if ( '1' == $networksType ) { ?>
                                            <div class="pay-sn-details-items-inner aff-networks">
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Number of Offers</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afn_offers_in_your_network' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Commission Type</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afn_commission_type' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Minimum Payment</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afn_minimum_payment' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Payment Frequency</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afn_payment_frequency' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Payment Method</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afn_payment_method' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Referral Commission</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afn_referral_commission' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Tracking Software</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afn_affiliate_tracking_software' ); ?></p>
                                                    </div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Tracking Link</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php //the_field('afn_commission_type'); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Affiliate Managers</p></div>
                                                    <div class="pay-snd-content">
                                                        <div class="pay-snd-manager">
                                                            <p class="name">Bobby Hazel</p>
                                                            <p class="social">
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                            </p>
                                                        </div>
                                                        <div class="pay-snd-manager">
                                                            <p class="name">Bobby Hazel</p>
                                                            <p class="social">
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										<?php } elseif ( '2' == $networksType ) { ?>
                                            <div class="pay-sn-details-items-inner aff-program">
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Number of Offers</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php //the_field('afn_affiliate_tracking_software'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Commission Type</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afp_base_commission' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Minimum Payment</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afp_minimum_payment' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Payment Frequency</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afp_payment_frequency' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Payment Method</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afp_payment_method' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Referral Commission</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afp_sub-affiliate' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Tracking Software</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afp_affiliate_tracking' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Tracking Link</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php //the_field('afn_affiliate_tracking_software'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Affiliate Managers</p></div>
                                                    <div class="pay-snd-content">
                                                        <div class="pay-snd-manager">
                                                            <p class="name">Bobby Hazel</p>
                                                            <p class="social">
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                            </p>
                                                        </div>
                                                        <div class="pay-snd-manager">
                                                            <p class="name">Bobby Hazel</p>
                                                            <p class="social">
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										<?php } elseif ( '3' == $networksType ) { ?>
                                            <div class="pay-sn-details-items-inner aff-advertise">

                                                <div class="inner-title"><p>For Publisher</p></div>

                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Commission Type</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fp_commission_type' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Minimum Payment</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fp_minimum_payment' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Payment Frequency</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fp_payment_frequency' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Payment Method</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fp_payment_method' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Referral Commission</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fp_referral_commission' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Top Vertical</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'afn_top_verticals' ); ?></p></div>
                                                </div>

                                                <div class="inner-title"><p>For Advertiser</p></div>

                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Ad Format</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fa_ad_format' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Cost Model</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fa_cost_model' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Minimum Deposit </p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fa_minimum_deposit' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Payment Method </p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fa_payment_method' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Referral Commission </p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fa_referral_commission' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Daily Impression </p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fa_daily_impression' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Top GEO</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fa_top_geo' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Top Vertical</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php the_field( 'adn_fa_top_vertical' ); ?></p></div>
                                                </div>
                                                <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Affiliate Managers</p></div>
                                                    <div class="pay-snd-content">
                                                        <div class="pay-snd-manager">
                                                            <p class="name">Bobby Hazel</p>
                                                            <p class="social">
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                            </p>
                                                        </div>
                                                        <div class="pay-snd-manager">
                                                            <p class="name">Bobby Hazel</p>
                                                            <p class="social">
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                                <a href="#"><img width="15px" height="15px"
                                                                                 src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/star.svg"
                                                                                 alt=""></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										<?php }
										?>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="pay-snd-rat-distribution">
                                        <h3 class="rat-dist-title">Rating Distribution</h3>
                                        <div class="rat-dist-chart">
											<?php $rating_for_chart = round( $average ) * 20; ?>
                                            <div class="chart" data-percent="<?php echo $rating_for_chart; ?>"
                                                 data-scale-color="red"><span><?php echo round( $average ); ?></span>
                                            </div>
                                        </div>
                                        <div class="rat-indivi">
                                            <p class="exce">
                                                <span class="name">Excellent</span>
                                                <span class="count"><?php echo $network->get_rating_by_star( $networkID, 'overall', 5 ); ?></span>
                                            </p>
                                            <p class="v-gd">
                                                <span class="name">Very good</span>
                                                <span class="count"><?php echo $network->get_rating_by_star( $networkID, 'overall', 4 ); ?></span>
                                            </p>
                                            <p class="avrg">
                                                <span class="name">Average</span>
                                                <span class="count"><?php echo $network->get_rating_by_star( $networkID, 'overall', 3 ); ?></span>
                                            </p>
                                            <p class="poor">
                                                <span class="name">Poor</span>
                                                <span class="count"><?php echo $network->get_rating_by_star( $networkID, 'overall', 2 ); ?></span>
                                            </p>
                                            <p class="trrb">
                                                <span class="name">Terrible</span>
                                                <span class="count"><?php echo $network->get_rating_by_star( $networkID, 'overall', 1 ); ?></span>
                                            </p>
                                        </div>
                                        <div class="rat-in-review">
                                            <p class="offr">
                                                <span class="name">Offers</span>
                                                <span class="bar offr-bar b<?php echo round( $network->get_rating( $networkID, 'offers' ) ); ?>"></span>
                                            </p>
                                            <p class="payout">
                                                <span class="name">Payout</span>
                                                <span class="bar payout-bar b<?php echo round( $network->get_rating( $networkID, 'payout' ) ); ?>"></span>
                                            </p>
                                            <p class="trac">
                                                <span class="name">Tracking</span>
                                                <span class="bar trac-bar b<?php echo round( $network->get_rating( $networkID, 'tracking' ) ); ?>"></span>
                                            </p>
                                            <p class="suppt">
                                                <span class="name">Support</span>
                                                <span class="bar suppt-bar b<?php echo round( $network->get_rating( $networkID, 'support' ) ); ?>"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<?php
							$networksType = get_field( 'network_program_type' );
							if ( '3' == $networksType ) { ?>
								<?php $targetOptimize = get_field( 'adn_fa_targeting_optimization' );
								if ( $targetOptimize ): ?>
                                    <div class="pay-sn-d-target-optimize-wrap">
                                        <div class="pay-sn-details-title">
                                            <h3>
                                                <i class="icofont-listine-dots"></i> Targeting & Optimization
                                            </h3>
                                        </div>
                                        <ul>
											<?php foreach ( $targetOptimize as $TO ): ?>
                                                <li><?php echo $TO ?> <i class="icofont-check"></i></li>
											<?php endforeach; ?>
                                        </ul>
                                    </div>
								<?php endif; ?>
							<?php } ?>

							<?php
							$ratings = $network->get_all_reviews( $networkID );
							if ( $ratings ) :
								?>
                                <div class="pay-sn-networks-reviews-wrapper">
                                    <div class="pay-sn-reviews-row">
										<?php
										while ( $ratings->have_posts() ) : $ratings->the_post();
											get_template_part( 'template-parts/components/review', 'item' );
										endwhile;
										?>
                                    </div>
                                </div>
							<?php endif; ?>
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