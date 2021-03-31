<?php 
$review = new Review();
$network_title = $review->get_network( get_the_ID())->post_title;
$network_url = $review->get_network( get_the_ID())->post_name;
?>
<div class="pay-sn-review-item">
    <div class="avatar"><span><i class="icofont-waiter"></i></span></div>
    <div class="pay-sn-review-context">
        <div class="pay-sn-review-metas">
            <div class="rat-title">
                <div class="left">
					<?php
					$rating = get_field( 'overall_rating' );
					if ( $rating != '' ) { ?>
                        <p class="rating rat<?php echo $rating; ?>">
                            <span><i class="icofont-star"></i></span>
                            <span><i class="icofont-star"></i></span>
                            <span><i class="icofont-star"></i></span>
                            <span><i class="icofont-star"></i></span>
                            <span><i class="icofont-star"></i></span>
                        </p>
					<?php } ?>
                    <h4><?php the_field( 'name' ); ?> @ <a href="/networks/<?php echo $network_url; ?>/#single-review"><?php echo $network_title; ?></a></h4>
                </div>
                <div class="pay-sn-review-time">
                    <p><?php echo get_the_date( 'j M, Y' ); ?></p>
                </div>
            </div>
            <div class="pay-about-sn">
				<?php $offers = get_field( 'offers_rating' );
				if ( $offers != '' ) { ?>
                    <p>Offers <span><?php echo $offers; ?></span></p>
				<?php } ?>
				<?php $payout = get_field( 'payout_rating' );
				if ( $payout != '' ) { ?>
                    <p>PAYOUT <span><?php echo $payout; ?></span></p>
				<?php } ?>
				<?php $tracking = get_field( 'tracking_rating' );
				if ( $tracking != '' ) { ?>
                    <p>TRACKING <span><?php echo $tracking; ?></span></p>
				<?php } ?>
				<?php $support = get_field( 'support_rating' );
				if ( $support != '' ) { ?>
                    <p>SUPPORT <span><?php echo $support; ?></span></p>
				<?php } ?>
            </div>
        </div>
        <div class="pay-sn-review-content">
			<?php
			$your_review = get_field( 'your_review' );
			if ( $your_review != '' ) { ?>
                <p class="messages">
					<?php echo $your_review; ?>
                </p>
			<?php } ?>

			<?php if ( get_field( 'payment_screenshot' ) ) : ?>
                <div class="paymrnt-proof">
                    <a href="<?php the_field( 'payment_screenshot' ); ?>"><img src="<?php the_field( 'payment_screenshot' ); ?>" alt="Review Image"></a>
                </div>
			<?php endif; ?>

            <!--            <div class="like-dislike-btn">-->
            <!--                <p class="like"><i class="icofont-thumbs-up"></i> (0)</p>-->
            <!--                <p class="dislike"><i class="icofont-thumbs-down"></i> (0)</p>-->
            <!--            </div>-->
        </div>
    </div>
</div>