<?php

class Network {
	public function __construct() {
		add_action( 'wp_ajax_itp_create_network', array( $this, 'itp_create_network_cb' ) );
		add_action( 'wp_ajax_nopriv_itp_create_network', array( $this, 'itp_create_network_cb' ) );

		add_action( 'wp_ajax_itp_filter_network', array( $this, 'itp_filter_network_cb' ) );
		add_action( 'wp_ajax_nopriv_itp_filter_network', array( $this, 'itp_filter_network_cb' ) );
	}

	public function itp_create_network_cb() {
		header( 'Content-Type: application/json' );

		$form_data       = $_POST;
		$errors          = [];
		$has_error       = false;
		$form_fields     = array_slice( $form_data, 0, count( $form_data ) - 5 );
		$required_fields = explode( ',', $_POST['required_fields'] );
		$repeater_fields = json_decode( stripslashes( $form_data['repeater_fields'] ) );

		// Check wp_nonce field
		$nonce = $_POST['program_wpnonce'];
		if ( $nonce == '' || ! wp_verify_nonce( $nonce, 'program_form_nonce' ) ) {
			$errors[]  = array( 'name' => 'program_wpnonce', 'message' => 'Sorry, your nonce did not verify.' );
			$has_error = true;
		}

		// check if any of the required fields are empty
		foreach ( $form_fields as $key => $value ) {
			if ( in_array( $key, $required_fields ) && '' == trim( $form_data[ $key ] ) ) {
				$errors[]  = $key;
				$has_error = true;
			}
		}

		// Show error message if found any error
		if ( $has_error && $errors ) {
			echo wp_json_encode( array( 'status' => false, 'errors' => $errors ) );
			die();
		}

		// Create a network
		$network = wp_insert_post( array(
			'post_title' => $form_fields['name'],
			'post_type'  => 'networks',
		) );

		// Update the fields of the network
		if ( $network && 0 != $network ) {
			foreach ( $form_fields as $key => $value ) {
				update_field( $key, $value, $network );
			}

			// Repeater field for Affiliate/Advertiser Contacts
			if ( $repeater_fields->afn_aa_contacts ) {
				$repeater_array = [];
				foreach ( $repeater_fields->afn_aa_contacts as $key => $val ) {
					$repeater_array[] = [ 'name' => $val[0], 'email' => $val[1] ];
				}
				update_field( 'afn_aa_contacts', $repeater_array, $network );
			}

			// Repeater field for Affiliate Support Team
			if ( $repeater_fields->afp_as_team ) {
				$repeater_array = [];
				foreach ( $repeater_fields->afp_as_team as $key => $val ) {
					$repeater_array[] = [ 'name' => $val[0], 'email' => $val[1] ];
				}
				update_field( 'afp_as_team', $repeater_array, $network );
			}

			// Repeater field for Publishers Contacts
			if ( $repeater_fields->adn_fp_contacts ) {
				$repeater_array = [];
				foreach ( $repeater_fields->adn_fp_contacts as $key => $val ) {
					$repeater_array[] = [ 'name' => $val[0], 'email' => $val[1] ];
				}
				update_field( 'adn_fp_contacts', $repeater_array, $network );
			}

			// Repeater field for Advertisers Contacts
			if ( $repeater_fields->adn_fa_contacts ) {
				$repeater_array = [];
				foreach ( $repeater_fields->adn_fa_contacts as $key => $val ) {
					$repeater_array[] = [ 'name' => $val[0], 'email' => $val[1] ];
				}
				update_field( 'adn_fa_contacts', $repeater_array, $network );
			}
		}

		$to_email      = get_field( 'network_notification_receiver_email', 'option' );
		$email_message = '
			<table width="100%" border="0" cellpadding="5" cellspacing="0" style="border: 2px solid rgba(247, 51, 69); max-width: 600px; margin: auto;">
				<thead>
					<tr>
						<th colspan="6" style="padding: 15px 20px;text-align: center">
							<a style="text-decoration: none;" target="_blank" href="https://istheypay.com/"><img style="width: 300px;" src="https://istheypay.abdulkader.me/wp-content/themes/istheypay/assets/images/istheypay.png" alt=""></a>
						</th>
					</tr>
				</thead>
				<tbody style="border-top: 5px solid rgba(247, 51, 69);">
					<tr>
						<td colspan="6" style="padding: 20px 20px; border-top: 5px solid rgba(247, 51, 69); font-family:sans-serif; font-size: 16px;line-height: 1.5">A new network is just created. Its not published yet. Please visit the dashboard and publish it. <a style="color: #000;" target="_blank"  href="https://istheypay.abdulkader.me/wp-admin/edit.php?post_status=draft&post_type=networks">Click Here</a></td>
					</tr>
				</tbody>
				<tfoot style="background-color: rgba(247, 51, 69);">
					<tr>
						<td colspan="6" style="color: #fff; font-family:sans-serif; padding: 15px 20px; font-size: 14px; line-height: 1.4; text-align: center;">Copyright © 2021 | <a style="color: #fff;" target="_blank" href="https://istheypay.com/">istheypay.com</a></td>
					</tr>
				</tfoot>
			</table>
		';
		$headers       = [];
		$headers[]     = "Content-Type: text/html";
		$headers[]     = "charset=UTF-8";
		$headers[]     = "From: IsTheyPay";
		wp_mail( $to_email, 'A Network is just created.', $email_message, $headers );

		echo wp_json_encode( array(
			'status'  => true,
			'post_id' => $network
		) );

		wp_die();

	}

