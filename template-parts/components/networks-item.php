<?php 
$post_type = get_post_type(get_the_ID());   
$taxonomies = get_object_taxonomies($post_type);   
$taxonomy_names = wp_get_object_terms( get_the_ID(), $taxonomies ); 
$network = new Network();
$average = $network->get_rating( get_the_ID() );
?>
<div class="pay-premium-network-item">
    <?php if ( get_field( 'sponsored' ) ): ?>
        <div class="sponsored"><p>SPONSORED</p></div>
    <?php endif; ?>
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
                <div class="categories">
                    <?php 
                        foreach ($taxonomy_names as $tax ) {
                            if ($tax->parent != 0) { // avoid parent categories
                                $tax_slug = $tax->slug;
                                if( $tax_slug == 'adult' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-adult">18</i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'biz-opp' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-bill-alt"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'crypto' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-bitcoin"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'dating' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-ui-love"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'ecommerce' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-shopping-cart"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'education' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-hat-alt"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'finance' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-dollar"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'forex-trading' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-chart-histogram-alt"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'gambling' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-dice"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'game' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-ui-game"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'health-nutra' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-doctor"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'incentive' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-recycle"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'mobile' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-ui-touch-phone"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'pay-per-call' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-ui-call"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'survey' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-chart-histogram-alt"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'sweepstakes' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-bill-alt"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                                if( $tax_slug == 'travel' ) { ?>
                                    <p>
                                        <span class="icon"><i class="icofont-airplane-alt"></i></span>
                                        <span><?php echo $tax->name; ?></span>
                                    </p>
                                <?php }
                            }
                        }
                    ?>
                </div>
            <p class="rating-count"><?php echo $average; ?></p>
        </div>
        <div class="description">
            <p><?php the_field('afn_network_description'); ?></p>
        </div>
        <div class="bottom-meta-content">
            <p class="meta reviews-count"><?php echo $network->get_total_rating_count( get_the_ID() ); ?> Reviews</p>
            <?php 
                $networksType = get_field( 'network_program_type' );
                if( '1' == $networksType ) { ?>
                    <p class="meta offers-count">
                        <?php the_field('afn_offers_in_your_network'); ?>
                    Offers</p>
                <?php }
            ?>    
            <?php 
                $networksType = get_field( 'network_program_type' );
                if( '1' == $networksType ) { ?>
                    <p class="meta tracking-software"><?php the_field('afn_tracking_software'); ?></p>
                <?php } elseif( '2' == $networksType ) { ?>
                    <p class="meta tracking-software"><?php the_field('afp_base_commission'); ?></p>
                <?php } elseif( '3' == $networksType ) { ?>
                    <p class="meta tracking-software"><?php the_field('adn_fa_minimum_deposit'); ?></p>
                <?php }
            ?>
            <p class="meta payment-freq">
                <?php 
                    $networksType = get_field( 'network_program_type' );
                    if( '1' == $networksType ) { ?>
                        <?php the_field('afn_payment_frequency'); ?>
                    <?php } elseif( '2' == $networksType ) { ?>
                        <?php the_field('afp_payment_frequency'); ?>
                    <?php } elseif( '3' == $networksType ) { ?>
                        <?php the_field('adn_fp_payment_frequency'); ?>
                    <?php }
                ?>
            </p>
        </div>
    </div>
    <div class="right">
        <p class="rating <?php echo 'rat' . round( $average ); ?>">
            <span><i class="icofont-star"></i></span>
            <span><i class="icofont-star"></i></span>
            <span><i class="icofont-star"></i></span>
            <span><i class="icofont-star"></i></span>
            <span><i class="icofont-star"></i></span>
        </p>
        <?php 
            $networksType = get_field( 'network_program_type' );
            if( '1' == $networksType ) { ?>
                <p><a href="<?php the_field('afn_network_url'); ?>">Join</a></p>
            <?php } elseif( '2' == $networksType ) { ?>
                <p><a href="<?php the_field('afp_program_url'); ?>">Join</a></p>
            <?php } elseif( '3' == $networksType ) { ?>
                <p><a href="<?php the_field('adn_network_url'); ?>">Join</a></p>
            <?php }
        ?>
    </div>
</div>