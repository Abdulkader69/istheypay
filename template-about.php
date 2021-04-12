<?php

/* Template Name: About Template */

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
                            if ( have_rows( 'about_page' ) ) :
                                while ( have_rows( 'about_page' ) ) : the_row();
                                ?>

                                <?php if ( 'top_section' == get_row_layout() ) : ?>
                                    <div class="top-section">
                                        <h2><?php the_sub_field('headline'); ?></h2>
                                        <div class="content">
                                            <?php the_sub_field('content'); ?>
                                        </div>
                                    </div>
                                <?php endif;?>

                                <?php if ( 'member_section' == get_row_layout() ) : ?>
                                    <div class="member-section">
                                        <div class="member-title">
                                            <h2 class="title"><?php the_sub_field('headline'); ?></h2>
                                        </div>
                                        <?php if( have_rows('members_repeaters') ): ?>
                                            <div class="members-area">
                                                <?php while( have_rows('members_repeaters') ) : the_row(); ?>

                                                    <div class="member-item">
                                                        <?php 
                                                        $image = get_sub_field('profile_images');
                                                        if( !empty( $image ) ): ?>
                                                            <div class="images">
                                                                <div class="stack twisted">
                                                                    <img src="<?php echo $image; ?>" alt="profile-img" />
                                                                </div>
                                                                <?php if( have_rows('social_icons') ): ?>
                                                                    <div class="members-social">
                                                                        <?php while( have_rows('social_icons') ) : the_row(); ?>

                                                                            <?php $facebook = get_sub_field('facebook');
                                                                            if( !empty( $facebook ) ): ?>
                                                                                <a target="_blank" href="<?php echo $facebook ?>"><i class="icofont-facebook"></i></a>
                                                                            <?php endif; ?>
                                                                            <?php $twitter = get_sub_field('twitter');
                                                                            if( !empty( $twitter ) ): ?>
                                                                                <a target="_blank" href="<?php echo $twitter ?>"><i class="icofont-twitter"></i></a>
                                                                            <?php endif; ?>
                                                                            <?php $linkedin = get_sub_field('linkedin');
                                                                            if( !empty( $linkedin ) ): ?>
                                                                                <a target="_blank" href="<?php echo $linkedin ?>"><i class="icofont-linkedin"></i></a>
                                                                            <?php endif; ?>
                                                                            <?php $instagram = get_sub_field('instagram');
                                                                            if( !empty( $instagram ) ): ?>
                                                                                <a target="_blank" href="<?php echo $instagram ?>"><i class="icofont-instagram"></i></a>
                                                                            <?php endif; ?>

                                                                        <?php endwhile; ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <h3><?php the_sub_field( 'name' ); ?></h3>
                                                        <p><?php the_sub_field( 'bios' ); ?></p>
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
