<?php
$featured_networks = get_field('featured_networks', 'option');
if( $featured_networks ): ?>
    <div class="pay-sidebar-featured-networks-wrap pay-sidebar-item">
        <h2 class="title">Featured Networks</h2>
        <div class="pay-featured-networks-wrap">
            <?php foreach( $featured_networks as $featured_network ): 
            setup_postdata($featured_network); ?>
                <div class="pay-featured-network-item">
                    <div class="logo"></div>
                    <div class="title"><a href="<?php echo $featured_network->guid ?>"><h3><?php echo $featured_network->post_title ?></h3></a></div>
                    <div class="overall-rating"><p>4.89</p></div>
                    <div class="join-btn"><a href="#">Join</a></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php wp_reset_postdata();
endif; ?>