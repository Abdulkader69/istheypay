<?php

class Network {
	public function __construct() {
		add_action( 'wp_ajax_itp_create_network', array( $this, 'itp_create_network_cb' ) );
		add_action( 'wp_ajax_nopriv_itp_create_network', array( $this, 'itp_create_network_cb' ) );
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
		$email_message = 'A new network is just created. Its not published yet. Please visit the dashboard and publish it.';
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
}

new Network();