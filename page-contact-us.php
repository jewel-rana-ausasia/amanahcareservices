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
$contact_type      = isset( $_GET['type'] ) ? sanitize_key( wp_unslash( $_GET['type'] ) ) : 'general'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

$contact_cards = array();

if ( $contact_details['phone'] || $contact_details['mobile'] ) {
	$lines = array();
	if ( $contact_details['phone'] ) {
		$lines[] = array( 'label' => $contact_details['phone'], 'url' => $contact_details['phone_uri'] );
	}
	if ( $contact_details['mobile'] ) {
		$lines[] = array( 'label' => $contact_details['mobile'], 'url' => $contact_details['mobile_uri'] );
	}
	$contact_cards[] = array( 'icon' => 'fa-phone-volume', 'title' => __( 'Call us', 'amanahcareservices' ), 'lines' => $lines );
}

if ( $contact_details['email'] ) {
	$contact_cards[] = array(
		'icon'  => 'fa-envelope-open-text',
		'title' => __( 'Email us', 'amanahcareservices' ),
		'lines' => array( array( 'label' => antispambot( $contact_details['email'] ), 'url' => 'mailto:' . antispambot( $contact_details['email'] ) ) ),
	);
}

if ( $contact_details['address'] ) {
	$contact_cards[] = array(
		'icon'  => 'fa-location-dot',
		'title' => __( 'Visit us', 'amanahcareservices' ),
		'lines' => array( array( 'label' => $contact_details['address'], 'url' => $contact_details['map_url'], 'external' => true ) ),
	);
} elseif ( $contact_details['service_area'] ) {
	$contact_cards[] = array(
		'icon'  => 'fa-map-location-dot',
		'title' => __( 'Service area', 'amanahcareservices' ),
		'lines' => array( array( 'label' => $contact_details['service_area'], 'url' => '' ) ),
	);
}

if ( $contact_details['business_hours'] ) {
	$contact_cards[] = array(
		'icon'  => 'fa-clock',
		'title' => __( 'Business hours', 'amanahcareservices' ),
		'lines' => array( array( 'label' => $contact_details['business_hours'], 'url' => '' ) ),
	);
}

