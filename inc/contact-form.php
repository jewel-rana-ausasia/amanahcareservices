<?php
/**
 * Built-in contact form handler for the Contact Us page.
 *
 * Submissions are emailed to the Customizer contact email (or the site admin
 * email). If a form shortcode is entered in the Customizer, the Contact Us
 * page renders that instead and this handler is simply unused.
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
		'referral' => __( 'Referral', 'amanahcareservices' ),
		'ndis'     => __( 'NDIS plan question', 'amanahcareservices' ),
		'careers'  => __( 'Careers', 'amanahcareservices' ),
		'feedback' => __( 'Feedback or complaint', 'amanahcareservices' ),
	);
}

/**
 * Handle the contact form POST.
 */
function amanahcareservices_handle_contact_form() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/contact-us/' );
	$redirect = remove_query_arg( array( 'enquiry' ), $redirect );

	if ( ! isset( $_POST['amanah_contact_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['amanah_contact_nonce'] ) ), 'amanah_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'error', $redirect ) . '#contact-form' );
		exit;
	}

	// Honeypot: real people never fill this hidden field.
	if ( ! empty( $_POST['amanah_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'sent', $redirect ) . '#contact-form' );
		exit;
	}

	$name    = isset( $_POST['amanah_name'] ) ? sanitize_text_field( wp_unslash( $_POST['amanah_name'] ) ) : '';
	$email   = isset( $_POST['amanah_email'] ) ? sanitize_email( wp_unslash( $_POST['amanah_email'] ) ) : '';
	$phone   = isset( $_POST['amanah_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['amanah_phone'] ) ) : '';
	$type    = isset( $_POST['amanah_type'] ) ? sanitize_key( wp_unslash( $_POST['amanah_type'] ) ) : 'general';
	$message = isset( $_POST['amanah_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['amanah_message'] ) ) : '';
	$consent = ! empty( $_POST['amanah_consent'] );
	$types   = amanahcareservices_enquiry_types();

	if ( '' === $name || ! is_email( $email ) || '' === $message || ! $consent ) {
		wp_safe_redirect( add_query_arg( 'enquiry', 'invalid', $redirect ) . '#contact-form' );
		exit;
	}

	$contact = amanahcareservices_get_contact();
	$to      = $contact['email'] ? $contact['email'] : get_option( 'admin_email' );
	$subject = sprintf(
		/* translators: 1: enquiry type, 2: sender name. */
		__( 'Website enquiry: %1$s from %2$s', 'amanahcareservices' ),
		isset( $types[ $type ] ) ? $types[ $type ] : $types['general'],
		$name
	);
	$body = implode(
		"\n",
		array(
			__( 'Name:', 'amanahcareservices' ) . ' ' . $name,
			__( 'Email:', 'amanahcareservices' ) . ' ' . $email,
			__( 'Phone:', 'amanahcareservices' ) . ' ' . ( $phone ? $phone : '—' ),
			__( 'Enquiry type:', 'amanahcareservices' ) . ' ' . ( isset( $types[ $type ] ) ? $types[ $type ] : $types['general'] ),
			'',
			$message,
		)
	);

	$sent = wp_mail( $to, $subject, $body, array( 'Reply-To: ' . $name . ' <' . $email . '>' ) );

	wp_safe_redirect( add_query_arg( 'enquiry', $sent ? 'sent' : 'error', $redirect ) . '#contact-form' );
	exit;
}
add_action( 'admin_post_nopriv_amanah_contact', 'amanahcareservices_handle_contact_form' );
add_action( 'admin_post_amanah_contact', 'amanahcareservices_handle_contact_form' );
