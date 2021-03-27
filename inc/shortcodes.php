<?php 
function pay_networks_shortcodes_func( $atts ) {
	$atts = shortcode_atts( array(
        'filter' => 'true',
        'category' => '',
    ), $atts, 'pay_networks_shortcodes' );

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args = array(
		'post_type'      => 'networks',
		'posts_per_page' => 5,
		'order'          => 'DESC',
		'post_status'    => 'publish',
		'paged'          => $paged,
	);

	ob_start();
	?>

    <?php $networks = new WP_Query( $args );

    if ( $networks->have_posts() ) : ?>
        <section id="pay-networks-filter-wrap">
            <div class="pay-networks-row">
                <?php
                while ( $networks->have_posts() ) : $networks->the_post();
                    get_template_part( 'template-parts/components/networks', 'item' );
                endwhile;
                ?>
            </div>

            <div class="pagination-wrap">
                <?php
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'    => '/paged/%#%',
                    'current'   => max( 1, $paged ),
                    'total'     => $networks->max_num_pages,
                    'prev_text' => '<',
                    'next_text' => '>',
                    'type'      => 'list',
                    'mid_size'  => 2,
                    'end_size'  => 1
                ) );
                ?>
            </div>
    <?php else: ?>
            <h3 class="no-networks-found">No Networks Found</h3>
        </section>
    <?php endif; ?>

	<?php wp_reset_postdata();
	return ob_get_clean();
}

add_shortcode( 'pay_networks_shortcodes', 'pay_networks_shortcodes_func' );


// Blogs Post Shortcodes Func
function pay_blogs_shortcodes_func( $atts ) {
	$atts = shortcode_atts( array(
        'filter' => 'true',
        'category' => '',
    ), $atts, 'pay_blog_shortcodes' );

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 10,
		'order'          => 'DESC',
		'post_status'    => 'publish',
		'paged'          => $paged,
	);

	ob_start();
	?>

    <?php $blogs = new WP_Query( $args );

    if ( $blogs->have_posts() ) : ?>
        <section id="pay-blogs-filter-wrap">
            <div class="pay-blogs-row">
                <?php
                while ( $blogs->have_posts() ) : $blogs->the_post();
                    get_template_part( 'template-parts/components/blog', 'item' );
                endwhile;
                ?>
            </div>

            <div class="pagination-wrap">
                <?php
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'    => '/paged/%#%',
                    'current'   => max( 1, $paged ),
                    'total'     => $blogs->max_num_pages,
                    'prev_text' => '<',
                    'next_text' => '>',
                    'type'      => 'list',
                    'mid_size'  => 2,
                    'end_size'  => 1
                ) );
                ?>
            </div>
    <?php else: ?>
            <h3 class="no-networks-found">No Blogs Found</h3>
        </section>
    <?php endif; ?>

	<?php wp_reset_postdata();
	return ob_get_clean();
}

add_shortcode( 'pay_blog_shortcodes', 'pay_blogs_shortcodes_func' );


// Review Sidebar Shortcodes Func
function pay_review_sidebar_shortcodes_func( $atts ) {
	$atts = shortcode_atts( array(), $atts, 'pay_review_sidebar_shortcodes' );

	$args = array(
		'post_type'      => 'review',
		'posts_per_page' => 5,
		'order'          => 'DESC',
		'post_status'    => 'publish',
	);

	ob_start();
	?>

    <?php $review_sidebar = new WP_Query( $args );

    if ( $review_sidebar->have_posts() ) : ?>
    <div class="pay-sidebar-recent-reviews-wrap pay-sidebar-item">
        <h2 class="title">Recent Reviews</h2>
        <div class="pay-recent-reviews-wrap">
            <?php
            while ( $review_sidebar->have_posts() ) : $review_sidebar->the_post(); ?>
                
                <div class="pay-recent-review-item">
                    <div class="left">
                        <span><i class="icofont-waiter"></i></span>
                    </div>
                    <div class="right">
                        <div class="titles"><?php the_field( 'name' ); ?> @<span>AdsMain</span></div>
                        <div class="rat-time">
                            <?php 
                            $rating = get_field( 'overall_rating' );
                            if( !$rating == '') { ?>
                                <p class="rating rat<?php echo $rating; ?>">
                                    <span><i class="icofont-star"></i></span>
                                    <span><i class="icofont-star"></i></span>
                                    <span><i class="icofont-star"></i></span>
                                    <span><i class="icofont-star"></i></span>
                                    <span><i class="icofont-star"></i></span>
                                </p>
                            <?php } ?>
                            <span><?php echo get_the_date( 'j M, Y' ); ?></span>
                        </div>
                        <?php 
                        $your_review = get_field( 'your_review' );
                        if( !$your_review == '') { ?>
                            <div class="content">
                                <?php echo $your_review; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
        <a class="pay-sidebar-reviews-page-btn" href="/reviews">More Reviews</a>
    </div>
    <?php endif; ?>

	<?php wp_reset_postdata();
	return ob_get_clean();
}

add_shortcode( 'pay_review_sidebar_shortcodes', 'pay_review_sidebar_shortcodes_func' );


// Review Shortcodes Func
function pay_review_shortcodes_func( $atts ) {
	$atts = shortcode_atts( array(), $atts, 'pay_review_shortcodes' );

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args = array(
		'post_type'      => 'review',
		'posts_per_page' => -1,
		'order'          => 'DESC',
		'post_status'    => 'publish',
        'paged'          => $paged,
	);

	ob_start();
	?>

    <?php $review = new WP_Query( $args ); ?>
    <section id="pay-review-filter-wrap">
        <?php if ( $review->have_posts() ) : ?>
            <div class="pay-reviews-wrap">
                <?php
                while ( $review->have_posts() ) : $review->the_post(); 
                    
                    get_template_part( 'template-parts/components/review', 'item' );

                endwhile; ?>
            </div>
            <div class="pagination-wrap">
                <?php
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'    => '/paged/%#%',
                    'current'   => max( 1, $paged ),
                    'total'     => $review->max_num_pages,
                    'prev_text' => '<',
                    'next_text' => '>',
                    'type'      => 'list',
                    'mid_size'  => 2,
                    'end_size'  => 1
                ) );
                ?>
            </div>
        <?php else: ?>
            <h3 class="no-networks-found">No Review Found</h3>
        <?php endif; ?>
    </section>

	<?php wp_reset_postdata();
	return ob_get_clean();
}

