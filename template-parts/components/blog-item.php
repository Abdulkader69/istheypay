<div class="is-pay-blog-item">
    <div class="left">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url( 'full' ) ?>" alt="<?php the_title(); ?>">
        </a>
    </div>
    <div class="right">
        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="content">
            <p><?php echo wp_trim_words( get_the_content(), 40 ); ?></p>
        </div>
        <div class="blog-meta">
            <p><i class="icofont-wall-clock"></i> <span><?php echo get_the_date( 'Y-m-d' ); ?></span> <span><?php echo get_the_date( 'h:i:s' ); ?></span></p>
            <p><a href="<?php the_permalink(); ?>">Read More <i class="icofont-bubble-right"></i></a></p>
        </div>
    </div>
</div>