$contact_messages = array(
	'sent'    => array( 'tone' => 'success', 'text' => __( 'Thank you. Your message has been sent and our team will be in touch soon.', 'amanahcareservices' ) ),
	'invalid' => array( 'tone' => 'error', 'text' => __( 'Please fill in your name, a valid email, your message and tick the consent box.', 'amanahcareservices' ) ),
	'error'   => array( 'tone' => 'error', 'text' => __( 'Sorry, your message could not be sent. Please try again or contact us by phone.', 'amanahcareservices' ) ),
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
		)
	);
	?>

	<?php if ( $contact_cards ) : ?>
		<!-- Contact cards -->
		<section class="pt-16 sm:pt-20" aria-label="<?php esc_attr_e( 'Contact details', 'amanahcareservices' ); ?>">
			<div class="container mx-auto px-5 md:px-8 lg:px-12">
				<div class="grid gap-5 sm:grid-cols-2 <?php echo count( $contact_cards ) >= 4 ? 'xl:grid-cols-4' : 'lg:grid-cols-' . count( $contact_cards ); ?>">
					<?php foreach ( $contact_cards as $index => $card ) : ?>
						<div class="group relative overflow-hidden rounded-[1.75rem] border border-[#ece6f6] bg-white p-7 shadow-[0_18px_40px_-25px_rgba(27,11,58,0.25)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_26px_55px_-25px_rgba(81,31,159,0.35)]" data-reveal>
							<span class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-primary to-secondary opacity-0 transition group-hover:opacity-100" aria-hidden="true"></span>
							<span class="flex h-14 w-14 items-center justify-center rounded-2xl <?php echo 1 === $index % 2 ? 'bg-mint text-secondaryDark' : 'bg-soft text-primary'; ?> transition group-hover:scale-110">
								<i class="fa-solid <?php echo esc_attr( $card['icon'] ); ?> text-xl" aria-hidden="true"></i>
							</span>
							<h2 class="mt-6 text-sm font-extrabold uppercase tracking-[0.16em] text-body"><?php echo esc_html( $card['title'] ); ?></h2>
							<div class="mt-2 space-y-1 text-lg font-extrabold leading-snug text-ink">
								<?php foreach ( $card['lines'] as $line ) : ?>
									<?php if ( $line['url'] ) : ?>
										<a class="block break-words transition hover:text-primary" href="<?php echo esc_attr( $line['url'] ); ?>" <?php echo ! empty( $line['external'] ) ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>><?php echo nl2br( esc_html( $line['label'] ) ); ?></a>
									<?php else : ?>
										<p><?php echo nl2br( esc_html( $line['label'] ) ); ?></p>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- Form -->
	<section class="py-16 sm:py-20 lg:py-24" aria-labelledby="contact-form-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid gap-10 lg:grid-cols-12 lg:gap-12">
				<div class="lg:col-span-5" data-reveal>
					<div class="amanah-dark-card relative h-full overflow-hidden rounded-[2rem] p-8 text-white shadow-[0_35px_80px_-25px_rgba(27,11,58,0.5)] sm:p-10">
						<span class="pointer-events-none absolute -right-16 -top-16 h-52 w-52 rounded-full border-[34px] border-white/[0.06]" aria-hidden="true"></span>
						<p class="amanah-eyebrow amanah-eyebrow--light"><?php esc_html_e( 'Let’s talk', 'amanahcareservices' ); ?></p>
						<h2 class="mt-5 text-3xl font-extrabold leading-tight tracking-[-0.03em]"><?php esc_html_e( 'Every conversation starts with listening.', 'amanahcareservices' ); ?></h2>
						<p class="mt-5 leading-7 text-white/75"><?php esc_html_e( 'Whether you’re exploring support for yourself or someone you care about, we’ll answer your questions honestly and help you understand your options, with no pressure.', 'amanahcareservices' ); ?></p>

						<ul class="mt-8 space-y-4 text-[15px]">
							<li class="flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-secondary"><i class="fa-solid fa-check text-xs" aria-hidden="true"></i></span><?php esc_html_e( 'Friendly, no-obligation chat', 'amanahcareservices' ); ?></li>
							<li class="flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-secondary"><i class="fa-solid fa-check text-xs" aria-hidden="true"></i></span><?php esc_html_e( 'Help understanding your NDIS plan', 'amanahcareservices' ); ?></li>
							<li class="flex items-center gap-3"><span class="flex h-8 w-8 items-center justify-center rounded-full bg-secondary"><i class="fa-solid fa-check text-xs" aria-hidden="true"></i></span><?php esc_html_e( 'Referrals welcome from anyone', 'amanahcareservices' ); ?></li>
						</ul>

						<?php if ( $contact_socials ) : ?>
							<div class="mt-10 border-t border-white/15 pt-7">
								<p class="text-[11px] font-extrabold uppercase tracking-[0.2em] text-leaf"><?php esc_html_e( 'Follow us', 'amanahcareservices' ); ?></p>
								<div class="mt-4 flex flex-wrap gap-2.5">
									<?php foreach ( $contact_socials as $social ) : ?>
										<a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noopener noreferrer"
											aria-label="<?php echo esc_attr( sprintf( /* translators: %s: social network. */ __( 'Follow us on %s (opens in a new tab)', 'amanahcareservices' ), $social['label'] ) ); ?>"
											class="flex h-11 w-11 items-center justify-center rounded-xl border border-white/15 bg-white/[0.06] transition hover:-translate-y-0.5 hover:border-leaf hover:bg-leaf hover:text-ink">
											<i class="fa-brands <?php echo esc_attr( $social['icon'] ); ?>" aria-hidden="true"></i>
										</a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div id="contact-form" class="rounded-[2rem] border border-[#ece6f6] bg-white p-7 shadow-[0_30px_70px_-35px_rgba(27,11,58,0.3)] sm:p-10 lg:col-span-7" data-reveal>
					<h2 id="contact-form-title" class="text-2xl font-extrabold text-ink sm:text-3xl"><?php esc_html_e( 'Send us a message', 'amanahcareservices' ); ?></h2>
					<p class="mt-2 text-body"><?php esc_html_e( 'Fields marked * are required.', 'amanahcareservices' ); ?></p>

					<?php if ( isset( $contact_messages[ $contact_status ] ) ) : ?>
						<div class="mt-6 flex items-start gap-3 rounded-2xl px-5 py-4 text-sm font-semibold <?php echo 'success' === $contact_messages[ $contact_status ]['tone'] ? 'bg-mint text-secondaryDark' : 'bg-red-50 text-red-700'; ?>" role="<?php echo 'success' === $contact_messages[ $contact_status ]['tone'] ? 'status' : 'alert'; ?>">
							<i class="fa-solid <?php echo 'success' === $contact_messages[ $contact_status ]['tone'] ? 'fa-circle-check' : 'fa-circle-exclamation'; ?> mt-0.5" aria-hidden="true"></i>
							<?php echo esc_html( $contact_messages[ $contact_status ]['text'] ); ?>
						</div>
					<?php endif; ?>

					<?php if ( $contact_shortcode ) : ?>
						<div class="mt-8"><?php echo do_shortcode( $contact_shortcode ); ?></div>
					<?php else : ?>
						<form class="mt-8 grid gap-5 sm:grid-cols-2" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
							<input type="hidden" name="action" value="amanah_contact">
							<?php wp_nonce_field( 'amanah_contact', 'amanah_contact_nonce' ); ?>
							<div class="hidden" aria-hidden="true">
								<label for="amanah_website"><?php esc_html_e( 'Leave this field empty', 'amanahcareservices' ); ?></label>
								<input type="text" id="amanah_website" name="amanah_website" tabindex="-1" autocomplete="off">
							</div>

							<div>
								<label for="amanah_name" class="mb-2 block text-sm font-bold text-ink"><?php esc_html_e( 'Full name', 'amanahcareservices' ); ?> <span class="text-primary">*</span></label>
								<input class="amanah-field" type="text" id="amanah_name" name="amanah_name" autocomplete="name" required>
							</div>
							<div>
								<label for="amanah_phone" class="mb-2 block text-sm font-bold text-ink"><?php esc_html_e( 'Phone', 'amanahcareservices' ); ?></label>
								<input class="amanah-field" type="tel" id="amanah_phone" name="amanah_phone" autocomplete="tel">
							</div>
							<div>
								<label for="amanah_email" class="mb-2 block text-sm font-bold text-ink"><?php esc_html_e( 'Email', 'amanahcareservices' ); ?> <span class="text-primary">*</span></label>
								<input class="amanah-field" type="email" id="amanah_email" name="amanah_email" autocomplete="email" required>
							</div>
							<div>
								<label for="amanah_type" class="mb-2 block text-sm font-bold text-ink"><?php esc_html_e( 'How can we help?', 'amanahcareservices' ); ?></label>
								<select class="amanah-field" id="amanah_type" name="amanah_type">
									<?php foreach ( amanahcareservices_enquiry_types() as $type_key => $type_label ) : ?>
										<option value="<?php echo esc_attr( $type_key ); ?>" <?php selected( $contact_type, $type_key ); ?>><?php echo esc_html( $type_label ); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="sm:col-span-2">
								<label for="amanah_message" class="mb-2 block text-sm font-bold text-ink"><?php esc_html_e( 'Message', 'amanahcareservices' ); ?> <span class="text-primary">*</span></label>
								<textarea class="amanah-field min-h-[160px]" id="amanah_message" name="amanah_message" rows="6" required placeholder="<?php esc_attr_e( 'Tell us a little about the support you’re looking for…', 'amanahcareservices' ); ?>"></textarea>
							</div>
							<div class="sm:col-span-2">
								<label class="flex cursor-pointer items-start gap-3 text-sm leading-6 text-body">
									<input type="checkbox" name="amanah_consent" value="1" class="mt-1 h-4 w-4 shrink-0 accent-[#511f9f]" required>
									<span>
										<?php
										printf(
											/* translators: %s: privacy policy link. */
											esc_html__( 'I agree to Amanah Care Services using these details to respond to my enquiry, as described in the %s.', 'amanahcareservices' ),
											'<a class="font-bold text-primary underline underline-offset-2" href="' . esc_url( get_privacy_policy_url() ? get_privacy_policy_url() : home_url( '/privacy-policy/' ) ) . '">' . esc_html__( 'Privacy Policy', 'amanahcareservices' ) . '</a>'
										);
										?>
									</span>
								</label>
							</div>
							<div class="sm:col-span-2">
								<button type="submit" class="group inline-flex w-full items-center justify-center gap-3 rounded-full border-0 bg-gradient-to-r from-primary to-primaryDark py-3 pl-7 pr-3 text-[12px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_16px_36px_rgba(81,31,159,0.3)] transition hover:-translate-y-0.5 sm:w-auto">
									<?php esc_html_e( 'Send message', 'amanahcareservices' ); ?>
									<span class="flex h-9 w-9 items-center justify-center rounded-full bg-secondary transition-transform group-hover:translate-x-0.5"><i class="fa-solid fa-paper-plane text-xs" aria-hidden="true"></i></span>
								</button>
							</div>
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<?php if ( $contact_details['address'] ) : ?>
		<!-- Map -->
		<section class="px-5 pb-20 md:px-8 lg:px-12" aria-label="<?php esc_attr_e( 'Map', 'amanahcareservices' ); ?>">
			<div class="container mx-auto overflow-hidden rounded-[2rem] border border-[#ece6f6] shadow-[0_30px_70px_-35px_rgba(27,11,58,0.3)]">
				<iframe
					title="<?php esc_attr_e( 'Map showing our office location', 'amanahcareservices' ); ?>"
					src="<?php echo esc_url( 'https://maps.google.com/maps?q=' . rawurlencode( preg_replace( '/\s+/', ' ', $contact_details['address'] ) ) . '&output=embed' ); ?>"
					class="block h-[380px] w-full border-0 lg:h-[460px]"
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</section>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/content', 'page-extra' ); ?>
</main>

<?php
get_footer();