add_shortcode( 'pay_review_shortcodes', 'pay_review_shortcodes_func' );



// Review Sidebar Shortcodes Func
function pay_premium_networks_shortcodes_func( $atts ) {
	$atts = shortcode_atts( array(
        'category' => 'affiliate-networks',
    ), $atts, 'pay_premium_networks_shortcodes' );

	$args = array(
		'post_type'      => 'networks',
		'posts_per_page' => 15,
		'order'          => 'DESC',
		'post_status'    => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'network_category',
                'field'    => 'slug',
                'terms'    => $atts['category'],
            ),
        ),
	);

	ob_start();
	?>

    <?php $premium_networks = new WP_Query( $args );
    // echo '<pre>';
    // print_r($premium_networks);
    // echo '</pre>';
    if ( $premium_networks->have_posts() ) : ?>
    <div class="pay-premium-networks-wrap">
        <h2 class="home-networks-title">Premium Networks</h2>
        <div class="pay-premium-networks-posts">
            <?php
            while ( $premium_networks->have_posts() ) : $premium_networks->the_post(); 
                $post_type = get_post_type(get_the_ID());   
                $taxonomies = get_object_taxonomies($post_type);   
                $taxonomy_names = wp_get_object_terms( get_the_ID(), $taxonomies ); 
            ?>
                
                <div class="pay-premium-network-item">
                    <div class="left">
                        <a href="<?php the_permalink(); ?>">
                            <div class="logo">
                                <?php 
                                $networks_thumbnail = get_field( 'networks_thumbnail' );
                                if( !$networks_thumbnail == '') { ?>
                                    <img src="<?php echo $networks_thumbnail ?>" alt="<?php the_title(); ?>">
                                <?php } ?>
                            </div>
                        </a>
                    </div>
                    <div class="middle">
                        <div class="title-cat-rat">
                            <p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                            <?php if ( $atts['category'] == 'affiliate-networks' ) : ?>
                                <div class="categories">
                                    <?php 
                                        foreach ($taxonomy_names as $tax ) {
                                            if ($tax->parent != 0) { // avoid parent categories
                                                // print_r($tax->name);
                                                $tax_slug = $tax->slug;
                                                if( $tax_slug == 'adult' ) { ?>
                                                    <p>
                                                        <i class="icofont-adult">a</i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'biz-opp' ) { ?>
                                                    <p>
                                                        <i class="icofont-bill-alt"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'crypto' ) { ?>
                                                    <p>
                                                        <i class="icofont-bitcoin"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'dating' ) { ?>
                                                    <p>
                                                        <i class="icofont-ui-love"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'ecommerce' ) { ?>
                                                    <p>
                                                        <i class="icofont-shopping-cart"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'education' ) { ?>
                                                    <p>
                                                        <i class="icofont-hat-alt"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'finance' ) { ?>
                                                    <p>
                                                        <i class="icofont-dollar"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'forex-trading' ) { ?>
                                                    <p>
                                                        <i class="icofont-chart-histogram-alt"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'gambling' ) { ?>
                                                    <p>
                                                        <i class="icofont-dice"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'game' ) { ?>
                                                    <p>
                                                        <i class="icofont-ui-game"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'health-nutra' ) { ?>
                                                    <p>
                                                        <i class="icofont-doctor"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'incentive' ) { ?>
                                                    <p>
                                                        <i class="icofont-recycle"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'mobile' ) { ?>
                                                    <p>
                                                        <i class="icofont-ui-touch-phone"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'pay-per-call' ) { ?>
                                                    <p>
                                                        <i class="icofont-ui-call"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'survey' ) { ?>
                                                    <p>
                                                        <i class="icofont-chart-histogram-alt"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'sweepstakes' ) { ?>
                                                    <p>
                                                        <i class="icofont-sweepstakes">s</i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                                if( $tax_slug == 'travel' ) { ?>
                                                    <p>
                                                        <i class="icofont-airplane-alt"></i>
                                                        <span><?php echo $tax->name; ?></span>
                                                    </p>
                                                <?php }
                                            }
                                        }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <p class="rating-count">4.22</p>
                        </div>
                        <div class="description">
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
                        <div class="bottom-meta-content">
                            <p class="meta reviews-count">2880 Reviews</p>
                            <p class="meta offers-count">
                            <?php 
                                $networksType = get_field( 'network_program_type' );
                                if( '1' == $networksType ) { ?>
                                    <?php the_field('afn_offers_in_your_network'); ?>
                                <?php }
                            ?>    
                            Offers</p>
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

            <?php endwhile; ?>
        </div>
        <a class="pay-sidebar-reviews-page-btn" href="/affiliate-networks">More Reviews</a>
    </div>
    <?php endif; ?>

	<?php wp_reset_postdata();
	return ob_get_clean();
}

add_shortcode( 'pay_premium_networks_shortcodes', 'pay_premium_networks_shortcodes_func' );