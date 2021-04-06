<?php
$args    = array(
	'post_type'      => 'networks',
	'posts_per_page' => 10,
	'post_status'    => 'publish',
	'meta_key'       => 'average_rating',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC',
	'category' 		 => 'affiliate-networks', 
);
$query   = new WP_Query( $args );
$network = new Network();
?>

<div class="pay-sidebar-top-rated-networks-wrap pay-sidebar-item">
    <h2 class="title">Top 10 Rated Networks</h2>
	<?php if ( $query->have_posts() ) : ?>
        <div class="pay-top-rated-networks-wrap">
			<?php
			$count = 1;
			while ( $query->have_posts() ) : $query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="pay-top-rated-network-item">
                    <div class="left">
                        <p class="count-rank"><?php echo $count; ?></p>
                        <p class="title">
							<?php the_title(); ?>
                            <span class="reviews-count">(<?php echo $network->get_total_rating_count( get_the_ID() ); ?>)</span>
                        </p>
                    </div>
                    <p class="calculated-rating"><?php the_field( 'average_rating' ); ?></p>
                </a>
				<?php
				$count ++;
			endwhile; ?>
        </div>
	<?php endif; ?>
</div>