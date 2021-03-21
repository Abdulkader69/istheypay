<?php

/* Template Name: Home Page */

get_header();
?>

	<main id="main-content" class="home-page-main">

		<div class="container">
			<div class="row">
				<div class="col-lg-12 pay-main-content-wrapper">
					<div class="pay-left">
                        <div class="pay-home-top-section">
                            <div class="pay-top-five-networks">
                                <?php
                                $random5Networkss = get_field('5_random_networks', 'option');
                                if( $random5Networkss ): ?>
                                    <div class="pay-top-five-networks-inner">
                                        <ul class="pay-top-five-left">
                                            <?php foreach( $random5Networkss as $random5Networks ):
                                            setup_postdata($random5Networks); ?>
                                                <li class="pay-top-five-title" data-tab="tab-<?php echo $random5Networks->ID; ?>">
                                                    <span class="logo"><img src="<?php echo get_field( 'networks_favicon', $random5Networks->ID ); ?>" alt=""></span>
                                                    <span><?php echo $random5Networks->post_title; ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <ul class="pay-top-five-right">
                                            <?php foreach( $random5Networkss as $random5Networks ): 
                                            $permalink = get_permalink( $random5Networks->ID );
                                            setup_postdata($random5Networks); ?>
                                                <li id="tab-<?php echo $random5Networks->ID; ?>" class="pay-top-five-hover-state">
                                                    <div class="main-logo"><img src="<?php echo get_field( 'networks_logo', $random5Networks->ID ); ?>" alt=""></div>
                                                    <div class="rating-chart">
                                                        <div class="chart" data-percent="4.5" data-scale-color="red">4.5</div>
                                                    </div>
                                                    <div class="reviews-calc-rat">
                                                        <span>119 Reviews / </span>
                                                        <span>4.9</span>
                                                    </div>
                                                    <div class="btn">
                                                        <a href="<?php echo $permalink; ?>">Details</a>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php wp_reset_postdata();
                                endif; ?>
                            </div>
                            <div class="pay-blog-slider-wrap">
                                <?php
                                $blogsSliders = get_field('blog_sliders', 'option');
                                if( $blogsSliders ): ?>
                                    <div class="pay-blog-slider-wrapper owl-carousel">
                                        <?php foreach( $blogsSliders as $blogsSlider ): 
                                        setup_postdata($blogsSlider); ?>
                                            <div class="pay-blog-slider-item">
                                                <a href="<?php echo $blogsSlider->guid ?>"><img src="<?php echo get_the_post_thumbnail_url($blogsSlider->ID, 'full'); ?>" alt=""></a>
                                                <?php //print_r($blogsSlider); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php wp_reset_postdata();
                                endif; ?>
                            </div>
                        </div>
                        <div class="pay-premium-networks-section">
                            <div class="pay-premium-networks-wrap">
                                <!-- <div class="pay-premium-networks-top">
                                    <form action="">
                                        <div class="pay-title-bar">
                                            <h2 class="title">Premium Networks</h2>
                                            <input type="hidden" name="sf-orderBy" id="sf-orderBy" value="">
                                            <input type="hidden" name="sf-order" id="sf-order" value="">
                                            <div class="right-filter-column">
                                                <p id="top-rated" class="sort-button" data-orderby="top-rated">Top Rated</p>
                                                <p id="newestt" class="sort-button" data-orderby="newest">Newest</p>
                                            </div>
                                        </div>
                                        <div class="pay-filter-bar">
                                            <p>Filters</p>
                                            <select name="tracking-software" id="tracking-software" class="">
                                                <option>Tracking Software</option>
                                                <option value="">CAKE</option>
                                                <option value="">HasOffers</option>
                                                <option value="">Affise</option>
                                                <option value="">Afftrack</option>
                                                <option value="">Orangear</option>
                                                <option value="">HitPath</option>
                                                <option value="">Offerslook</option>
                                                <option value="">LinkTrust</option>
                                                <option value="">In-house</option>
                                                <option value="">Others</option>
                                            </select>
                                            <select name="payment-frequency" id="payment-frequency" class="">
                                                <option>Payment Frequency</option>
                                                <option value="">Net-15</option>
                                                <option value="">Net-30</option>
                                                <option value="">Net-60</option>
                                                <option value="">Daily</option>
                                                <option value="">Weekly</option>
                                                <option value="">Bi-Weekly</option>
                                                <option value="">Others</option>
                                            </select>
                                            <select name="payment-method" id="payment-method" class="">
                                                <option>Payment Method</option>
                                                <option value="">Check</option>
                                                <option value="">Wire</option>
                                                <option value="">Direct Deposit</option>
                                                <option value="">PayPal</option>
                                                <option value="">Payoneer</option>
                                                <option value="">Paxum</option>
                                                <option value="">ePayments</option>
                                                <option value="">WebMoney</option>
                                                <option value="">Skrill</option>
                                                <option value="">Others</option>
                                            </select>
                                        </div>
                                    </form>
                                    <div class="pay-ads-area"></div>
                                </div> -->
                                <h2 class="home-networks-title">Premium Networks</h2>
                                <div class="pay-premium-networks-posts">
                                    <div class="pay-premium-network-item">
                                            <div class="left">
                                                <a href="#networks">
                                                    <div class="logo">
                                                        <img src="/wp-content/uploads/2021/03/53bd8400a190fb0f246fafa1e2307131.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="middle">
                                                <div class="title-cat-rat">
                                                    <p class="title"><a href="#networks">DatingGold</a></p>
                                                    <div class="categories">
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/love.svg" alt="">
                                                            <span>Dating</span>
                                                        </p>
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/plus-18-movie.svg" alt="">
                                                            <span>Adult</span>
                                                        </p>
                                                    </div>
                                                    <p class="rating-count">4.22</p>
                                                </div>
                                                <div class="description">
                                                    <p>DatingGold is the premier dating affiliate program. Having been in business for nearly 20 years now, you’re sure to find.</p>
                                                </div>
                                                <div class="bottom-meta-content">
                                                    <p class="meta reviews-count">2880 Reviews</p>
                                                    <p class="meta offers-count">2880 Offers</p>
                                                    <p class="meta tracking-software">
                                                        <span>In-house</span>
                                                        <span>Cake</span>
                                                    </p>
                                                    <p class="meta payment-freq">
                                                        <span>Weekly</span>
                                                        <span>Net-30</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p class="rating">
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                </p>
                                                <p><a href="#join">Join</a></p>
                                            </div>
                                    </div>
                                    <div class="pay-premium-network-item">
                                            <div class="left">
                                                <a href="#networks">
                                                    <div class="logo">
                                                        <img src="/wp-content/uploads/2021/03/53bd8400a190fb0f246fafa1e2307131.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="middle">
                                                <div class="title-cat-rat">
                                                    <p class="title"><a href="#networks">DatingGold</a></p>
                                                    <div class="categories">
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/love.svg" alt="">
                                                            <span>Dating</span>
                                                        </p>
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/plus-18-movie.svg" alt="">
                                                            <span>Adult</span>
                                                        </p>
                                                    </div>
                                                    <p class="rating-count">4.22</p>
                                                </div>
                                                <div class="description">
                                                    <p>DatingGold is the premier dating affiliate program. Having been in business for nearly 20 years now, you’re sure to find.</p>
                                                </div>
                                                <div class="bottom-meta-content">
                                                    <p class="meta reviews-count">2880 Reviews</p>
                                                    <p class="meta offers-count">2880 Offers</p>
                                                    <p class="meta tracking-software">
                                                        <span>In-house</span>
                                                        <span>Cake</span>
                                                    </p>
                                                    <p class="meta payment-freq">
                                                        <span>Weekly</span>
                                                        <span>Net-30</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p class="rating">
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                </p>
                                                <p><a href="#join">Join</a></p>
                                            </div>
                                    </div>
                                    <div class="pay-premium-network-item">
                                            <div class="left">
                                                <a href="#networks">
                                                    <div class="logo">
                                                        <img src="/wp-content/uploads/2021/03/53bd8400a190fb0f246fafa1e2307131.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="middle">
                                                <div class="title-cat-rat">
                                                    <p class="title"><a href="#networks">DatingGold</a></p>
                                                    <div class="categories">
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/love.svg" alt="">
                                                            <span>Dating</span>
                                                        </p>
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/plus-18-movie.svg" alt="">
                                                            <span>Adult</span>
                                                        </p>
                                                    </div>
                                                    <p class="rating-count">4.22</p>
                                                </div>
                                                <div class="description">
                                                    <p>DatingGold is the premier dating affiliate program. Having been in business for nearly 20 years now, you’re sure to find.</p>
                                                </div>
                                                <div class="bottom-meta-content">
                                                    <p class="meta reviews-count">2880 Reviews</p>
                                                    <p class="meta offers-count">2880 Offers</p>
                                                    <p class="meta tracking-software">
                                                        <span>In-house</span>
                                                        <span>Cake</span>
                                                    </p>
                                                    <p class="meta payment-freq">
                                                        <span>Weekly</span>
                                                        <span>Net-30</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p class="rating">
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                </p>
                                                <p><a href="#join">Join</a></p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pay-premium-networks-section">
                            <div class="pay-premium-networks-wrap">
                                <h2 class="home-networks-title">Advertising Networks</h2>
                                <div class="pay-premium-networks-posts">
                                    <div class="pay-premium-network-item">
                                            <div class="left">
                                                <a href="#networks">
                                                    <div class="logo">
                                                        <img src="/wp-content/uploads/2021/03/53bd8400a190fb0f246fafa1e2307131.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="middle">
                                                <div class="title-cat-rat">
                                                    <p class="title"><a href="#networks">DatingGold</a></p>
                                                    <div class="categories">
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/love.svg" alt="">
                                                            <span>Dating</span>
                                                        </p>
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/plus-18-movie.svg" alt="">
                                                            <span>Adult</span>
                                                        </p>
                                                    </div>
                                                    <p class="rating-count">4.22</p>
                                                </div>
                                                <div class="description">
                                                    <p>DatingGold is the premier dating affiliate program. Having been in business for nearly 20 years now, you’re sure to find.</p>
                                                </div>
                                                <div class="bottom-meta-content">
                                                    <p class="meta reviews-count">2880 Reviews</p>
                                                    <p class="meta offers-count">2880 Offers</p>
                                                    <p class="meta tracking-software">
                                                        <span>In-house</span>
                                                        <span>Cake</span>
                                                    </p>
                                                    <p class="meta payment-freq">
                                                        <span>Weekly</span>
                                                        <span>Net-30</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p class="rating">
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                </p>
                                                <p><a href="#join">Join</a></p>
                                            </div>
                                    </div>
                                    <div class="pay-premium-network-item">
                                            <div class="left">
                                                <a href="#networks">
                                                    <div class="logo">
                                                        <img src="/wp-content/uploads/2021/03/53bd8400a190fb0f246fafa1e2307131.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="middle">
                                                <div class="title-cat-rat">
                                                    <p class="title"><a href="#networks">DatingGold</a></p>
                                                    <div class="categories">
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/love.svg" alt="">
                                                            <span>Dating</span>
                                                        </p>
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/plus-18-movie.svg" alt="">
                                                            <span>Adult</span>
                                                        </p>
                                                    </div>
                                                    <p class="rating-count">4.22</p>
                                                </div>
                                                <div class="description">
                                                    <p>DatingGold is the premier dating affiliate program. Having been in business for nearly 20 years now, you’re sure to find.</p>
                                                </div>
                                                <div class="bottom-meta-content">
                                                    <p class="meta reviews-count">2880 Reviews</p>
                                                    <p class="meta offers-count">2880 Offers</p>
                                                    <p class="meta tracking-software">
                                                        <span>In-house</span>
                                                        <span>Cake</span>
                                                    </p>
                                                    <p class="meta payment-freq">
                                                        <span>Weekly</span>
                                                        <span>Net-30</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p class="rating">
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                </p>
                                                <p><a href="#join">Join</a></p>
                                            </div>
                                    </div>
                                    <div class="pay-premium-network-item">
                                            <div class="left">
                                                <a href="#networks">
                                                    <div class="logo">
                                                        <img src="/wp-content/uploads/2021/03/53bd8400a190fb0f246fafa1e2307131.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="middle">
                                                <div class="title-cat-rat">
                                                    <p class="title"><a href="#networks">DatingGold</a></p>
                                                    <div class="categories">
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/love.svg" alt="">
                                                            <span>Dating</span>
                                                        </p>
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/plus-18-movie.svg" alt="">
                                                            <span>Adult</span>
                                                        </p>
                                                    </div>
                                                    <p class="rating-count">4.22</p>
                                                </div>
                                                <div class="description">
                                                    <p>DatingGold is the premier dating affiliate program. Having been in business for nearly 20 years now, you’re sure to find.</p>
                                                </div>
                                                <div class="bottom-meta-content">
                                                    <p class="meta reviews-count">2880 Reviews</p>
                                                    <p class="meta offers-count">2880 Offers</p>
                                                    <p class="meta tracking-software">
                                                        <span>In-house</span>
                                                        <span>Cake</span>
                                                    </p>
                                                    <p class="meta payment-freq">
                                                        <span>Weekly</span>
                                                        <span>Net-30</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p class="rating">
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                </p>
                                                <p><a href="#join">Join</a></p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pay-premium-networks-section">
                            <div class="pay-premium-networks-wrap">
                                <h2 class="home-networks-title">Affiliate Programs</h2>
                                <div class="pay-premium-networks-posts">
                                    <div class="pay-premium-network-item">
                                            <div class="left">
                                                <a href="#networks">
                                                    <div class="logo">
                                                        <img src="/wp-content/uploads/2021/03/53bd8400a190fb0f246fafa1e2307131.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="middle">
                                                <div class="title-cat-rat">
                                                    <p class="title"><a href="#networks">DatingGold</a></p>
                                                    <div class="categories">
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/love.svg" alt="">
                                                            <span>Dating</span>
                                                        </p>
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/plus-18-movie.svg" alt="">
                                                            <span>Adult</span>
                                                        </p>
                                                    </div>
                                                    <p class="rating-count">4.22</p>
                                                </div>
                                                <div class="description">
                                                    <p>DatingGold is the premier dating affiliate program. Having been in business for nearly 20 years now, you’re sure to find.</p>
                                                </div>
                                                <div class="bottom-meta-content">
                                                    <p class="meta reviews-count">2880 Reviews</p>
                                                    <p class="meta offers-count">2880 Offers</p>
                                                    <p class="meta tracking-software">
                                                        <span>In-house</span>
                                                        <span>Cake</span>
                                                    </p>
                                                    <p class="meta payment-freq">
                                                        <span>Weekly</span>
                                                        <span>Net-30</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p class="rating">
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                </p>
                                                <p><a href="#join">Join</a></p>
                                            </div>
                                    </div>
                                    <div class="pay-premium-network-item">
                                            <div class="left">
                                                <a href="#networks">
                                                    <div class="logo">
                                                        <img src="/wp-content/uploads/2021/03/53bd8400a190fb0f246fafa1e2307131.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="middle">
                                                <div class="title-cat-rat">
                                                    <p class="title"><a href="#networks">DatingGold</a></p>
                                                    <div class="categories">
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/love.svg" alt="">
                                                            <span>Dating</span>
                                                        </p>
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/plus-18-movie.svg" alt="">
                                                            <span>Adult</span>
                                                        </p>
                                                    </div>
                                                    <p class="rating-count">4.22</p>
                                                </div>
                                                <div class="description">
                                                    <p>DatingGold is the premier dating affiliate program. Having been in business for nearly 20 years now, you’re sure to find.</p>
                                                </div>
                                                <div class="bottom-meta-content">
                                                    <p class="meta reviews-count">2880 Reviews</p>
                                                    <p class="meta offers-count">2880 Offers</p>
                                                    <p class="meta tracking-software">
                                                        <span>In-house</span>
                                                        <span>Cake</span>
                                                    </p>
                                                    <p class="meta payment-freq">
                                                        <span>Weekly</span>
                                                        <span>Net-30</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p class="rating">
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                </p>
                                                <p><a href="#join">Join</a></p>
                                            </div>
                                    </div>
                                    <div class="pay-premium-network-item">
                                            <div class="left">
                                                <a href="#networks">
                                                    <div class="logo">
                                                        <img src="/wp-content/uploads/2021/03/53bd8400a190fb0f246fafa1e2307131.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="middle">
                                                <div class="title-cat-rat">
                                                    <p class="title"><a href="#networks">DatingGold</a></p>
                                                    <div class="categories">
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/love.svg" alt="">
                                                            <span>Dating</span>
                                                        </p>
                                                        <p>
                                                            <img width="15px" height="15px" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/plus-18-movie.svg" alt="">
                                                            <span>Adult</span>
                                                        </p>
                                                    </div>
                                                    <p class="rating-count">4.22</p>
                                                </div>
                                                <div class="description">
                                                    <p>DatingGold is the premier dating affiliate program. Having been in business for nearly 20 years now, you’re sure to find.</p>
                                                </div>
                                                <div class="bottom-meta-content">
                                                    <p class="meta reviews-count">2880 Reviews</p>
                                                    <p class="meta offers-count">2880 Offers</p>
                                                    <p class="meta tracking-software">
                                                        <span>In-house</span>
                                                        <span>Cake</span>
                                                    </p>
                                                    <p class="meta payment-freq">
                                                        <span>Weekly</span>
                                                        <span>Net-30</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <p class="rating">
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                    <span><i class="icofont-star"></i></span>
                                                </p>
                                                <p><a href="#join">Join</a></p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php
						// while ( have_posts() ) :
						// 	the_post();

						// 	get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							// if ( comments_open() || get_comments_number() ) :
							// 	comments_template();
							// endif;

						//endwhile; // End of the loop.
						?>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