	/**
	 * @param $network_id
	 *
	 * @return WP_Query
	 */
	public function get_all_reviews( $network_id ): WP_Query {
		$args = array(
			'post_type'      => 'review',
			'post_parent'    => $network_id,
			'posts_per_page' => - 1,
		);

		return new WP_Query( $args );
	}

	/**
	 * @param $network_id
	 *
	 * @return int
	 */
	public function get_total_rating_count( $network_id ): int {
		$ratings = $this->get_all_reviews( $network_id );

		return $ratings->post_count;
	}


	/**
	 * @param $network_id
	 * @param string $type
	 *
	 * @return float|int
	 */
	public function get_rating( $network_id, $type = 'overall' ) {
		$ratings        = $this->get_all_reviews( $network_id )->posts;
		$average_rating = 0;
		if ( ! $ratings ) {
			return $average_rating;
		}

		foreach ( $ratings as $rating ) {
			$average_rating += get_field( $type . '_rating', $rating->ID );
		}

		return round( $average_rating / $this->get_total_rating_count( $network_id ), 1 );
	}


	/**
	 * @param $network_id
	 * @param string $type
	 * @param int $star
	 *
	 * @return int
	 */
	public function get_rating_by_star( $network_id, $type = 'overall', $star = 5 ): int {
		$args = array(
			'post_type'      => 'review',
			'post_parent'    => $network_id,
			'posts_per_page' => - 1,
			'meta_query'     => array(
				'relation' => 'AND',
				array(
					'key'     => $type . '_rating',
					'value'   => $star,
					'compare' => '=',
				)
			),
		);

		$ratings = new WP_Query( $args );

		return $ratings->post_count;
	}


