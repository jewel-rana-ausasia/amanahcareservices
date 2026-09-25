<?php
/**
 * amanahcareservices Theme Customizer
 *
 * @package amanahcareservices
 */

/**
 * Register Customizer panels, sections and settings.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function amanahcareservices_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$defaults = amanahcareservices_contact_defaults();

	$wp_customize->add_panel(
		'amanahcareservices_options',
		array(
			'title'       => esc_html__( 'Amanah Theme Options', 'amanahcareservices' ),
			'description' => esc_html__( 'Contact details, social links and homepage content used across the website.', 'amanahcareservices' ),
			'priority'    => 30,
		)
	);

	/*
	 * Contact details.
	 */
	$wp_customize->add_section(
		'amanahcareservices_contact',
		array(
			'title'       => esc_html__( 'Contact Details', 'amanahcareservices' ),
			'description' => esc_html__( 'Shown in the header, footer and homepage. Leave a field empty to hide it everywhere.', 'amanahcareservices' ),
			'panel'       => 'amanahcareservices_options',
		)
	);

	$contact_fields = array(
		'phone'              => array( __( 'Phone', 'amanahcareservices' ), 'text', 'sanitize_text_field' ),
		'mobile'             => array( __( 'Mobile', 'amanahcareservices' ), 'text', 'sanitize_text_field' ),
		'email'              => array( __( 'Email', 'amanahcareservices' ), 'email', 'sanitize_email' ),
		'address'            => array( __( 'Office Address', 'amanahcareservices' ), 'textarea', 'sanitize_textarea_field' ),
		'service_area'       => array( __( 'Service Area (e.g. Western Sydney & surrounds)', 'amanahcareservices' ), 'text', 'sanitize_text_field' ),
		'business_hours'     => array( __( 'Business Hours', 'amanahcareservices' ), 'textarea', 'sanitize_textarea_field' ),
		'abn'                => array( __( 'ABN', 'amanahcareservices' ), 'text', 'sanitize_text_field' ),
		'ndis_number'        => array( __( 'NDIS Registration Number (shows the “Registered NDIS Provider” badge when filled)', 'amanahcareservices' ), 'text', 'sanitize_text_field' ),
		'footer_description' => array( __( 'Footer Introduction', 'amanahcareservices' ), 'textarea', 'sanitize_textarea_field' ),
	);

	foreach ( $contact_fields as $key => $field ) {
		$wp_customize->add_setting(
			'amanahcareservices_' . $key,
			array(
				'default'           => isset( $defaults[ $key ] ) ? $defaults[ $key ] : '',
				'sanitize_callback' => $field[2],
			)
		);
		$wp_customize->add_control(
			'amanahcareservices_' . $key,
			array(
				'label'   => $field[0],
				'section' => 'amanahcareservices_contact',
				'type'    => $field[1],
			)
		);
	}

	/*
	 * Calls to action.
	 */
	$wp_customize->add_section(
		'amanahcareservices_cta',
		array(
			'title'       => esc_html__( 'Buttons & Links', 'amanahcareservices' ),
			'description' => esc_html__( 'Use a site path such as /contact-us/ or a full URL.', 'amanahcareservices' ),
			'panel'       => 'amanahcareservices_options',
		)
	);

	$cta_fields = array(
		'cta_url'      => __( 'Contact Page Link', 'amanahcareservices' ),
		'referral_url' => __( 'Referral Page Link', 'amanahcareservices' ),
	);

	$wp_customize->add_setting(
		'amanahcareservices_contact_form_shortcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'amanahcareservices_contact_form_shortcode',
		array(
			'label'       => esc_html__( 'Contact Form Shortcode (optional)', 'amanahcareservices' ),
			'description' => esc_html__( 'e.g. a Contact Form 7 shortcode. Leave empty to use the built-in form, which emails the Contact Details email address.', 'amanahcareservices' ),
			'section'     => 'amanahcareservices_cta',
			'type'        => 'text',
		)
	);

	foreach ( $cta_fields as $key => $label ) {
		$wp_customize->add_setting(
			'amanahcareservices_' . $key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'amanahcareservices_' . $key,
			array(
				'label'   => $label,
				'section' => 'amanahcareservices_cta',
				'type'    => 'text',
			)
		);
	}

	/*
	 * Social links.
	 */
	$wp_customize->add_section(
		'amanahcareservices_social',
		array(
			'title'       => esc_html__( 'Social Media Links', 'amanahcareservices' ),
			'description' => esc_html__( 'Only networks with a URL are displayed.', 'amanahcareservices' ),
			'panel'       => 'amanahcareservices_options',
		)
	);

	foreach ( amanahcareservices_social_networks() as $key => $network ) {
		$wp_customize->add_setting(
			'amanahcareservices_' . $key . '_url',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			'amanahcareservices_' . $key . '_url',
			array(
				/* translators: %s: social network name. */
				'label'   => sprintf( esc_html__( '%s URL', 'amanahcareservices' ), $network['label'] ),
				'section' => 'amanahcareservices_social',
				'type'    => 'url',
			)
		);
	}

	/*
	 * Homepage.
	 */
	$wp_customize->add_section(
		'amanahcareservices_home',
		array(
			'title'       => esc_html__( 'Homepage', 'amanahcareservices' ),
			'description' => esc_html__( 'Hero image and testimonials. Only add testimonials you have written permission to publish.', 'amanahcareservices' ),
			'panel'       => 'amanahcareservices_options',
		)
	);

	$wp_customize->add_setting(
		'amanahcareservices_hero_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'amanahcareservices_hero_image',
			array(
				'label'       => esc_html__( 'Hero Image', 'amanahcareservices' ),
				'description' => esc_html__( 'Portrait or square photo works best (min. 900px wide). Without an image, a branded illustration is shown.', 'amanahcareservices' ),
				'section'     => 'amanahcareservices_home',
				'mime_type'   => 'image',
			)
		)
	);

	$wp_customize->add_setting(
		'amanahcareservices_about_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'amanahcareservices_about_image',
			array(
				'label'     => esc_html__( 'About Section Image', 'amanahcareservices' ),
				'section'   => 'amanahcareservices_home',
				'mime_type' => 'image',
			)
		)
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		$testimonial_fields = array(
			'quote' => array( __( 'Quote', 'amanahcareservices' ), 'textarea', 'sanitize_textarea_field' ),
			'name'  => array( __( 'Name', 'amanahcareservices' ), 'text', 'sanitize_text_field' ),
			'role'  => array( __( 'Role (e.g. Family member)', 'amanahcareservices' ), 'text', 'sanitize_text_field' ),
		);

		foreach ( $testimonial_fields as $field_key => $field ) {
			$setting_id = 'amanahcareservices_testimonial_' . $i . '_' . $field_key;
			$wp_customize->add_setting(
				$setting_id,
				array(
					'default'           => '',
					'sanitize_callback' => $field[2],
				)
			);
			$wp_customize->add_control(
				$setting_id,
				array(
					/* translators: 1: testimonial number, 2: field label. */
					'label'   => sprintf( esc_html__( 'Testimonial %1$d – %2$s', 'amanahcareservices' ), $i, $field[0] ),
					'section' => 'amanahcareservices_home',
					'type'    => $field[1],
				)
			);
		}
	}

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'amanahcareservices_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'amanahcareservices_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'amanahcareservices_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function amanahcareservices_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function amanahcareservices_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function amanahcareservices_customize_preview_js() {
	wp_enqueue_script( 'amanahcareservices-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'amanahcareservices_customize_preview_js' );
