<?php

/* Template Name: Resources Template */

get_header();
?>

	<main id="main-content">

		<div class="container">
			<div class="row">
                <?php 
                    $text = get_the_title();
                    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
                    $text = strtolower($text);
				?>
				<div class="col-lg-12 pay-main-content-wrapper <?php echo $text; ?>">
					<div class="pay-left">
						<?php get_template_part( 'template-parts/components/page-top', 'section' ); ?>
						<div class="page-top-with-ad">
							<h1 class="page-title"><?php the_title(); ?></h1>
							<?php
							if( have_rows('pages_global_ad', 'option') ):?>
								<?php while( have_rows('pages_global_ad', 'option') ) : the_row();
									$ad_image = get_sub_field( 'ad_image', 'option' );
									if ( $ad_image != '' ) : ?>
										<div class="page-ad-wrap">
											<a href="<?php the_sub_field('ad_link', 'option') ?>"><img src="<?php echo $ad_image; ?>" alt=""></a>
										</div>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
                        <?php
                            if ( have_rows( 'resources_page' ) ) :
                                while ( have_rows( 'resources_page' ) ) : the_row();
                                ?>

                                <?php if ( 'resources_section' == get_row_layout() ) : ?>
                                    <div class="member-section">
                                        <div class="member-title">
                                            <h2 class="title"><?php the_sub_field('headline'); ?></h2>
                                        </div>
                                        <?php if( have_rows('resources_repeaters') ): ?>
                                            <div class="resources-area">
                                                <?php while( have_rows('resources_repeaters') ) : the_row(); ?>

                                                    <div class="resources-group">
                                                        <div class="left-title"><h3 class="title"><?php the_sub_field('group_title'); ?></h3></div>
                                                        <?php if( have_rows('group_items') ): ?>
                                                            <ul class="members-area">
                                                                <?php while( have_rows('group_items') ) : the_row(); ?>
                                                                    <li>
                                                                        <?php 
                                                                        $link = get_sub_field('link');
                                                                        if( $link ): 
                                                                            $link_url = $link['url'];
                                                                            $link_title = $link['title'];
                                                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                                                            ?>
                                                                            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endwhile; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>

                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif;?>

                                <?php
                                endwhile;
                            endif;
                        ?>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
