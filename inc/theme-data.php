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
 * Number of testimonial slots available in the Customizer.
 *
 * @return int
 */
function amanahcareservices_testimonial_slots() {
	return 6;
}

/**
 * Testimonials that have a quote entered in the Customizer.
 *
 * @return array List of array( 'quote', 'name', 'role' ).
 */
function amanahcareservices_get_testimonials() {
	$testimonials = array();

	for ( $i = 1; $i <= amanahcareservices_testimonial_slots(); $i++ ) {
		$quote = trim( (string) get_theme_mod( 'amanahcareservices_testimonial_' . $i . '_quote', '' ) );

		if ( '' === $quote ) {
			continue;
		}

		$testimonials[] = array(
			'quote' => $quote,
			'name'  => trim( (string) get_theme_mod( 'amanahcareservices_testimonial_' . $i . '_name', '' ) ),
			'role'  => trim( (string) get_theme_mod( 'amanahcareservices_testimonial_' . $i . '_role', '' ) ),
		);
	}

	return $testimonials;
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
 * Services offered (NDIS registration groups), used by the homepage, Services page, footer and menus.
 *
 * Optional detail keys used on the Services page: overview (paragraphs), suits and outcomes.
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
			'overview'    => array(
				'A safe, stable home makes everything else easier. We work alongside you to find a place that suits your needs, your budget and the life you want to live, then help you settle in and stay there.',
				'That might mean searching listings together, preparing a strong rental application, going to inspections or talking through your lease so you know exactly what you are signing. Once you have moved in, we can help you keep on top of rent, bills and your responsibilities as a tenant.',
			),
			'icon'        => 'fa-house-chimney',
			'includes'    => array( 'Searching for suitable housing', 'Rental applications and paperwork', 'Attending inspections with you', 'Understanding tenancy rights and responsibilities', 'Setting up utilities and bills', 'Support to maintain your tenancy' ),
			'suits'       => array( 'Moving out of the family home', 'Looking for a more suitable place', 'Renting for the first time', 'Wanting to keep a tenancy on track' ),
			'outcomes'    => array( 'A home that fits your needs and budget', 'Confidence dealing with agents and landlords', 'A tenancy you can keep long term' ),
		),
		'employment-support'                 => array(
			'code'        => '0102',
			'group'       => 'Assist Access/Maintain Employ',
			'title'       => 'Finding & Keeping a Job',
			'description' => 'Support to get ready for work, find a job that fits your goals and keep it, with practical help that builds your confidence at work.',
			'overview'    => array(
				'Work can bring purpose, independence and new friendships. We help you work out what kind of job suits your strengths and interests, then support you step by step to get there.',
				'From writing a résumé and practising interviews to learning the route to work and settling into a new routine, we stay beside you. Once you are working, we can keep supporting you so the job stays a good fit.',
			),
			'icon'        => 'fa-briefcase',
			'includes'    => array( 'Exploring your work goals and strengths', 'Job readiness and résumé help', 'Interview preparation and practice', 'Travel training for the trip to work', 'Workplace routines and expectations', 'Ongoing support to keep your job' ),
			'suits'       => array( 'Looking for your first job', 'Returning to work after a break', 'Changing jobs or careers', 'Needing support to stay in work' ),
			'outcomes'    => array( 'Clear, realistic work goals', 'Confidence in interviews and at work', 'A job you can keep and grow in' ),
		),
		'life-stage-transition'              => array(
			'code'        => '0106',
			'group'       => 'Assist-Life Stage, Transition',
			'title'       => 'Life Stage & Transition Support',
			'description' => 'Support through big life changes, like leaving school or moving house, including help to plan, coordinate and manage your supports.',
			'overview'    => array(
				'Big changes, like finishing school, moving out, starting work or leaving hospital, can feel overwhelming. We help you plan ahead so each step feels manageable and you stay in control of the decisions.',
				'We help you coordinate your supports, connect with community and mainstream services, and build the skills to manage your own plan over time. The aim is a smooth transition and a steady foundation for what comes next.',
			),
			'icon'        => 'fa-route',
			'includes'    => array( 'Planning for major life changes', 'Coordinating your supports', 'Linking with community and mainstream services', 'Help with appointments and paperwork', 'Problem-solving when things change', 'Building skills to manage your plan' ),
			'suits'       => array( 'Leaving school', 'Moving house or out of home', 'Leaving hospital or care', 'Starting work, study or new routines' ),
			'outcomes'    => array( 'A clear plan for the change ahead', 'Supports that work well together', 'More confidence managing your own plan' ),
		),
		'personal-care'                      => array(
			'code'        => '0107',
			'group'       => 'Assist-Personal Activities',
			'title'       => 'Personal Care',
			'description' => 'Respectful help with showering, dressing, grooming and daily routines, delivered at your pace and with your dignity at the centre.',
			'overview'    => array(
				'Personal care is deeply personal. We take the time to learn how you like things done and we always ask before we help. Your privacy, dignity and choices come first, every visit.',
				'Support can include help getting ready in the morning, showering, dressing, grooming, eating and getting ready for bed. Where you can, we encourage you to do things your own way so you keep and build your independence.',
			),
			'icon'        => 'fa-hand-holding-heart',
			'includes'    => array( 'Showering, bathing and toileting', 'Dressing and grooming', 'Morning and evening routines', 'Medication prompts', 'Mealtime assistance', 'Getting in and out of bed' ),
			'suits'       => array( 'Needing help with daily routines', 'Recovering after illness or injury', 'Wanting more independence at home', 'Families wanting reliable support' ),
			'outcomes'    => array( 'Routines done your way, at your pace', 'Feeling safe, comfortable and respected', 'Familiar workers you can trust' ),
		),
		'transport-assistance'               => array(
			'code'        => '0108',
			'group'       => 'Assist-Travel/Transport',
			'title'       => 'Travel & Transport',
			'description' => 'Safe, reliable support to get to appointments, work, study, shopping and the activities you enjoy.',
			'overview'    => array(
				'Getting where you need to go should not stop you from living your life. We provide safe, reliable transport and support so you can get to appointments, work, study and the places you enjoy.',
				'Our workers can drive you, travel with you and help at the other end if you need it. If one of your goals is to travel more independently, we can also help you learn routes and build confidence using public transport.',
			),
			'icon'        => 'fa-car-side',
			'includes'    => array( 'Medical and therapy appointments', 'Shopping and errands', 'Work, school or day programs', 'Social and community activities', 'Support at your destination', 'Help to plan and learn routes' ),
			'suits'       => array( 'People who do not drive', 'Anyone finding public transport hard', 'Regular appointments or programs', 'Building independent travel skills' ),
			'outcomes'    => array( 'Getting where you need to be, on time', 'Less stress about travel', 'More freedom to join in' ),
		),
		'daily-tasks-shared-living'          => array(
			'code'        => '0115',
			'group'       => 'Daily Tasks/Shared Living',
			'title'       => 'Daily Tasks & Shared Living',
			'description' => 'Support with daily tasks in a shared home, helping you live as independently as possible alongside your housemates.',
			'overview'    => array(
				'Living in a shared home can be a great way to gain independence while having company and support close by. We help you with everyday tasks so home life runs smoothly for you and your housemates.',
				'Support is planned around your routines and goals, whether that is cooking, keeping your room tidy, managing appointments or sorting out house responsibilities together. We help build a calm, respectful home where everyone feels comfortable.',
			),
			'icon'        => 'fa-people-roof',
			'includes'    => array( 'Help with daily routines', 'Cooking and meal planning', 'Sharing household responsibilities', 'Managing appointments and medication prompts', 'Building independent living skills', 'Support for a happy shared home' ),
			'suits'       => array( 'Living with housemates', 'Moving into shared living', 'Wanting more independence at home', 'Needing support across the day' ),
			'outcomes'    => array( 'A home that runs smoothly', 'Growing skills and independence', 'Good relationships with housemates' ),
		),
		'innovative-community-participation' => array(
			'code'        => '0116',
			'group'       => 'Innov Community Participation',
			'title'       => 'Innovative Community Participation',
			'description' => 'Creative, goal-focused activities that help you try new things, build skills and connect with mainstream community settings.',
			'overview'    => array(
				'Sometimes the best way to grow is to try something new. We design creative, goal-focused activities that help you build skills and take part in everyday community places, not just disability-specific programs.',
				'Whether you want to learn a new hobby, join a local club or try a course, we start with your interests and plan a pathway together. We support you to take part with confidence, then step back as you grow.',
			),
			'icon'        => 'fa-lightbulb',
			'includes'    => array( 'New and mainstream community activities', 'Skill-building through creative programs', 'Pathways into clubs and groups', 'Activities tailored to your interests', 'Support to try new experiences', 'Building confidence in new settings' ),
			'suits'       => array( 'Wanting to try something new', 'Building skills through hobbies', 'Joining mainstream groups', 'People who learn by doing' ),
			'outcomes'    => array( 'New interests and experiences', 'Practical skills you can use', 'Stronger links to your community' ),
		),
		'life-skills-development'            => array(
			'code'        => '0117',
			'group'       => 'Development-Life Skills',
			'title'       => 'Life Skills Development',
			'description' => 'Build confidence with budgeting, cooking, travel and everyday skills that help you do more for yourself.',
			'overview'    => array(
				'Everyday skills open doors to more independence. We help you learn and practise the skills that matter to you, in real settings and at a pace that feels right.',
				'That could be planning a budget, cooking a meal, catching the bus, shopping or making decisions with confidence. We break skills into manageable steps and celebrate progress along the way.',
			),
			'icon'        => 'fa-seedling',
			'includes'    => array( 'Budgeting and money skills', 'Cooking and nutrition', 'Using public transport', 'Shopping and household planning', 'Communication and social skills', 'Confidence and decision-making' ),
			'suits'       => array( 'Preparing to live more independently', 'Young people leaving school', 'Anyone wanting to learn new skills', 'Building confidence day to day' ),
			'outcomes'    => array( 'Skills you use every day', 'Doing more things for yourself', 'Greater confidence and choice' ),
		),
		'household-tasks'                    => array(
			'code'        => '0120',
			'group'       => 'Household Tasks',
			'title'       => 'Household Tasks',
			'description' => 'Help with cleaning, laundry, meal preparation and keeping your home safe, comfortable and running smoothly.',
			'overview'    => array(
				'A clean, comfortable home helps you feel good and stay safe. We help with the household jobs you find hard or would rather not do, so you can spend your energy on the things you enjoy.',
				'Our workers follow your preferences, from how you like the kitchen organised to which products you use. Support can be regular or as needed, and we can work alongside you if you would like to build your own skills too.',
			),
			'icon'        => 'fa-broom',
			'includes'    => array( 'General cleaning', 'Laundry and linen', 'Meal preparation', 'Grocery shopping', 'Keeping your home safe and tidy', 'Light garden and home upkeep' ),
			'suits'       => array( 'Finding housework hard', 'Living on your own', 'Recovering after illness or injury', 'Wanting more time for what you enjoy' ),
			'outcomes'    => array( 'A clean, safe, comfortable home', 'More energy for the things you love', 'Support done the way you like' ),
		),
		'community-participation'            => array(
			'code'        => '0125',
			'group'       => 'Participate Community',
			'title'       => 'Community Participation',
			'description' => 'Get out, connect and take part. We support social outings, hobbies and building connections in your community.',
			'overview'    => array(
				'Being part of your community matters. We support you to get out, meet people and enjoy the activities that make life fun and meaningful.',
				'That might be going to the footy, the gym, the library, a café, a place of worship or a community event. We help you plan, get there and join in, and over time support you to build friendships and connections of your own.',
			),
			'icon'        => 'fa-people-group',
			'includes'    => array( 'Social outings and events', 'Hobbies, sport and recreation', 'Cultural and faith-based activities', 'Volunteering, study and courses', 'Building friendships', 'Support to join clubs and groups' ),
			'suits'       => array( 'Wanting to get out more', 'Feeling isolated or lonely', 'Exploring hobbies and interests', 'Building a social network' ),
			'outcomes'    => array( 'More time doing what you enjoy', 'New friendships and connections', 'A stronger sense of belonging' ),
		),
		'specialised-supported-employment'   => array(
			'code'        => '0133',
			'group'       => 'Spec Support Employ',
			'title'       => 'Specialised Supported Employment',
			'description' => 'Work in a supported setting with ongoing help on the job, so you can build skills, earn and grow your confidence.',
			'overview'    => array(
				'Supported employment gives you the chance to work, earn and learn in a setting where help is always close by. We provide ongoing support on the job so you can build skills and confidence at your own pace.',
				'We help you understand your tasks, settle into routines and work well with your team. As your skills grow, we can talk about your next steps, including moving towards other kinds of work if that is your goal.',
			),
			'icon'        => 'fa-screwdriver-wrench',
			'includes'    => array( 'Supported work environments', 'Ongoing on-the-job assistance', 'Workplace skills training', 'Help with routines and tasks', 'Teamwork and communication support', 'Help building work confidence' ),
			'suits'       => array( 'Needing ongoing support at work', 'Building work skills and experience', 'Wanting to earn an income', 'Planning future work goals' ),
			'outcomes'    => array( 'Meaningful, paid work', 'Growing skills and confidence', 'A pathway towards your work goals' ),
		),
		'group-centre-activities'            => array(
			'code'        => '0136',
			'group'       => 'Group/Centre Activities',
			'title'       => 'Group & Centre Activities',
			'description' => 'Enjoy social, recreational and skill-building activities in a group or centre, with support to join in and make friends.',
			'overview'    => array(
				'Group activities are a great way to have fun, learn something new and meet people with shared interests. We support you to take part in social, recreational and skill-building programs in a group or centre.',
				'Activities are structured and supportive, with staff on hand to help you join in and feel included. It is a relaxed way to build routines, confidence and friendships.',
			),
			'icon'        => 'fa-puzzle-piece',
			'includes'    => array( 'Group social and recreational programs', 'Centre-based skill-building', 'Arts, games and creative activities', 'Making friends and connections', 'Structured activities with support', 'Regular routines to look forward to' ),
			'suits'       => array( 'Enjoying time with others', 'Wanting regular structured activities', 'Building social confidence', 'Learning in a group setting' ),
			'outcomes'    => array( 'Fun, regular activities', 'New friends with shared interests', 'Skills and confidence that grow' ),
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
