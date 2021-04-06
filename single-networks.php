<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Is_They_Pay
 */

get_header();

$network = new Network();
$networkID = get_the_ID();
?>

    <main id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pay-main-content-wrapper">
                    <div class="pay-left">
                        <div class="pay-single-networks-wrapper">
                            <?php
                                require locate_template( 'template-parts/components/reviews-form-popup.php' );
                                // required locate_template( 'template-parts/components/reviews-form', 'popup' );
                            ?>
                            <div class="pay-sn-top-section">
                                <div class="pay-sn-categories">
                                    <?php $networksType = get_field( 'network_program_type' );
                                    if ( '1' == $networksType ) { ?>
                                        <p>Affiliate Networks</p>
                                        <?php 
                                        $taxonomies     = get_object_taxonomies( $post_type );
                                        $taxonomy_names = wp_get_object_terms( get_the_ID(), $taxonomies );
                                        ?>
                                        <div class="categories">
                                            <?php
                                            foreach ( $taxonomy_names as $tax ) {
                                                if ( $tax->parent != 0 ) { // avoid parent categories
                                                    $tax_slug = $tax->slug;
                                                    if ( $tax_slug == 'adult' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-adult">18</i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'biz-opp' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-bill-alt"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'crypto' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-bitcoin"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'dating' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-ui-love"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'ecommerce' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-shopping-cart"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'education' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-hat-alt"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'finance' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-dollar"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'forex-trading' ) { ?>
                                                        <p>
                                                                <span class="icon"><i
                                                                            class="icofont-chart-histogram-alt"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'gambling' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-dice"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'game' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-ui-game"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'health-nutra' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-doctor"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'incentive' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-recycle"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'mobile' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-ui-touch-phone"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'pay-per-call' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-ui-call"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'survey' ) { ?>
                                                        <p>
                                                                <span class="icon"><i
                                                                            class="icofont-chart-histogram-alt"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'sweepstakes' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-bill-alt"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                    if ( $tax_slug == 'travel' ) { ?>
                                                        <p>
                                                            <span class="icon"><i class="icofont-airplane-alt"></i></span>
                                                            <span><?php echo $tax->name; ?></span>
                                                        </p>
                                                    <?php }
                                                }
                                            }
                                            ?>
                                        </div>
                                    <?php } elseif ( '2' == $networksType ) { ?>
                                        <p>Affiliate Programs</p>
                                    <?php } elseif ( '3' == $networksType ) { ?>
                                        <p>Advertising Networks</p>
                                    <?php } ?>

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

                                                <?php $skype = get_field( 'skype' );
												if ( ! $skype == '' ) : ?>
                                                    <p><a href="skype:<?php echo $skype; ?>">
                                                        <i class="icofont-skype"></i>
                                                    </a></p>
												<?php endif; ?>

                                                <?php $telegram = get_field( 'telegram' );
												if ( ! $telegram == '' ) : ?>
                                                    <p><a target="_blank" href="<?php echo $telegram; ?>">
                                                        <i class="icofont-telegram"></i>
                                                    </a></p>
												<?php endif; ?>

                                                <?php $phone = get_field( 'phone' );
												if ( ! $phone == '' ) : ?>
                                                    <p><a href="tel:<?php echo $phone; ?>">
                                                        <i class="icofont-ui-touch-phone"></i>
                                                    </a></p>
												<?php endif; ?>

												<?php $facebook = get_field( 'facebook' );
												if ( ! $facebook == '' ) : ?>
                                                    <p><a target="_blank" href="<?php echo $facebook; ?>">
                                                        <i class="icofont-facebook"></i>
                                                    </a></p>
												<?php endif; ?>

												<?php $twitter = get_field( 'twitter' );
												if ( ! $twitter == '' ) : ?>
                                                    <p><a target="_blank" href="<?php echo $twitter; ?>">
                                                        <i class="icofont-twitter"></i>
                                                    </a></p>
												<?php endif; ?>

												<?php $linkedin = get_field( 'linkedin' );
												if ( ! $linkedin == '' ) : ?>
                                                    <p><a target="_blank" href="<?php echo $linkedin; ?>">
                                                        <i class="icofont-linkedin"></i>
                                                    </a></p>
												<?php endif; ?>

												<?php $vk = get_field( 'vk' );
												if ( ! $vk == '' ) : ?>
                                                    <p><a target="_blank" href="<?php echo $vk; ?>">
                                                        <i class="icofont-vk"></i>
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
                                        <span class="more">[ More ]</span>
                                        <span class="hide">[ Hide ]</span>
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
                                                        <p><?php the_field( 'afn_tracking_software' ); ?></p>
                                                    </div>
                                                </div>
                                                <!-- <div class="pay-snd-item">
                                                    <div class="pay-snd-title"><p>Tracking Link</p></div>
                                                    <div class="pay-snd-content">
                                                        <p><?php //the_field('afn_commission_type'); ?></p></div>
                                                </div> -->
                                                <?php if( have_rows('afn_aa_contacts') ): ?>
                                                        <div class="pay-snd-item">
                                                            <div class="pay-snd-title"><p>Affiliate Managers</p></div>
                                                            <div class="pay-snd-content">
                                                                <?php while( have_rows('afn_aa_contacts') ) : the_row(); ?>
                                                                    
                                                                        <div class="pay-snd-manager">
                                                                            <p class="name"><?php the_sub_field( 'name' ); ?></p>
                                                                            <p class="social">
                                                                                <?php $mail = get_sub_field( 'email' );
                                                                                if ( ! $mail == '' ) : ?>
                                                                                    <span><a href="mailto:<?php echo $mail; ?>">
                                                                                        <i class="icofont-ui-message"></i>
                                                                                    </a></span>
                                                                                <?php endif; ?>
                                                                                <?php $mail = get_sub_field( 'skype' );
                                                                                if ( ! $mail == '' ) : ?>
                                                                                    <span><a href="skype:<?php echo $mail; ?>">
                                                                                        <i class="icofont-skype"></i>
                                                                                    </a></span>
                                                                                <?php endif; ?>
                                                                            </p>
                                                                        </div>
                                                                        
                                                                <?php endwhile; ?>
                                                            </div>
                                                        </div>
                                                <?php endif; ?>
                                            </div>
										<?php } elseif ( '2' == $networksType ) { ?>
                                            <div class="pay-sn-details-items-inner aff-program">
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
                                                <?php if( have_rows('afp_as_team') ): ?>
                                                        <div class="pay-snd-item">
                                                            <div class="pay-snd-title"><p>Affiliate Support</p></div>
                                                            <div class="pay-snd-content">
                                                                <?php while( have_rows('afp_as_team') ) : the_row(); ?>
                                                                    
                                                                        <div class="pay-snd-manager">
                                                                            <p class="name"><?php the_sub_field( 'name' ); ?></p>
                                                                            <p class="social">
                                                                                <?php $mail = get_sub_field( 'email' );
                                                                                if ( ! $mail == '' ) : ?>
                                                                                    <span><a href="mailto:<?php echo $mail; ?>">
                                                                                        <i class="icofont-ui-message"></i>
                                                                                    </a></span>
                                                                                <?php endif; ?>
                                                                                <?php $mail = get_sub_field( 'skype' );
                                                                                if ( ! $mail == '' ) : ?>
                                                                                    <span><a href="skype:<?php echo $mail; ?>">
                                                                                        <i class="icofont-skype"></i>
                                                                                    </a></span>
                                                                                <?php endif; ?>
                                                                            </p>
                                                                        </div>
                                                                        
                                                                <?php endwhile; ?>
                                                            </div>
                                                        </div>
                                                <?php endif; ?>
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
                                                <?php if( have_rows('adn_fp_contacts') ): ?>
                                                        <div class="pay-snd-item">
                                                            <div class="pay-snd-title"><p>Publishers Contact</p></div>
                                                            <div class="pay-snd-content">
                                                                <?php while( have_rows('adn_fp_contacts') ) : the_row(); ?>
                                                                    
                                                                        <div class="pay-snd-manager">
                                                                            <p class="name"><?php the_sub_field( 'name' ); ?></p>
                                                                            <p class="social">
                                                                                <?php $mail = get_sub_field( 'email' );
                                                                                if ( ! $mail == '' ) : ?>
                                                                                    <span><a href="mailto:<?php echo $mail; ?>">
                                                                                        <i class="icofont-ui-message"></i>
                                                                                    </a></span>
                                                                                <?php endif; ?>
                                                                                <?php $mail = get_sub_field( 'skype' );
                                                                                if ( ! $mail == '' ) : ?>
                                                                                    <span><a href="skype:<?php echo $mail; ?>">
                                                                                        <i class="icofont-skype"></i>
                                                                                    </a></span>
                                                                                <?php endif; ?>
                                                                            </p>
                                                                        </div>
                                                                        
                                                                <?php endwhile; ?>
                                                            </div>
                                                        </div>
                                                <?php endif; ?>

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
                                                <?php if( have_rows('adn_fa_contacts') ): ?>
                                                        <div class="pay-snd-item">
                                                            <div class="pay-snd-title"><p>Advertisers Contact</p></div>
                                                            <div class="pay-snd-content">
                                                                <?php while( have_rows('adn_fa_contacts') ) : the_row(); ?>
                                                                    
                                                                        <div class="pay-snd-manager">
                                                                            <p class="name"><?php the_sub_field( 'name' ); ?></p>
                                                                            <p class="social">
                                                                                <?php $mail = get_sub_field( 'email' );
                                                                                if ( ! $mail == '' ) : ?>
                                                                                    <span><a href="mailto:<?php echo $mail; ?>">
                                                                                        <i class="icofont-ui-message"></i>
                                                                                    </a></span>
                                                                                <?php endif; ?>
                                                                                <?php $mail = get_sub_field( 'skype' );
                                                                                if ( ! $mail == '' ) : ?>
                                                                                    <span><a href="skype:<?php echo $mail; ?>">
                                                                                        <i class="icofont-skype"></i>
                                                                                    </a></span>
                                                                                <?php endif; ?>
                                                                            </p>
                                                                        </div>
                                                                        
                                                                <?php endwhile; ?>
                                                            </div>
                                                        </div>
                                                <?php endif; ?>
                                            </div>
										<?php }
										?>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="pay-snd-rat-distribution">
                                        <h3 class="rat-dist-title">Rating Distribution</h3>
                                        <div class="rat-dist-chart">
											<?php $rating_for_chart = $average * 20; ?>
                                            <div class="chart" data-percent="<?php echo $rating_for_chart; ?>"
                                                 data-scale-color="red"><span><?php echo $average; ?></span>
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
							if ( $ratings->have_posts() ) :
								?>
                                <div class="pay-sn-networks-reviews-wrapper" id="single-review">
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
get_footer();