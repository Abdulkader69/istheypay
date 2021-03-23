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

		echo wp_json_encode( array(
			'status'  => true,
			'post_id' => $network
		) );

		wp_die();

	}
}

new Network();