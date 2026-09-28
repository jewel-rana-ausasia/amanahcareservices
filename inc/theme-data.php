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
 * Services offered (NDIS registration groups), used by the homepage, footer and menus.
 *
 * Each service can show a photo: set one in Customizer > Theme Options > Service Images,
 * or drop a file named assets/images/services/<slug>.jpg (or .webp/.png) into the theme.
 *
 * @return array Keyed by slug.
 */
function amanahcareservices_get_services() {
	$services = array(
		'accommodation-tenancy'              => array(
			'code'        => '0101',
			'group'       => 'Accommodation/Tenancy',
			'title'       => 'Accommodation & Tenancy',
			'description' => 'Help finding and keeping a home that suits you, from searching and applying for rentals to understanding your lease and tenancy responsibilities.',
			'icon'        => 'fa-house-chimney',
			'includes'    => array( 'Searching for suitable housing', 'Rental applications and paperwork', 'Understanding tenancy rights and responsibilities', 'Support to maintain your tenancy' ),
		),
		'employment-support'                 => array(
			'code'        => '0102',
			'group'       => 'Assist Access/Maintain Employ',
			'title'       => 'Finding & Keeping a Job',
			'description' => 'Support to get ready for work, find a job that fits your goals and keep it, with practical help that builds your confidence at work.',
			'icon'        => 'fa-briefcase',
			'includes'    => array( 'Job readiness and résumé help', 'Interview preparation', 'Travel and workplace routines', 'Support to keep your job' ),
		),
		'life-stage-transition'              => array(
			'code'        => '0106',
			'group'       => 'Assist-Life Stage, Transition',
			'title'       => 'Life Stage & Transition Support',
			'description' => 'Support through big life changes, like leaving school or moving house, including help to plan, coordinate and manage your supports.',
			'icon'        => 'fa-route',
			'includes'    => array( 'Planning for major life changes', 'Coordinating your supports', 'Linking with community and mainstream services', 'Building skills to manage your plan' ),
		),
		'personal-care'                      => array(
			'code'        => '0107',
			'group'       => 'Assist-Personal Activities',
			'title'       => 'Personal Care',
			'description' => 'Respectful help with showering, dressing, grooming and daily routines, delivered at your pace and with your dignity at the centre.',
			'icon'        => 'fa-hand-holding-heart',
			'includes'    => array( 'Showering, bathing and toileting', 'Dressing and grooming', 'Medication prompts', 'Mealtime assistance' ),
		),
		'transport-assistance'               => array(
			'code'        => '0108',
			'group'       => 'Assist-Travel/Transport',
			'title'       => 'Travel & Transport',
			'description' => 'Safe, reliable support to get to appointments, work, study, shopping and the activities you enjoy.',
			'icon'        => 'fa-car-side',
			'includes'    => array( 'Medical and therapy appointments', 'Shopping and errands', 'Work, school or day programs', 'Social and community activities' ),
		),
		'daily-tasks-shared-living'          => array(
			'code'        => '0115',
			'group'       => 'Daily Tasks/Shared Living',
			'title'       => 'Daily Tasks & Shared Living',
			'description' => 'Support with daily tasks in a shared home, helping you live as independently as possible alongside your housemates.',
			'icon'        => 'fa-people-roof',
			'includes'    => array( 'Help with daily routines', 'Sharing household responsibilities', 'Building independent living skills', 'Support for a happy shared home' ),
		),
		'innovative-community-participation' => array(
			'code'        => '0116',
			'group'       => 'Innov Community Participation',
			'title'       => 'Innovative Community Participation',
			'description' => 'Creative, goal-focused activities that help you try new things, build skills and connect with mainstream community settings.',
			'icon'        => 'fa-lightbulb',
			'includes'    => array( 'New and mainstream community activities', 'Skill-building through creative programs', 'Pathways into clubs and groups', 'Activities tailored to your interests' ),
		),
		'life-skills-development'            => array(
			'code'        => '0117',
			'group'       => 'Development-Life Skills',
			'title'       => 'Life Skills Development',
			'description' => 'Build confidence with budgeting, cooking, travel and everyday skills that help you do more for yourself.',
			'icon'        => 'fa-seedling',
			'includes'    => array( 'Budgeting and money skills', 'Cooking and nutrition', 'Using public transport', 'Confidence and decision-making' ),
		),
		'household-tasks'                    => array(
			'code'        => '0120',
			'group'       => 'Household Tasks',
			'title'       => 'Household Tasks',
			'description' => 'Help with cleaning, laundry, meal preparation and keeping your home safe, comfortable and running smoothly.',
			'icon'        => 'fa-broom',
			'includes'    => array( 'General cleaning', 'Laundry and linen', 'Grocery shopping', 'Light garden and home upkeep' ),
		),
		'community-participation'            => array(
			'code'        => '0125',
			'group'       => 'Participate Community',
			'title'       => 'Community Participation',
			'description' => 'Get out, connect and take part. We support social outings, hobbies and building connections in your community.',
			'icon'        => 'fa-people-group',
			'includes'    => array( 'Social outings and events', 'Hobbies, sport and recreation', 'Volunteering, study and courses', 'Building friendships' ),
		),
		'specialised-supported-employment'   => array(
			'code'        => '0133',
			'group'       => 'Spec Support Employ',
			'title'       => 'Specialised Supported Employment',
			'description' => 'Work in a supported setting with ongoing help on the job, so you can build skills, earn and grow your confidence.',
			'icon'        => 'fa-screwdriver-wrench',
			'includes'    => array( 'Supported work environments', 'Ongoing on-the-job assistance', 'Workplace skills training', 'Help building work confidence' ),
		),
		'group-centre-activities'            => array(
			'code'        => '0136',
			'group'       => 'Group/Centre Activities',
			'title'       => 'Group & Centre Activities',
			'description' => 'Enjoy social, recreational and skill-building activities in a group or centre, with support to join in and make friends.',
			'icon'        => 'fa-puzzle-piece',
			'includes'    => array( 'Group social and recreational programs', 'Centre-based skill-building', 'Making friends and connections', 'Structured activities with support' ),
		),
	);

	/**
	 * Filter the service list shown across the theme.
	 *
	 * @param array $services Services keyed by slug.
	 */
	$services = apply_filters( 'amanahcareservices_services', $services );

	foreach ( $services as $slug => $service ) {
		$services[ $slug ]['slug']  = $slug;
		// All services live on the single Services page; each has its own anchor.
		$services[ $slug ]['url']   = home_url( '/services/#' . $slug );
		$services[ $slug ]['image'] = amanahcareservices_get_service_image( $slug );
	}

	return $services;
}

/**
 * Image URL for a service: Customizer image first, then a bundled theme file.
 *
 * @param string $slug Service slug.
 * @param string $size Image size for Customizer images.
 * @return string Image URL, or an empty string when none is set.
 */
function amanahcareservices_get_service_image( $slug, $size = 'large' ) {
	$image_id = absint( get_theme_mod( 'amanahcareservices_service_image_' . $slug, 0 ) );

	if ( $image_id ) {
		$image = wp_get_attachment_image_src( $image_id, $size );
		if ( $image ) {
			return $image[0];
		}
	}

	foreach ( array( 'jpg', 'webp', 'png' ) as $ext ) {
		$file = 'assets/images/services/' . $slug . '.' . $ext;
		if ( file_exists( get_template_directory() . '/' . $file ) ) {
			return get_template_directory_uri() . '/' . $file;
		}
	}

	return '';
}
