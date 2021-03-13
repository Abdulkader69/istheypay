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