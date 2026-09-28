<?php
/**
 * Template Name: Contact Us
 *
 * @package amanahcareservices
 */

get_header();

$contact_details   = amanahcareservices_get_contact();
$contact_socials   = amanahcareservices_get_social_links();
$contact_shortcode = trim( (string) get_theme_mod( 'amanahcareservices_contact_form_shortcode', '' ) );
$contact_status    = isset( $_GET['enquiry'] ) ? sanitize_key( wp_unslash( $_GET['enquiry'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
$contact_state     = amanahcareservices_get_contact_form_state();
$contact_values    = $contact_state['values'];
$contact_errors    = 'invalid' === $contact_status ? $contact_state['errors'] : array();
$contact_types     = amanahcareservices_enquiry_types();

$contact_type = isset( $_GET['type'] ) ? sanitize_key( wp_unslash( $_GET['type'] ) ) : 'general'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( ! empty( $contact_values['type'] ) ) {
	$contact_type = $contact_values['type'];
}
if ( ! isset( $contact_types[ $contact_type ] ) ) {
	$contact_type = 'general';
}

/**
 * Saved value for a field (after a failed submission).
 *
 * @param string $key Field key.
 * @return string
 */
$contact_value = static function ( $key ) use ( $contact_values ) {
	return isset( $contact_values[ $key ] ) && is_string( $contact_values[ $key ] ) ? $contact_values[ $key ] : '';
};

/**
 * Accessibility attributes + error markup helpers for a field.
 */
$contact_field_attrs = static function ( $key ) use ( $contact_errors ) {
	$attrs = 'aria-describedby="amanah_' . esc_attr( $key ) . '-error"';
	if ( isset( $contact_errors[ $key ] ) ) {
		$attrs .= ' aria-invalid="true"';
	}
	return $attrs;
};
$contact_field_error = static function ( $key ) use ( $contact_errors ) {
	$message = isset( $contact_errors[ $key ] ) ? $contact_errors[ $key ] : '';
	printf(
		'<p id="amanah_%1$s-error" class="amanah-field-error"%2$s><i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i><span>%3$s</span></p>',
		esc_attr( $key ),
		$message ? '' : ' hidden',
		esc_html( $message )
	);
};

// Contact methods shown in the side panel.
$contact_rows = array();
if ( $contact_details['phone'] ) {
	$contact_rows[] = array( 'icon' => 'fa-phone-volume', 'label' => __( 'Call us', 'amanahcareservices' ), 'value' => $contact_details['phone'], 'url' => $contact_details['phone_uri'] );
}
if ( $contact_details['mobile'] ) {
	$contact_rows[] = array( 'icon' => 'fa-mobile-screen-button', 'label' => $contact_details['phone'] ? __( 'Mobile', 'amanahcareservices' ) : __( 'Call us', 'amanahcareservices' ), 'value' => $contact_details['mobile'], 'url' => $contact_details['mobile_uri'] );
}
if ( $contact_details['email'] ) {
	$contact_rows[] = array( 'icon' => 'fa-envelope-open-text', 'label' => __( 'Email us', 'amanahcareservices' ), 'value' => antispambot( $contact_details['email'] ), 'url' => 'mailto:' . antispambot( $contact_details['email'] ) );
}
if ( $contact_details['address'] ) {
	$contact_rows[] = array( 'icon' => 'fa-location-dot', 'label' => __( 'Visit us', 'amanahcareservices' ), 'value' => $contact_details['address'], 'url' => $contact_details['map_url'], 'external' => true );
}
if ( $contact_details['service_area'] ) {
	$contact_rows[] = array( 'icon' => 'fa-map-location-dot', 'label' => __( 'Service area', 'amanahcareservices' ), 'value' => $contact_details['service_area'], 'url' => '' );
}
if ( $contact_details['business_hours'] ) {
	$contact_rows[] = array( 'icon' => 'fa-clock', 'label' => __( 'Business hours', 'amanahcareservices' ), 'value' => $contact_details['business_hours'], 'url' => '' );
}

$contact_notices = array(
	'invalid' => __( 'A few details need your attention. Please check the highlighted fields below.', 'amanahcareservices' ),
	'error'   => __( 'Sorry, your message could not be sent. Please try again, or contact us by phone or email.', 'amanahcareservices' ),
	'expired' => __( 'Your session timed out before the form was sent. Please try again.', 'amanahcareservices' ),
);

$contact_steps = array(
	array( 'icon' => 'fa-inbox', 'title' => __( 'We receive your message', 'amanahcareservices' ), 'text' => __( 'Your enquiry comes straight to our team, not a call centre.', 'amanahcareservices' ) ),
	array( 'icon' => 'fa-headset', 'title' => __( 'We get in touch', 'amanahcareservices' ), 'text' => __( 'We’ll contact you the way you prefer to talk through your questions.', 'amanahcareservices' ) ),
	array( 'icon' => 'fa-people-group', 'title' => __( 'We plan together', 'amanahcareservices' ), 'text' => __( 'If you’d like to go ahead, we’ll shape support around your goals.', 'amanahcareservices' ) ),
);

?>

<main id="primary" class="site-main overflow-hidden bg-white">
	<?php
	get_template_part(
		'template-parts/content',
		'banner',
		array(
			'eyebrow'     => __( 'Contact Us', 'amanahcareservices' ),
			'title'       => __( 'We’re here to listen.', 'amanahcareservices' ),
			'description' => __( 'Questions about support, referrals or your NDIS plan? Reach out and our friendly team will get back to you.', 'amanahcareservices' ),
			'container'   => 'max-w-[1400px]',
		)
	);
	?>

	<!-- Contact + form -->
	<section class="amanah-contact-section relative py-16 sm:py-20 lg:py-28" aria-labelledby="contact-form-title">
		<span class="pointer-events-none absolute -left-40 top-24 h-96 w-96 rounded-full bg-soft blur-3xl" aria-hidden="true"></span>
		<span class="pointer-events-none absolute -right-32 bottom-10 h-80 w-80 rounded-full bg-mint blur-3xl" aria-hidden="true"></span>

		<div class="relative mx-auto max-w-[1400px] px-5 md:px-8 lg:px-12">
			<div class="grid gap-8 lg:grid-cols-12 lg:gap-8 xl:gap-10">

				<!-- Side panel -->
				<aside class="flex lg:col-span-5" aria-label="<?php esc_attr_e( 'Contact details', 'amanahcareservices' ); ?>" data-reveal>
					<div class="relative flex w-full flex-col bg-gradient-to-br from-primaryDark to-ink overflow-hidden rounded-[1.75rem] p-8 text-white shadow-[0_30px_70px_-30px_rgba(27,11,58,0.55)] sm:p-10">
						<div class="relative">
							<p class="amanah-eyebrow amanah-eyebrow--light"><?php esc_html_e( 'Get in touch', 'amanahcareservices' ); ?></p>
							<h2 class="mt-5 text-3xl font-extrabold leading-tight tracking-[-0.02em] sm:text-[2.1rem]"><?php esc_html_e( 'Talk to our team', 'amanahcareservices' ); ?></h2>
							<p class="mt-4 leading-7 text-white/70"><?php esc_html_e( 'Call, email or send us a message. We’re happy to help.', 'amanahcareservices' ); ?></p>
						</div>

						<?php if ( $contact_rows ) : ?>
							<ul class="relative mt-9 divide-y divide-white/10 border-y border-white/10">
								<?php foreach ( $contact_rows as $row ) : ?>
									<li>
										<?php
										$row_tag   = $row['url'] ? 'a' : 'div';
										$row_attrs = $row['url'] ? ' href="' . esc_attr( $row['url'] ) . '"' . ( ! empty( $row['external'] ) ? ' target="_blank" rel="noopener noreferrer"' : '' ) : '';
										?>
										<<?php echo $row_tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php echo $row_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> class="group flex items-center gap-4 py-5">
											<span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white/[0.08] text-leaf ring-1 ring-white/10 transition duration-300<?php echo $row['url'] ? ' group-hover:bg-leaf group-hover:text-ink' : ''; ?>">
												<i class="fa-solid <?php echo esc_attr( $row['icon'] ); ?>" aria-hidden="true"></i>
											</span>
											<span class="min-w-0 flex-1">
												<span class="block text-xs font-semibold uppercase tracking-[0.16em] text-white/50"><?php echo esc_html( $row['label'] ); ?></span>
												<span class="mt-1 block break-words font-bold leading-6 text-white transition<?php echo $row['url'] ? ' group-hover:text-leaf' : ''; ?>"><?php echo nl2br( esc_html( $row['value'] ) ); ?></span>
											</span>
										</<?php echo $row_tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<?php if ( $contact_socials ) : ?>
							<div class="relative mt-auto flex flex-wrap items-center justify-between gap-4 pt-9">
								<p class="text-xs font-semibold uppercase tracking-[0.16em] text-white/50"><?php esc_html_e( 'Follow us', 'amanahcareservices' ); ?></p>
								<div class="flex flex-wrap gap-2">
									<?php foreach ( $contact_socials as $social ) : ?>
										<a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noopener noreferrer"
											aria-label="<?php echo esc_attr( sprintf( /* translators: %s: social network. */ __( 'Follow us on %s (opens in a new tab)', 'amanahcareservices' ), $social['label'] ) ); ?>"
											class="flex h-10 w-10 items-center justify-center rounded-full bg-white/[0.08] text-sm ring-1 ring-white/10 transition hover:bg-leaf hover:text-ink">
											<i class="fa-brands <?php echo esc_attr( $social['icon'] ); ?>" aria-hidden="true"></i>
										</a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</aside>

				<!-- Form card -->
				<div id="contact-form" class="flex flex-col rounded-[1.75rem] border border-[#ebe5f5] bg-white p-7 shadow-[0_30px_70px_-40px_rgba(27,11,58,0.35)] sm:p-10 lg:col-span-7" data-reveal>
					<?php if ( 'sent' === $contact_status ) : ?>
						<div class="my-auto py-6 text-center" role="status" tabindex="-1" data-contact-focus>
							<span class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-mint text-2xl text-secondary"><i class="fa-solid fa-check" aria-hidden="true"></i></span>
							<h2 id="contact-form-title" class="mt-5 text-2xl font-extrabold text-ink sm:text-3xl"><?php esc_html_e( 'Thank you for reaching out.', 'amanahcareservices' ); ?></h2>
							<p class="mx-auto mt-3 max-w-md leading-7 text-body"><?php esc_html_e( 'Your message is with our team and we’ll be in touch soon. If your enquiry is urgent, please give us a call.', 'amanahcareservices' ); ?></p>
							<a href="<?php echo esc_url( get_permalink() . '#contact-form' ); ?>" class="mt-6 inline-block font-bold text-primary underline underline-offset-4"><?php esc_html_e( 'Send another message', 'amanahcareservices' ); ?></a>
						</div>
					<?php else : ?>
						<div class="border-b border-[#efe9f8] pb-7">
							<p class="amanah-eyebrow"><?php esc_html_e( 'Enquiry form', 'amanahcareservices' ); ?></p>
							<h2 id="contact-form-title" class="mt-4 text-3xl font-extrabold tracking-[-0.02em] text-ink sm:text-[2.1rem]"><?php esc_html_e( 'Send us a message', 'amanahcareservices' ); ?></h2>
							<p class="mt-3 leading-7 text-body"><?php esc_html_e( 'Fill in your details and our team will get back to you.', 'amanahcareservices' ); ?></p>
						</div>

						<?php if ( isset( $contact_notices[ $contact_status ] ) ) : ?>
							<div class="mt-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm leading-6 text-red-800" role="alert" tabindex="-1" data-contact-focus>
								<p class="font-semibold"><?php echo esc_html( $contact_notices[ $contact_status ] ); ?></p>
								<?php if ( $contact_errors ) : ?>
									<ul class="mt-1 list-disc pl-5">
										<?php foreach ( $contact_errors as $error_key => $error_text ) : ?>
											<li><a class="underline" href="#amanah_<?php echo esc_attr( $error_key ); ?>"><?php echo esc_html( $error_text ); ?></a></li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php if ( $contact_shortcode ) : ?>
							<div class="amanah-form mt-6"><?php echo do_shortcode( $contact_shortcode ); ?></div>
						<?php else : ?>
							<form class="amanah-form mt-7 grid gap-x-5 gap-y-6 sm:grid-cols-2" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate data-contact-form>
								<input type="hidden" name="action" value="amanah_contact">
								<?php wp_nonce_field( 'amanah_contact', 'amanah_contact_nonce' ); ?>
								<div class="amanah-hp" aria-hidden="true">
									<label for="amanah_website"><?php esc_html_e( 'Leave this field empty', 'amanahcareservices' ); ?></label>
									<input type="text" id="amanah_website" name="amanah_website" tabindex="-1" autocomplete="off">
								</div>

								<div>
									<label for="amanah_name" class="amanah-label"><?php esc_html_e( 'Full name', 'amanahcareservices' ); ?> *</label>
									<input class="amanah-field" type="text" id="amanah_name" name="amanah_name" autocomplete="name" maxlength="100" required value="<?php echo esc_attr( $contact_value( 'name' ) ); ?>" <?php echo $contact_field_attrs( 'name' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
									<?php $contact_field_error( 'name' ); ?>
								</div>
								<div>
									<label for="amanah_email" class="amanah-label"><?php esc_html_e( 'Email', 'amanahcareservices' ); ?> *</label>
									<input class="amanah-field" type="email" id="amanah_email" name="amanah_email" autocomplete="email" maxlength="150" required value="<?php echo esc_attr( $contact_value( 'email' ) ); ?>" <?php echo $contact_field_attrs( 'email' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
									<?php $contact_field_error( 'email' ); ?>
								</div>
								<div>
									<label for="amanah_phone" class="amanah-label"><?php esc_html_e( 'Phone', 'amanahcareservices' ); ?></label>
									<input class="amanah-field" type="tel" id="amanah_phone" name="amanah_phone" autocomplete="tel" maxlength="25" value="<?php echo esc_attr( $contact_value( 'phone' ) ); ?>" <?php echo $contact_field_attrs( 'phone' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
									<?php $contact_field_error( 'phone' ); ?>
								</div>
								<div>
									<label for="amanah_type" class="amanah-label"><?php esc_html_e( 'What can we help with?', 'amanahcareservices' ); ?></label>
									<select class="amanah-field amanah-select" id="amanah_type" name="amanah_type">
										<?php foreach ( $contact_types as $type_key => $type_label ) : ?>
											<option value="<?php echo esc_attr( $type_key ); ?>" <?php selected( $contact_type, $type_key ); ?>><?php echo esc_html( $type_label ); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="sm:col-span-2">
									<label for="amanah_message" class="amanah-label"><?php esc_html_e( 'Message', 'amanahcareservices' ); ?> *</label>
									<textarea class="amanah-field" id="amanah_message" name="amanah_message" rows="6" maxlength="3000" required <?php echo $contact_field_attrs( 'message' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_textarea( $contact_value( 'message' ) ); ?></textarea>
									<?php $contact_field_error( 'message' ); ?>
								</div>
								<div class="sm:col-span-2">
									<label class="amanah-consent">
										<input type="checkbox" id="amanah_consent" name="amanah_consent" value="1" required <?php checked( ! empty( $contact_values['consent'] ) ); ?> <?php echo $contact_field_attrs( 'consent' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
										<span class="amanah-consent__box" aria-hidden="true"><i class="fa-solid fa-check"></i></span>
										<span>
											<?php
											printf(
												/* translators: %s: privacy policy link. */
												esc_html__( 'I agree to the %s and consent to being contacted about this enquiry.', 'amanahcareservices' ),
												'<a href="' . esc_url( get_privacy_policy_url() ? get_privacy_policy_url() : home_url( '/privacy-policy/' ) ) . '">' . esc_html__( 'Privacy Policy', 'amanahcareservices' ) . '</a>'
											);
											?>
											<span class="text-red-600" aria-hidden="true">*</span>
										</span>
									</label>
									<?php $contact_field_error( 'consent' ); ?>
								</div>
								<div class="flex flex-col-reverse gap-4 sm:col-span-2 sm:flex-row sm:items-center sm:justify-between">
									<p class="text-sm text-body/80"><?php esc_html_e( 'Fields marked * are required.', 'amanahcareservices' ); ?></p>
									<button type="submit" class="amanah-submit" data-contact-submit>
										<span class="amanah-submit__label"><?php esc_html_e( 'Send message', 'amanahcareservices' ); ?></span>
										<span class="amanah-submit__loading" aria-hidden="true"><?php esc_html_e( 'Sending…', 'amanahcareservices' ); ?></span>
										<i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
									</button>
								</div>
							</form>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- What happens next -->
	<section class="bg-soft/60 py-16 sm:py-20" aria-labelledby="contact-next-title">
		<div class="mx-auto max-w-[1400px] px-5 md:px-8 lg:px-12">
			<div class="mx-auto max-w-2xl text-center" data-reveal>
				<p class="amanah-eyebrow justify-center"><?php esc_html_e( 'What happens next', 'amanahcareservices' ); ?></p>
				<h2 id="contact-next-title" class="mt-4 text-3xl font-extrabold tracking-[-0.02em] text-ink sm:text-4xl"><?php esc_html_e( 'Simple, friendly and at your pace', 'amanahcareservices' ); ?></h2>
			</div>
			<ol class="relative mt-12 grid gap-5 md:grid-cols-3">
				<span class="pointer-events-none absolute left-[16%] right-[16%] top-[3.25rem] hidden h-px border-t-2 border-dashed border-primary/15 md:block" aria-hidden="true"></span>
				<?php foreach ( $contact_steps as $step_index => $step ) : ?>
					<li class="relative rounded-[1.75rem] border border-[#ece6f6] bg-white p-7 text-center shadow-[0_18px_40px_-28px_rgba(27,11,58,0.3)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_28px_55px_-28px_rgba(81,31,159,0.4)]" data-reveal>
						<span class="relative mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-primary to-primaryDark text-lg text-white shadow-[0_14px_30px_-10px_rgba(81,31,159,0.55)]">
							<i class="fa-solid <?php echo esc_attr( $step['icon'] ); ?>" aria-hidden="true"></i>
							<span class="absolute -right-2 -top-2 flex h-6 w-6 items-center justify-center rounded-full bg-secondary text-[11px] font-extrabold ring-4 ring-white"><?php echo esc_html( $step_index + 1 ); ?></span>
						</span>
						<h3 class="mt-6 text-lg font-extrabold text-ink"><?php echo esc_html( $step['title'] ); ?></h3>
						<p class="mt-2 leading-7 text-body"><?php echo esc_html( $step['text'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<?php
	// Map: office address when set, otherwise Sydney as the service region.
	$map_has_address = (bool) $contact_details['address'];
	$map_query       = $map_has_address ? preg_replace( '/\s+/', ' ', $contact_details['address'] ) : 'Sydney NSW, Australia';
	$map_zoom        = $map_has_address ? 15 : 10;
	$map_link        = $map_has_address ? $contact_details['map_url'] : 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $map_query );
	?>
	<!-- Map -->
	<section class="mx-auto max-w-[1400px] px-5 py-16 sm:py-20 md:px-8 lg:px-12" aria-label="<?php esc_attr_e( 'Map', 'amanahcareservices' ); ?>">
		<div class="relative overflow-hidden rounded-[2rem] border border-[#ece6f6] shadow-[0_30px_70px_-35px_rgba(27,11,58,0.3)]" data-reveal>
			<iframe
				title="<?php echo $map_has_address ? esc_attr__( 'Map showing our office location', 'amanahcareservices' ) : esc_attr__( 'Map of Sydney, our service area', 'amanahcareservices' ); ?>"
				src="<?php echo esc_url( 'https://maps.google.com/maps?q=' . rawurlencode( $map_query ) . '&z=' . $map_zoom . '&t=k&output=embed' ); ?>"
				class="block h-[380px] w-full border-0 lg:h-[480px]"
				loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div class="border-t border-[#ece6f6] bg-white p-6 sm:absolute sm:bottom-6 sm:left-6 sm:max-w-sm sm:rounded-2xl sm:border-0 sm:shadow-[0_24px_50px_-20px_rgba(27,11,58,0.45)]">
				<div class="flex items-start gap-4">
					<span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-soft text-primary"><i class="fa-solid <?php echo $map_has_address ? 'fa-location-dot' : 'fa-map-location-dot'; ?>" aria-hidden="true"></i></span>
					<div>
						<?php if ( $map_has_address ) : ?>
							<p class="text-[10.5px] font-extrabold uppercase tracking-[0.2em] text-body"><?php esc_html_e( 'Find us', 'amanahcareservices' ); ?></p>
							<p class="mt-1 font-bold leading-6 text-ink"><?php echo nl2br( esc_html( $contact_details['address'] ) ); ?></p>
						<?php else : ?>
							<p class="text-[10.5px] font-extrabold uppercase tracking-[0.2em] text-body"><?php esc_html_e( 'Where we support', 'amanahcareservices' ); ?></p>
							<p class="mt-1 font-bold leading-6 text-ink"><?php echo esc_html( $contact_details['service_area'] ? $contact_details['service_area'] : __( 'Sydney, NSW', 'amanahcareservices' ) ); ?></p>
						<?php endif; ?>
						<a class="mt-3 inline-flex items-center gap-2 text-sm font-extrabold text-primary transition hover:gap-3" href="<?php echo esc_url( $map_link ); ?>" target="_blank" rel="noopener noreferrer"><?php echo $map_has_address ? esc_html__( 'Get directions', 'amanahcareservices' ) : esc_html__( 'View on Google Maps', 'amanahcareservices' ); ?><i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'amanahcareservices' ); ?></span></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/content', 'page-extra' ); ?>
</main>

<?php
get_footer();
