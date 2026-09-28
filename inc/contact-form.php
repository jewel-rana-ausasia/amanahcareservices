<?php
/**
 * Built-in contact form handler for the Contact Us page.
 *
 * Submissions are emailed to the Customizer contact email (or the site admin
 * email). If a form shortcode is entered in the Customizer, the Contact Us
 * page renders that instead and this handler is simply unused.
 *
 * When validation fails the entered values and field errors are kept in a
 * short-lived transient, so the visitor never has to retype their message.
 *
 * @package amanahcareservices
 */

/**
 * Enquiry types offered in the form.
 *
 * @return array
 */
function amanahcareservices_enquiry_types() {
	return array(
		'general'  => __( 'General enquiry', 'amanahcareservices' ),
		'services' => __( 'Services & availability', 'amanahcareservices' ),
		'referral' => __( 'Make a referral', 'amanahcareservices' ),
		'ndis'     => __( 'NDIS plan question', 'amanahcareservices' ),
		'careers'  => __( 'Careers', 'amanahcareservices' ),
		'feedback' => __( 'Feedback or complaint', 'amanahcareservices' ),
	);
}

/**
 * Redirect back to the form with a status (and optional saved-state token).
 *
 * @param string $redirect Base URL.
 * @param string $status   Status key.
 * @param string $token    Optional transient token.
 */
function amanahcareservices_contact_redirect( $redirect, $status, $token = '' ) {
	$args = array( 'enquiry' => $status );
	if ( $token ) {
		$args['ref'] = $token;
	}
	wp_safe_redirect( add_query_arg( $args, $redirect ) . '#contact-form' );
	exit;
}

/**
 * Read the saved form state for a failed submission.
 *
 * @return array{values:array,errors:array}
 */
function amanahcareservices_get_contact_form_state() {
	$state = array( 'values' => array(), 'errors' => array() );
	$token = isset( $_GET['ref'] ) ? sanitize_key( wp_unslash( $_GET['ref'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

	if ( $token ) {
		$saved = get_transient( 'amanah_contact_' . $token );
		if ( is_array( $saved ) ) {
			$state = wp_parse_args( $saved, $state );
		}
	}

	return $state;
}

/**
 * Handle the contact form POST.
 */
function amanahcareservices_handle_contact_form() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/contact-us/' );
	$redirect = remove_query_arg( array( 'enquiry', 'ref' ), $redirect );

	if ( ! isset( $_POST['amanah_contact_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['amanah_contact_nonce'] ) ), 'amanah_contact' ) ) {
		amanahcareservices_contact_redirect( $redirect, 'expired' );
	}

	// Honeypot: real people never fill this hidden field.
	if ( ! empty( $_POST['amanah_website'] ) ) {
		amanahcareservices_contact_redirect( $redirect, 'sent' );
	}

	$types = amanahcareservices_enquiry_types();

	$values = array(
		'name'    => isset( $_POST['amanah_name'] ) ? sanitize_text_field( wp_unslash( $_POST['amanah_name'] ) ) : '',
		'email'   => isset( $_POST['amanah_email'] ) ? sanitize_text_field( wp_unslash( $_POST['amanah_email'] ) ) : '',
		'phone'   => isset( $_POST['amanah_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['amanah_phone'] ) ) : '',
		'type'    => isset( $_POST['amanah_type'] ) ? sanitize_key( wp_unslash( $_POST['amanah_type'] ) ) : 'general',
		'message' => isset( $_POST['amanah_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['amanah_message'] ) ) : '',
		'consent' => ! empty( $_POST['amanah_consent'] ),
	);

	if ( ! isset( $types[ $values['type'] ] ) ) {
		$values['type'] = 'general';
	}

	$errors = array();

	if ( '' === $values['name'] ) {
		$errors['name'] = __( 'Please enter your name.', 'amanahcareservices' );
	}
	if ( '' === $values['email'] ) {
		$errors['email'] = __( 'Please enter your email address.', 'amanahcareservices' );
	} elseif ( ! is_email( $values['email'] ) ) {
		$errors['email'] = __( 'Please enter a valid email address, e.g. name@example.com.', 'amanahcareservices' );
	}
	$phone_digits = preg_replace( '/\D/', '', $values['phone'] );
	if ( '' !== $values['phone'] && ( strlen( $phone_digits ) < 8 || strlen( $phone_digits ) > 15 || preg_match( '/[^0-9+()\s.-]/', $values['phone'] ) ) ) {
		$errors['phone'] = __( 'Please enter a valid phone number, e.g. 0400 000 000.', 'amanahcareservices' );
	}
	if ( '' === $values['message'] ) {
		$errors['message'] = __( 'Please tell us a little about how we can help.', 'amanahcareservices' );
	} elseif ( mb_strlen( $values['message'] ) < 10 ) {
		$errors['message'] = __( 'Please add a little more detail (at least 10 characters).', 'amanahcareservices' );
	} elseif ( mb_strlen( $values['message'] ) > 3000 ) {
		$errors['message'] = __( 'Please keep your message under 3,000 characters.', 'amanahcareservices' );
	}

	if ( ! $values['consent'] ) {
		$errors['consent'] = __( 'Please tick this box so we can respond to your enquiry.', 'amanahcareservices' );
	}

	if ( $errors ) {
		$token = strtolower( wp_generate_password( 20, false ) );
		set_transient( 'amanah_contact_' . $token, array( 'values' => $values, 'errors' => $errors ), 15 * MINUTE_IN_SECONDS );
		amanahcareservices_contact_redirect( $redirect, 'invalid', $token );
	}

	$contact = amanahcareservices_get_contact();
	$to      = $contact['email'] ? $contact['email'] : get_option( 'admin_email' );
	$subject = sprintf(
		/* translators: 1: enquiry type, 2: sender name. */
		__( 'Website enquiry: %1$s from %2$s', 'amanahcareservices' ),
		$types[ $values['type'] ],
		$values['name']
	);
	$body = implode(
		"\n",
		array(
			__( 'Name:', 'amanahcareservices' ) . ' ' . $values['name'],
			__( 'Email:', 'amanahcareservices' ) . ' ' . $values['email'],
			__( 'Phone:', 'amanahcareservices' ) . ' ' . ( $values['phone'] ? $values['phone'] : '—' ),
			__( 'Enquiry type:', 'amanahcareservices' ) . ' ' . $types[ $values['type'] ],
			'',
			__( 'Message:', 'amanahcareservices' ),
			$values['message'],
			'',
			'—',
			/* translators: %s: page URL. */
			sprintf( __( 'Sent from %s', 'amanahcareservices' ), $redirect ),
		)
	);

	// Strip characters that could break the Reply-To header.
	$reply_name = trim( str_replace( array( '"', '<', '>', "\r", "\n" ), '', $values['name'] ) );
	$sent       = wp_mail( $to, $subject, $body, array( 'Reply-To: "' . $reply_name . '" <' . sanitize_email( $values['email'] ) . '>' ) );

	amanahcareservices_contact_redirect( $redirect, $sent ? 'sent' : 'error' );
}
add_action( 'admin_post_nopriv_amanah_contact', 'amanahcareservices_handle_contact_form' );
add_action( 'admin_post_amanah_contact', 'amanahcareservices_handle_contact_form' );