	public function itp_filter_network_cb() {
		$form_data = $_POST;

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args  = array(
			'post_type'      => 'networks',
			'posts_per_page' => 20,
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged'          => $paged,
			'tax_query'      => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'network_category',
					'field'    => 'slug',
					'terms'    => 'affiliate-networks',
				),
			),
		);

		if ( isset( $form_data['tracking_software'] ) && '' != $form_data['tracking_software'] ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'tracking_software',
				'field'    => 'term_id',
				'terms'    => $form_data['tracking_software'],
			);
		}

		if ( isset( $form_data['payment_frequency'] ) && '' != $form_data['payment_frequency'] ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'payment_frequency',
				'field'    => 'term_id',
				'terms'    => $form_data['payment_frequency'],
			);
		}

		if ( isset( $form_data['payment_method'] ) && '' != $form_data['payment_method'] ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'payment_method',
				'field'    => 'term_id',
				'terms'    => $form_data['payment_method'],
			);
		}

		$networks = new WP_Query( $args );
		ob_start();

		if ( $networks->have_posts() ) :
			while ( $networks->have_posts() ) :
				$networks->the_post();
				$post_type      = get_post_type( get_the_ID() );
				$taxonomies     = get_object_taxonomies( $post_type );
				$taxonomy_names = wp_get_object_terms( get_the_ID(), $taxonomies );
				$network        = new Network();
				$average        = $network->get_rating( get_the_ID() );
				?>

                <div class="pay-premium-network-item">
                    <div class="left">
                        <a href="<?php the_permalink(); ?>">
                            <div class="logo">
								<?php
								$networks_thumbnail = get_field( 'networks_thumbnail' );
								if ( ! $networks_thumbnail == '' ) { ?>
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
								foreach ( $taxonomy_names as $tax ) {
									if ( $tax->parent != 0 ) { // avoid parent categories
										$tax_slug = $tax->slug;
										if ( $tax_slug == 'adult' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-adult">18</i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'biz-opp' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-bill-alt"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'crypto' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-bitcoin"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'dating' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-ui-love"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'ecommerce' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-shopping-cart"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'education' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-hat-alt"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'finance' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-dollar"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'forex-trading' ) { ?>
                                            <p>
                                                    <span class="icon"><i
                                                                class="icofont-chart-histogram-alt"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'gambling' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-dice"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'game' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-ui-game"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'health-nutra' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-doctor"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'incentive' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-recycle"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'mobile' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-ui-touch-phone"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'pay-per-call' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-ui-call"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'survey' ) { ?>
                                            <p>
                                                    <span class="icon"><i
                                                                class="icofont-chart-histogram-alt"></i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'sweepstakes' ) { ?>
                                            <p>
                                                <span class="icon"><i class="icofont-sweepstakes">s</i></span>
                                                <span><?php echo $tax->name; ?></span>
                                            </p>
										<?php }
										if ( $tax_slug == 'travel' ) { ?>
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
							<?php
							$networksType = get_field( 'network_program_type' );
							if ( '1' == $networksType ) { ?>
                                <p><?php the_field( 'afn_network_description' ); ?></p>
							<?php } elseif ( '2' == $networksType ) { ?>
                                <p><?php the_field( 'afp_program_description' ); ?></p>
							<?php } elseif ( '3' == $networksType ) { ?>
                                <p><?php the_field( 'adn_network_description' ); ?></p>
							<?php }
							?>
                        </div>
                        <div class="bottom-meta-content">
                            <p class="meta reviews-count"><?php echo $network->get_total_rating_count( get_the_ID() ); ?>
                                Reviews</p>
							<?php
							$networksType = get_field( 'network_program_type' );
							if ( '1' == $networksType ) { ?>
                                <p class="meta offers-count">
									<?php the_field( 'afn_offers_in_your_network' ); ?>
                                    Offers</p>
							<?php }
							?>
							<?php
							$networksType = get_field( 'network_program_type' );
							if ( '1' == $networksType ) { ?>
                                <p class="meta tracking-software"><?php the_field( 'afn_tracking_software' ); ?></p>
							<?php } elseif ( '2' == $networksType ) { ?>
                                <p class="meta tracking-software"><?php the_field( 'afp_base_commission' ); ?></p>
							<?php } elseif ( '3' == $networksType ) { ?>
                                <p class="meta tracking-software"><?php the_field( 'adn_fa_minimum_deposit' ); ?></p>
							<?php }
							?>
                            <p class="meta payment-freq">
								<?php
								$networksType = get_field( 'network_program_type' );
								if ( '1' == $networksType ) { ?>
									<?php the_field( 'afn_payment_frequency' ); ?>
								<?php } elseif ( '2' == $networksType ) { ?>
									<?php the_field( 'afp_payment_frequency' ); ?>
								<?php } elseif ( '3' == $networksType ) { ?>
									<?php the_field( 'adn_fp_payment_frequency' ); ?>
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
						if ( '1' == $networksType ) { ?>
                            <p><a href="<?php the_field( 'afn_network_url' ); ?>">Join</a></p>
						<?php } elseif ( '2' == $networksType ) { ?>
                            <p><a href="<?php the_field( 'afp_program_url' ); ?>">Join</a></p>
						<?php } elseif ( '3' == $networksType ) { ?>
                            <p><a href="<?php the_field( 'adn_network_url' ); ?>">Join</a></p>
						<?php }
						?>
                    </div>
                </div>

			<?php endwhile; ?>
		<?php else: ?>
            <h3 class="no-networks-found">No Networks Found</h3>
		<?php endif; ?>

		<?php
		echo ob_get_clean();
		wp_die();

	}
}

new Network();