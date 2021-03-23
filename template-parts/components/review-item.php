<div class="pay-sn-review-item">
    <div class="avatar"><span><i class="icofont-waiter"></i></span></div>
    <div class="pay-sn-review-context">
        <div class="pay-sn-review-metas">
            <div class="rat-title">
                <div class="left">
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
                    <h4><?php the_field( 'name' ); ?></h4>
                </div>
                <div class="pay-sn-review-time">
                    <p><?php echo get_the_date( 'j M, Y' ); ?></p>
                </div>  
            </div>
            <div class="pay-about-sn">
                <?php $offers = get_field( 'offers_rating' );
                if( !$offers == '') { ?>
                    <p>Offers <span><?php echo $offers; ?></span></p>
                <?php } ?>
                <?php $payout = get_field( 'payout_rating' );
                if( !$payout == '') { ?>
                    <p>PAYOUT <span><?php echo $payout; ?></span></p>
                <?php } ?>
                <?php $tracking = get_field( 'tracking_rating' );
                if( !$tracking == '') { ?>
                    <p>TRACKING <span><?php echo $tracking; ?></span></p>
                <?php } ?>
                <?php $support = get_field( 'support_rating' );
                if( !$support == '') { ?>
                    <p>SUPPORT <span><?php echo $support; ?></span></p>
                <?php } ?>
            </div>
        </div>
        <div class="pay-sn-review-content">
            <?php 
            $your_review = get_field( 'your_review' );
            if( !$your_review == '') { ?>
                <p class="messages">
                    <?php echo $your_review; ?>
                </p>
            <?php } ?>
            <div class="like-dislike-btn">
                <p class="like"><i class="icofont-thumbs-up"></i> (0)</p>
                <p class="dislike"><i class="icofont-thumbs-down"></i> (0)</p>
            </div>
        </div>
    </div>
</div>


<div class="pay-sn-review-item">
    <div class="avatar"><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/03/avatar3.png" alt=""></div>
    <div class="pay-sn-review-context">
        <div class="pay-sn-review-metas">
            <div class="rat-title">
                <div class="left">
                    <p class="rating">
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                    </p>
                    <h4>Reviewer Name</h4>
                </div>
                <div class="pay-sn-review-time">
                    <p><?php the_time('M d y'); ?></p>
                </div>  
            </div>
            <div class="pay-about-sn">
                <p>
                    Offers
                    <span>5</span>
                </p>
                <p>
                    PAYOUT
                    <span>4</span>
                </p>
                <p>
                    TRACKING
                    <span>3</span>
                </p>
                <p>
                    SUPPORT
                    <span>5</span>
                </p>
            </div>
        </div>
        <div class="pay-sn-review-content">
            <p class="messages">Excellent company that always pay on time! Thank you for your TOP service, AdsMain! Please use this link for signup - https://bit.ly/3cPgiaB</p>
            <div class="paymrnt-proof">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/03/avatar3.png" alt="">
            </div>
            <div class="like-dislike-btn">
                <p class="like"><i class="icofont-thumbs-up"></i> (0)</p>
                <p class="dislike"><i class="icofont-thumbs-down"></i> (0)</p>
            </div>
        </div>
    </div>
</div>

<div class="pay-sn-review-item">
    <div class="avatar"><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/03/avatar3.png" alt=""></div>
    <div class="pay-sn-review-context">
        <div class="pay-sn-review-metas">
            <div class="rat-title">
                <div class="left">
                    <p class="rating">
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                        <span><i class="icofont-star"></i></span>
                    </p>
                    <h4>Reviewer Name</h4>
                </div>
                <div class="pay-sn-review-time">
                    <p><?php the_time('M d y'); ?></p>
                </div>  
            </div>
            <div class="pay-about-sn">
                <p>
                    Offers
                    <span>5</span>
                </p>
                <p>
                    PAYOUT
                    <span>4</span>
                </p>
                <p>
                    TRACKING
                    <span>3</span>
                </p>
                <p>
                    SUPPORT
                    <span>5</span>
                </p>
            </div>
        </div>
        <div class="pay-sn-review-content">
            <p class="messages">Excellent company that always pay on time! Thank you for your TOP service, AdsMain! Please use this link for signup - https://bit.ly/3cPgiaB</p>
            <div class="like-dislike-btn">
                <p class="like"><i class="icofont-thumbs-up"></i> (0)</p>
                <p class="dislike"><i class="icofont-thumbs-down"></i> (0)</p>
            </div>
        </div>
    </div>
</div>