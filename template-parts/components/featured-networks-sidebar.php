<?php
$featured_networks = get_field('featured_networks', 'option');
if( $featured_networks ): ?>
    <div class="pay-sidebar-featured-networks-wrap pay-sidebar-item">
        <h2 class="title">Featured Networks</h2>
        <div class="pay-featured-networks-wrap">
            <?php foreach( $featured_networks as $featured_network ): 
            setup_postdata($featured_network); ?>
                <div class="pay-featured-network-item">
                    <a href="<?php the_permalink( $featured_network->ID ) ?>">
                        <div class="pay-featured-n-inner">
                            <?php $logo = get_field( 'networks_favicon', $featured_network->ID ); 
                            if( ! $logo == '' ) : ?>
                                <div class="logo"><img src="<?php echo $logo; ?>" alt="<?php echo $featured_network->post_title ?>"></div>
                            <?php endif; ?>
                            <div class="title"><a href="<?php the_permalink( $featured_network->ID ) ?>"><h3><?php echo $featured_network->post_title ?></h3></a></div>
                            <div class="overall-rating"><p>4.89</p></div>
                            <?php $networksType = get_field( 'network_program_type', $featured_network->ID );
                            if( '1' == $networksType ) { ?>
                                <?php $joinBtn = get_field('afn_network_url', $featured_network->ID ); 
                                if( ! $joinBtn == '' ) : ?>
                                    <div class="join-btn"><a href="<?php echo $joinBtn; ?>">Join</a></div>
                                <?php endif; ?>
                            <?php } elseif( '2' == $networksType ) { ?>
                                <?php $joinBtn = get_field('afp_program_url', $featured_network->ID ); 
                                if( ! $joinBtn == '' ) : ?>
                                    <div class="join-btn"><a href="<?php echo $joinBtn; ?>">Join</a></div>
                                <?php endif; ?>
                            <?php } elseif( '3' == $networksType ) { ?>
                                <?php $joinBtn = get_field('adn_network_url', $featured_network->ID ); 
                                if( ! $joinBtn == '' ) : ?>
                                    <div class="join-btn"><a href="<?php echo $joinBtn; ?>">Join</a></div>
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php wp_reset_postdata();
endif; ?>