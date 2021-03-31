<?php

class Review {
	public function __construct() {
		add_action( 'wp_ajax_itp_create_review', array( $this, 'itp_create_review_cb' ) );
		add_action( 'wp_ajax_nopriv_itp_create_review', array( $this, 'itp_create_review_cb' ) );
	}

	public function itp_create_review_cb() {
		header( 'Content-Type: application/json' );

		$form_data = $_POST;
		$errors    = [];
		$has_error = false;

		// Check wp_nonce field
		$nonce = $_POST['review_wpnonce'];
		if ( $nonce == '' || ! wp_verify_nonce( $nonce, 'review_form_nonce' ) ) {
			$errors[]  = array( 'name' => 'review_wpnonce', 'message' => 'Sorry, your nonce did not verify.' );
			$has_error = true;
		}
		if ( isset( $form_data['overall-rating'] ) && $form_data['overall-rating'] == '' ) {
			$errors[]  = 'overall-rating';
			$has_error = true;
		}
		if ( isset( $form_data['offers-rating'] ) && $form_data['offers-rating'] == '' ) {
			$errors[]  = 'offers-rating';
			$has_error = true;
		}
		if ( isset( $form_data['payout-rating'] ) && $form_data['payout-rating'] == '' ) {
			$errors[]  = 'payout-rating';
			$has_error = true;
		}
		if ( isset( $form_data['tracking-rating'] ) && $form_data['tracking-rating'] == '' ) {
			$errors[]  = 'tracking-rating';
			$has_error = true;
		}
		if ( isset( $form_data['support-rating'] ) && $form_data['support-rating'] == '' ) {
			$errors[]  = 'support-rating';
			$has_error = true;
		}
		if ( isset( $form_data['your-review'] ) && $form_data['your-review'] == '' ) {
			$errors[]  = 'your-review';
			$has_error = true;
		}
		if ( isset( $form_data['your-name'] ) && $form_data['your-name'] == '' ) {
			$errors[]  = 'your-name';
			$has_error = true;
		}
		if ( isset( $form_data['your-email'] ) && $form_data['your-email'] == '' ) {
			$errors[]  = 'your-email';
			$has_error = true;
		}
		if ( isset( $form_data['network_id'] ) && $form_data['network_id'] == '' ) {
			$errors[]  = 'network_id';
			$has_error = true;
		}

		// Show error message if found any error
		if ( $has_error && $errors ) {
			echo wp_json_encode( array( 'status' => false, 'errors' => $errors ) );
			die();
		}

		// Create a network
		$review = wp_insert_post( array(
			'post_title'  => $form_data['your-name'] . ' : ' . $form_data['overall-rating'],
			'post_type'   => 'review',
			'post_status' => 'publish',
			'post_parent' => $form_data['network_id'],
		) );

		// Update the fields of the network
		if ( $review && 0 != $review ) {
			update_field( 'overall_rating', $form_data['overall-rating'], $review );
			update_field( 'offers_rating', $form_data['offers-rating'], $review );
			update_field( 'payout_rating', $form_data['payout-rating'], $review );
			update_field( 'tracking_rating', $form_data['tracking-rating'], $review );
			update_field( 'support_rating', $form_data['support-rating'], $review );
			update_field( 'your_review', $form_data['your-review'], $review );
			update_field( 'name', $form_data['your-name'], $review );
			update_field( 'email', $form_data['your-email'], $review );
		}

		// Upload Review Image
		if ( isset( $_FILES['review_image'] ) && $_FILES['review_image']['name'] != '' ) {
			// These files need to be included as dependencies when on the front end.
			require_once ABSPATH . 'wp-admin/includes/image.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/media.php';

			// Remember, 'my_image_upload' is the name of our file input in our form above.
			$attachment_id = media_handle_upload( 'review_image', 0 );
			if ( is_wp_error( $attachment_id ) ) {
				$errors[] = 'review_image';
				echo wp_json_encode( array( 'status' => false, 'errors' => $errors ) );
				die();
			}

			update_field( 'payment_screenshot', $attachment_id, $review );
		}

		echo wp_json_encode( array(
			'status'  => true,
			'post_id' => $review
		) );

		wp_die();
	}
	 public function get_network ( $review_ID ) {
		if(!$review_ID) {
			return false;
		}
		$review = get_post( $review_ID );
		$network_ID = $review->post_parent;
		$network = get_post( $network_ID );
		return $network;
	 }
}

new Review();