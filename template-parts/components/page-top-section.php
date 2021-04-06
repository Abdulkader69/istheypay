<div class="pay-home-top-section">
    <div class="pay-top-five-networks">
        <?php
        $network = new Network();
        $random5NetworkssID = get_field('5_random_networks', 'option', false, false);
        $random5Networkss = new WP_Query(array(
            'post_type'      	=> 'networks',
            'posts_per_page'	=> 5,
            'post__in'			=> $random5NetworkssID,
            'post_status'		=> 'publish',
            'orderby'        	=> 'rand',
        ));
        if( $random5Networkss->have_posts() ): ?>
            <div class="pay-top-five-networks-inner">
                <ul class="pay-top-five-left">
                    <?php while ( $random5Networkss->have_posts() ) : $random5Networkss->the_post(); ?>
                        <li class="pay-top-five-title" data-tab="tab-<?php echo get_the_ID(); ?>">
                            <span class="logo"><img src="<?php echo get_field( 'networks_favicon', get_the_ID() ); ?>" alt=""></span>
                            <span><?php echo get_field( 'afn_name', get_the_ID() ); ?></span>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <ul class="pay-top-five-right">
                    <?php 
                    while ( $random5Networkss->have_posts() ) : $random5Networkss->the_post();
                    $average = $network->get_rating( get_the_ID() );
                    $permalink = get_permalink( get_the_ID() ); ?>
                        <li id="tab-<?php echo get_the_ID(); ?>" class="pay-top-five-hover-state">
                            <div class="main-logo"><img src="<?php echo get_field( 'networks_logo', get_the_ID() ); ?>" alt=""></div>
                            <div class="rating-chart">
                                <?php 
                                    $overall_ratting = $average;
                                    $rating_for_chart = $overall_ratting * 20;
                                ?>
                                <div class="chart" data-percent="<?php echo $rating_for_chart; ?>" data-scale-color="red"><span><?php echo $overall_ratting; ?></span></div>
                            </div>
                            <div class="reviews-calc-rat">
                                <span><?php echo $network->get_total_rating_count( get_the_ID() ); ?> Reviews / </span>
                                <span><?php echo $overall_ratting; ?></span>
                            </div>
                            <div class="btn">
                                <a href="<?php echo $permalink; ?>">Details</a>
                            </div>
                        </li>
                    <?php endwhile; ?>
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
                    </div>
                <?php endforeach; ?>
            </div>
        <?php wp_reset_postdata();
        endif; ?>
    </div>
</div>