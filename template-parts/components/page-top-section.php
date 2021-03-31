<div class="pay-home-top-section">
    <div class="pay-top-five-networks">
        <?php
        $network = new Network();
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
                    $average = $network->get_rating( $random5Networks->ID );
                    $permalink = get_permalink( $random5Networks->ID );
                    setup_postdata($random5Networks); ?>
                        <li id="tab-<?php echo $random5Networks->ID; ?>" class="pay-top-five-hover-state">
                            <div class="main-logo"><img src="<?php echo get_field( 'networks_logo', $random5Networks->ID ); ?>" alt=""></div>
                            <div class="rating-chart">
                                <?php 
                                    $overall_ratting = $average;
                                    $rating_for_chart = $overall_ratting * 20;
                                ?>
                                <div class="chart" data-percent="<?php echo $rating_for_chart; ?>" data-scale-color="red"><span><?php echo $overall_ratting; ?></span></div>
                            </div>
                            <div class="reviews-calc-rat">
                                <span><?php echo $network->get_total_rating_count( $random5Networks->ID ); ?> Reviews / </span>
                                <span><?php echo $overall_ratting; ?></span>
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
                    </div>
                <?php endforeach; ?>
            </div>
        <?php wp_reset_postdata();
        endif; ?>
    </div>
</div>