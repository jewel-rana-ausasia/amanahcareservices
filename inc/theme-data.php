<?php
/**
 * Shared contact, social and service data for Amanah Care Services.
 *
 * Every value is managed from Appearance → Customize so the header, footer
 * and page templates stay in sync from one place.
 *
 * @package amanahcareservices
 */

/**
 * Default values for the Customizer contact and brand settings.
 *
 * Contact defaults are intentionally empty: the templates hide any detail that
 * has not been entered, so no placeholder numbers or addresses go live.
 *
 * @return array
 */
function amanahcareservices_contact_defaults() {
	return array(
		'phone'              => '',
		'mobile'             => '',
		'email'              => '',
		'address'            => '',
		'service_area'       => '',
		'business_hours'     => 'Monday – Friday: 9:00 AM – 5:00 PM',
		'abn'                => '',
		'ndis_number'        => '',
		'footer_description' => 'Amanah means trust. We provide respectful, person-centred support that helps you live safely, confidently and on your own terms.',
		'cta_url'            => '/contact-us/',
		'referral_url'       => '/contact-us/?type=referral#contact-form',
	);
}

/**
 * Get a single contact/brand setting, trimmed.
 *
 * @param string $key Setting key without the theme prefix.
 * @return string
 */
function amanahcareservices_get_option( $key ) {
	$defaults = amanahcareservices_contact_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

	return trim( (string) get_theme_mod( 'amanahcareservices_' . $key, $default ) );
}

/**
 * All contact details, pre-formatted for output.
 *
 * @return array
 */
function amanahcareservices_get_contact() {
	$phone   = amanahcareservices_get_option( 'phone' );
	$mobile  = amanahcareservices_get_option( 'mobile' );
	$address = amanahcareservices_get_option( 'address' );

	return array(
		'phone'          => $phone,
		'phone_uri'      => $phone ? 'tel:' . preg_replace( '/[^0-9+]/', '', $phone ) : '',
		'mobile'         => $mobile,
		'mobile_uri'     => $mobile ? 'tel:' . preg_replace( '/[^0-9+]/', '', $mobile ) : '',
		'email'          => sanitize_email( amanahcareservices_get_option( 'email' ) ),
		'address'        => $address,
		'map_url'        => $address ? 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( preg_replace( '/\s+/', ' ', $address ) ) : '',
		'service_area'   => amanahcareservices_get_option( 'service_area' ),
		'business_hours' => amanahcareservices_get_option( 'business_hours' ),
		'abn'            => amanahcareservices_get_option( 'abn' ),
		'ndis_number'    => amanahcareservices_get_option( 'ndis_number' ),
		'description'    => amanahcareservices_get_option( 'footer_description' ),
		'cta_url'        => amanahcareservices_resolve_url( amanahcareservices_get_option( 'cta_url' ) ),
		'referral_url'   => amanahcareservices_resolve_url( amanahcareservices_get_option( 'referral_url' ) ),
	);
}

/**
 * Turn a relative path (e.g. /contact-us/) into a full site URL.
 *
 * @param string $url Absolute URL or site-relative path.
 * @return string
 */
function amanahcareservices_resolve_url( $url ) {
	if ( '' === $url ) {
		return home_url( '/' );
	}

	return 0 === strpos( $url, '/' ) ? home_url( $url ) : $url;
}

/**
 * The first phone number available (landline, then mobile).
 *
 * @return array{label:string,uri:string}
 */
function amanahcareservices_get_primary_phone() {
	$contact = amanahcareservices_get_contact();

	if ( $contact['phone'] ) {
		return array( 'label' => $contact['phone'], 'uri' => $contact['phone_uri'] );
	}

	return array( 'label' => $contact['mobile'], 'uri' => $contact['mobile_uri'] );
}

/**
 * Supported social networks: key => label and Font Awesome icon.
 *
 * @return array
 */
function amanahcareservices_social_networks() {
	return array(
		'facebook'  => array( 'label' => 'Facebook', 'icon' => 'fa-facebook-f' ),
		'instagram' => array( 'label' => 'Instagram', 'icon' => 'fa-instagram' ),
		'linkedin'  => array( 'label' => 'LinkedIn', 'icon' => 'fa-linkedin-in' ),
		'youtube'   => array( 'label' => 'YouTube', 'icon' => 'fa-youtube' ),
		'x'         => array( 'label' => 'X', 'icon' => 'fa-x-twitter' ),
		'tiktok'    => array( 'label' => 'TikTok', 'icon' => 'fa-tiktok' ),
		'whatsapp'  => array( 'label' => 'WhatsApp', 'icon' => 'fa-whatsapp' ),
	);
}

/**
 * Social links that have a URL entered in the Customizer.
 *
 * @return array List of array( 'url', 'label', 'icon' ).
 */
