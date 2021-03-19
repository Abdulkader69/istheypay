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
                                            <a class="join" href="#">Join Now</a>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="thumbnail">
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="pay-about-sn-description">
                                    <p>
                                      <?php the_field('afn_network_description'); ?>  
                                    </p>
                                </div>
                            </div>

                            <div class="pay-sn-networks-details-wrap">
                                <div class="left">
                                    <div class="pay-sn-details-title">
                                        <h3>
                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/star.svg" alt="">
                                            Affiliate Network Details
                                        </h3>
                                    </div>
                                    <div class="pay-sn-details-items-wrap">
                                        <div class="pay-sn-details-items-inner">
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
                                    </div>
                                </div>
                                <div class="right">
                                    
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
