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
                        <div class="pay-single-networks-wrapper">

                            <div class="pay-sn-top-section">
                                <div class="pay-sn-categories">
                                    <?php
                                        $networkID = get_the_ID();
                                        $categories = get_the_terms( $networkID, array(
                                            'taxonomy' => 'network_category',
                                        ) );
                                        foreach ( $categories as $cat ) {
                                            if( $cat->parent == 0 ) {
                                                echo $cat->name;
                                            }
                                        }
                                        // echo '<pre>';
                                        // print_r($categories);
                                        // echo '</pre>';
                                    ?>
                                </div>
                                <div class="pay-sn-header-meta">
                                    <div class="left">
                                        <h1 class="pay-sn-title"><?php the_title(); ?></h1>
                                        <div class="pay-sn-rat-rev-so">
                                            <p class="rating">
                                                <span><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></span>
                                                <span><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></span>
                                                <span><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></span>
                                                <span><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></span>
                                                <span><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></span>
                                            </p>
                                            <div class="reviews">
                                                129 reviews
                                            </div>
                                            <div class="socials-icons">
                                                <p>
                                                    <span>Name</span>
                                                    <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt="">
                                                </p>
                                                <p>
                                                    <span>Name</span>
                                                    <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt="">
                                                </p>
                                                <p>
                                                    <span>Name</span>
                                                    <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt="">
                                                </p>
                                                <p>
                                                    <span>Name</span>
                                                    <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt="">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="pay-about-sn">
                                            <p>
                                                Offers
                                                <span>4.91</span>
                                            </p>
                                            <p>
                                                PAYOUT
                                                <span>4.96</span>
                                            </p>
                                            <p>
                                                TRACKING
                                                <span>4.95</span>
                                            </p>
                                            <p>
                                                SUPPORT
                                                <span>4.94</span>
                                            </p>
                                        </div>
                                        <div class="pay-sn-btns">
                                            <span class="write-review-btn">Write a reviews</span>
                                            <?php 
                                                $networksType = get_field( 'network_program_type' );
                                                if( '1' == $networksType ) { ?>
                                                    <a class="join" target="_blank" href="<?php the_field('afn_network_url'); ?>">Join Now</a>
                                                <?php } elseif( '2' == $networksType ) { ?>
                                                    <a class="join" target="_blank" href="<?php the_field('afp_program_url'); ?>">Join Now</a>
                                                <?php } elseif( '3' == $networksType ) { ?>
                                                    <a class="join" target="_blank" href="<?php the_field('adn_network_url'); ?>">Join Now</a>
                                                <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="thumbnail">
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="pay-about-sn-description">
                                    <div class="pay-about-sn-description-inner">
                                        <?php 
                                            $networksType = get_field( 'network_program_type' );
                                            if( '1' == $networksType ) { ?>
                                                <p><?php the_field('afn_network_description'); ?></p>
                                            <?php } elseif( '2' == $networksType ) { ?>
                                                <p><?php the_field('afp_program_description'); ?></p>
                                            <?php } elseif( '3' == $networksType ) { ?>
                                                <p><?php the_field('adn_network_description'); ?></p>
                                            <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="pay-sn-networks-details-wrap">
                                <div class="left">
                                    <div class="pay-sn-details-title">
                                        <h3>
                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt="">
                                            <?php 
                                                $networksType = get_field( 'network_program_type' );
                                                if( '1' == $networksType ) { ?>
                                                    <i class="icofont-ui-game"></i> Affiliate Network Details
                                                <?php } elseif( '2' == $networksType ) { ?>
                                                    Affiliate Program Details
                                                <?php } elseif( '3' == $networksType ) { ?>
                                                    Advertising Network Details
                                                <?php }
                                            ?>
                                        </h3>
                                    </div>
                                    <div class="pay-sn-details-items-wrap">
                                        <?php 
                                            $networksType = get_field( 'network_program_type' );
                                            if( '1' == $networksType ) { ?>
                                                <div class="pay-sn-details-items-inner aff-networks">
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Number of Offers</p></div>
                                                        <div class="pay-snd-content"><p>1000+</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Commission Type</p></div>
                                                        <div class="pay-snd-content"><p>CPA, CPL, CPI, CPS</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Minimum Payment</p></div>
                                                        <div class="pay-snd-content"><p>$50</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Payment Frequency</p></div>
                                                        <div class="pay-snd-content"><p>Weekly, Net-30</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Payment Method</p></div>
                                                        <div class="pay-snd-content"><p>PayPal, Payoneer, Wire, Check, ACH</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Referral Commission</p></div>
                                                        <div class="pay-snd-content"><p>10%</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Tracking Software</p></div>
                                                        <div class="pay-snd-content"><p>In-house proprietary platform and Custom content locking</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Tracking Link</p></div>
                                                        <div class="pay-snd-content"><p>N/A</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Affiliate Managers</p></div>
                                                        <div class="pay-snd-content">
                                                            <div class="pay-snd-manager">
                                                                <p class="name">Bobby Hazel</p>
                                                                <p class="social">
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                </p>
                                                            </div>
                                                            <div class="pay-snd-manager">
                                                                <p class="name">Bobby Hazel</p>
                                                                <p class="social">
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } elseif( '2' == $networksType ) { ?>
                                                <div class="pay-sn-details-items-inner aff-program">
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Number of Offers</p></div>
                                                        <div class="pay-snd-content"><p>1000+</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Commission Type</p></div>
                                                        <div class="pay-snd-content"><p>CPA, CPL, CPI, CPS</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Minimum Payment</p></div>
                                                        <div class="pay-snd-content"><p>$50</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Payment Frequency</p></div>
                                                        <div class="pay-snd-content"><p>Weekly, Net-30</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Payment Method</p></div>
                                                        <div class="pay-snd-content"><p>PayPal, Payoneer, Wire, Check, ACH</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Referral Commission</p></div>
                                                        <div class="pay-snd-content"><p>10%</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Tracking Software</p></div>
                                                        <div class="pay-snd-content"><p>In-house proprietary platform and Custom content locking</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Tracking Link</p></div>
                                                        <div class="pay-snd-content"><p>N/A</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Affiliate Managers</p></div>
                                                        <div class="pay-snd-content">
                                                            <div class="pay-snd-manager">
                                                                <p class="name">Bobby Hazel</p>
                                                                <p class="social">
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                </p>
                                                            </div>
                                                            <div class="pay-snd-manager">
                                                                <p class="name">Bobby Hazel</p>
                                                                <p class="social">
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } elseif( '3' == $networksType ) { ?>
                                                <div class="pay-sn-details-items-inner aff-advertise">
                                                    <div class="inner-title"><p>For Publisher</p></div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Number of Offers</p></div>
                                                        <div class="pay-snd-content"><p>1000+</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Commission Type</p></div>
                                                        <div class="pay-snd-content"><p>CPA, CPL, CPI, CPS</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Minimum Payment</p></div>
                                                        <div class="pay-snd-content"><p>$50</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Payment Frequency</p></div>
                                                        <div class="pay-snd-content"><p>Weekly, Net-30</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Payment Method</p></div>
                                                        <div class="pay-snd-content"><p>PayPal, Payoneer, Wire, Check, ACH</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Referral Commission</p></div>
                                                        <div class="pay-snd-content"><p>10%</p></div>
                                                    </div>
                                                    <div class="inner-title"><p>For Advertiser</p></div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Tracking Software</p></div>
                                                        <div class="pay-snd-content"><p>In-house proprietary platform and Custom content locking</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Tracking Link</p></div>
                                                        <div class="pay-snd-content"><p>N/A</p></div>
                                                    </div>
                                                    <div class="pay-snd-item">
                                                        <div class="pay-snd-title"><p>Affiliate Managers</p></div>
                                                        <div class="pay-snd-content">
                                                            <div class="pay-snd-manager">
                                                                <p class="name">Bobby Hazel</p>
                                                                <p class="social">
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                </p>
                                                            </div>
                                                            <div class="pay-snd-manager">
                                                                <p class="name">Bobby Hazel</p>
                                                                <p class="social">
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
                                                                    <a href="#"><img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt=""></a>
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
                                            <div class="chart" data-percent="4.5" data-scale-color="red">4.5</div>
                                        </div>
                                        <div class="rat-indivi">
                                            <p class="exce"><span class="name">Excellent</span><span class="count">23</span></p>
                                            <p class="v-gd"><span class="name">Very good</span><span class="count">2</span></p>
                                            <p class="avrg"><span class="name">Average</span><span class="count">0</span></p>
                                            <p class="poor"><span class="name">Poor</span><span class="count">2</span></p>
                                            <p class="trrb"><span class="name">Terrible</span><span class="count">3</span></p>
                                        </div>
                                        <div class="rat-in-review">
                                            <p class="offr"><span class="name">Offers</span><span class="bar offr-bar b<?php echo( round(4.8) ); ?>"></span></p>
                                            <p class="payout"><span class="name">Payout</span><span class="bar payout-bar b<?php echo( round(4.5) ); ?>"></span></p>
                                            <p class="trac"><span class="name">Tracking</span><span class="bar trac-bar b<?php echo( round(4.1) ); ?>"></span></p>
                                            <p class="suppt"><span class="name">Support</span><span class="bar suppt-bar b<?php echo( round(2.8) ); ?>"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pay-sn-networks-reviews-wrapper">
                                <div class="pay-sn-reviews-row">
                                    <?php get_template_part( 'template-parts/components/review', 'item' ); ?>
                                </div>
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