function amanahcareservices_get_social_links() {
	$links = array();

	foreach ( amanahcareservices_social_networks() as $key => $network ) {
		$url = esc_url( get_theme_mod( 'amanahcareservices_' . $key . '_url', '' ) );

		if ( $url ) {
			$links[] = array(
				'url'   => $url,
				'label' => $network['label'],
				'icon'  => $network['icon'],
			);
		}
	}

	return $links;
}

/**
 * Logo URL: the Customizer logo when set, otherwise the bundled brand file.
 *
 * @param string $variant 'horizontal', 'stacked' or 'mark'.
 * @return string
 */
function amanahcareservices_get_logo_url( $variant = 'horizontal' ) {
	$files = array(
		'horizontal' => 'amanah-care-services-logo-horizontal.png',
		'stacked'    => 'amanah-care-services-logo.png',
		'mark'       => 'amanah-care-services-mark.png',
	);

	if ( 'horizontal' === $variant && has_custom_logo() ) {
		$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		if ( $logo ) {
			return $logo[0];
		}
	}

	$file = isset( $files[ $variant ] ) ? $files[ $variant ] : $files['horizontal'];

	return get_template_directory_uri() . '/assets/images/' . $file;
}

/**
 * Services offered, used by the homepage, footer and menus.
 *
 * @return array Keyed by slug.
 */
function amanahcareservices_get_services() {
	$services = array(
		'personal-care'            => array(
			'title'       => 'Personal Care',
			'description' => 'Respectful help with showering, dressing, grooming and daily routines, delivered at your pace and with your dignity at the centre.',
			'icon'        => 'fa-hand-holding-heart',
			'includes'    => array( 'Showering, bathing and toileting', 'Dressing and grooming', 'Medication prompts', 'Mealtime assistance' ),
		),
		'daily-living-support'     => array(
			'title'       => 'Daily Living Support',
			'description' => 'Practical support with everyday tasks at home so you can keep the routines, independence and lifestyle that matter to you.',
			'icon'        => 'fa-kitchen-set',
			'includes'    => array( 'Morning and evening routines', 'Meal planning and preparation', 'Managing appointments', 'Support to live independently' ),
		),
		'community-participation'  => array(
			'title'       => 'Community Participation',
			'description' => 'Get out, connect and take part. We support social outings, hobbies, appointments and building connections in your community.',
			'icon'        => 'fa-people-group',
			'includes'    => array( 'Social outings and events', 'Hobbies, sport and recreation', 'Volunteering, study and work', 'Building friendships' ),
		),
		'household-tasks'          => array(
			'title'       => 'Household Tasks',
			'description' => 'Help with cleaning, laundry, meal preparation and keeping your home safe, comfortable and running smoothly.',
			'icon'        => 'fa-broom',
			'includes'    => array( 'General cleaning', 'Laundry and linen', 'Grocery shopping', 'Light garden and home upkeep' ),
		),
		'life-skills-development'  => array(
			'title'       => 'Life Skills Development',
			'description' => 'Build confidence with budgeting, cooking, travel and everyday skills that help you do more for yourself.',
			'icon'        => 'fa-seedling',
			'includes'    => array( 'Budgeting and money skills', 'Cooking and nutrition', 'Using public transport', 'Confidence and decision-making' ),
		),
		'transport-assistance'     => array(
			'title'       => 'Transport Assistance',
			'description' => 'Safe, reliable support to get to appointments, work, study, shopping and the activities you enjoy.',
			'icon'        => 'fa-car-side',
			'includes'    => array( 'Medical and therapy appointments', 'Shopping and errands', 'Work, school or day programs', 'Social and community activities' ),
		),
		'respite-care'             => array(
			'title'       => 'Respite Care',
			'description' => 'Short-term support that gives families and carers time to rest, while your loved one is cared for by someone you trust.',
			'icon'        => 'fa-mug-hot',
			'includes'    => array( 'In-home respite', 'Community-based respite', 'Planned or short-notice breaks', 'Support for family carers' ),
		),
		'in-home-support'          => array(
			'title'       => 'In-Home Support',
			'description' => 'Consistent, familiar support workers who come to you, helping you stay safe and supported in your own home.',
			'icon'        => 'fa-house-user',
			'includes'    => array( 'Regular in-home visits', 'Companionship and check-ins', 'Safety and wellbeing support', 'Help staying connected to family' ),
		),
	);

	/**
	 * Filter the service list shown across the theme.
	 *
	 * @param array $services Services keyed by slug.
	 */
	$services = apply_filters( 'amanahcareservices_services', $services );

	foreach ( $services as $slug => $service ) {
		$services[ $slug ]['slug'] = $slug;
		// All services live on the single Services page; each has its own anchor.
		$services[ $slug ]['url']  = home_url( '/services/#' . $slug );
	}

	return $services;
}
