<?php
/**
 * The template for displaying the footer.
 *
 * @package amanahcareservices
 */

$footer_contact  = amanahcareservices_get_contact();
$footer_socials  = amanahcareservices_get_social_links();
$footer_services = amanahcareservices_get_services();

$footer_quick_links = amanahcareservices_get_menu_links(
	'footer-quick-links',
	array_merge(
		amanahcareservices_default_nav_links(),
		array(
			array( 'label' => __( 'Referral', 'amanahcareservices' ), 'url' => $footer_contact['referral_url'] ),
		)
	)
);

$footer_service_links = amanahcareservices_get_menu_links(
	'footer-services',
	array_map(
		static function ( $service ) {
			return array( 'label' => $service['title'], 'url' => $service['url'] );
		},
		array_values( $footer_services )
	),
	6
);
?>

<footer id="colophon" class="amanah-footer relative overflow-hidden bg-ink text-white/80">
	<div class="amanah-footer-art" aria-hidden="true">
		<span class="amanah-footer-art__line"></span>
		<span class="amanah-footer-art__glow amanah-footer-art__glow--purple"></span>
		<span class="amanah-footer-art__glow amanah-footer-art__glow--green"></span>
	</div>

	<div class="container relative z-10 mx-auto px-5 pt-16 md:px-8 lg:px-12 lg:pt-20">
		<div class="grid grid-cols-1 gap-10 pb-14 md:grid-cols-2 xl:grid-cols-10 xl:gap-8">
			<!-- Brand -->
			<div class="xl:col-span-3">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block rounded-2xl bg-white p-3 shadow-[0_18px_40px_rgba(0,0,0,0.25)] transition hover:-translate-y-0.5">
					<img
						src="<?php echo esc_url( amanahcareservices_get_logo_url( 'stacked' ) ); ?>"
						alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
						width="593"
						height="615"
						class="h-20 w-auto md:h-24"
						loading="lazy"
						decoding="async">
				</a>

				<?php if ( $footer_contact['description'] ) : ?>
					<p class="mt-7 max-w-sm text-sm leading-7 text-white/75"><?php echo esc_html( $footer_contact['description'] ); ?></p>
				<?php endif; ?>

				<?php if ( $footer_socials ) : ?>
					<div class="mt-7">
						<p class="mb-4 text-[11px] font-extrabold uppercase tracking-[0.2em] text-leaf"><?php esc_html_e( 'Connect With Us', 'amanahcareservices' ); ?></p>
						<div class="flex flex-wrap items-center gap-3">
							<?php foreach ( $footer_socials as $footer_social ) : ?>
								<a href="<?php echo esc_url( $footer_social['url'] ); ?>"
									target="_blank"
									rel="noopener noreferrer"
									aria-label="<?php echo esc_attr( sprintf( /* translators: %s: social network. */ __( 'Follow us on %s (opens in a new tab)', 'amanahcareservices' ), $footer_social['label'] ) ); ?>"
									class="group relative flex h-11 w-11 items-center justify-center overflow-hidden rounded-xl border border-white/10 bg-white/[0.06] text-white transition duration-300 hover:-translate-y-1 hover:border-leaf/60">
									<span class="absolute inset-0 translate-y-full bg-gradient-to-br from-secondary to-secondaryDark transition-transform duration-300 group-hover:translate-y-0" aria-hidden="true"></span>
									<i class="fa-brands <?php echo esc_attr( $footer_social['icon'] ); ?> relative z-10" aria-hidden="true"></i>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<!-- Quick links -->
			<div class="xl:col-span-2">
				<h2 class="amanah-footer-heading mb-6 text-xs font-extrabold uppercase tracking-[0.18em] text-white"><?php esc_html_e( 'Quick Links', 'amanahcareservices' ); ?></h2>
				<ul class="amanah-footer-links space-y-3.5 text-sm">
					<?php foreach ( $footer_quick_links as $link ) : ?>
						<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<!-- Services -->
			<div class="xl:col-span-2">
				<h2 class="amanah-footer-heading mb-6 text-xs font-extrabold uppercase tracking-[0.18em] text-white"><?php esc_html_e( 'Our Services', 'amanahcareservices' ); ?></h2>
				<ul class="amanah-footer-links space-y-3.5 text-sm">
					<?php foreach ( $footer_service_links as $link ) : ?>
						<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
				<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="group mt-6 inline-flex items-center gap-2 text-[11px] font-extrabold uppercase tracking-[0.16em] text-leaf transition hover:text-white">
					<?php esc_html_e( 'All services', 'amanahcareservices' ); ?>
					<i class="fa-solid fa-arrow-right text-[9px] transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
				</a>
			</div>

			<!-- Contact -->
			<div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-white/[0.04] p-7 md:p-8 xl:col-span-3">
				<span class="pointer-events-none absolute inset-x-8 top-0 h-px bg-gradient-to-r from-transparent via-leaf/60 to-transparent" aria-hidden="true"></span>
				<h2 class="text-xl font-extrabold text-white"><?php esc_html_e( 'Get In Touch', 'amanahcareservices' ); ?></h2>

				<ul class="mt-6 space-y-4 text-sm">
					<?php if ( $footer_contact['phone'] || $footer_contact['mobile'] ) : ?>
						<li class="flex items-start gap-4">
							<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-secondary/15 text-leaf"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>
							<span>
								<span class="mb-0.5 block font-bold text-white"><?php esc_html_e( 'Call Us', 'amanahcareservices' ); ?></span>
								<?php if ( $footer_contact['phone'] ) : ?>
									<a class="block transition hover:text-leaf" href="<?php echo esc_attr( $footer_contact['phone_uri'] ); ?>"><?php echo esc_html( $footer_contact['phone'] ); ?></a>
								<?php endif; ?>
								<?php if ( $footer_contact['mobile'] ) : ?>
									<a class="block transition hover:text-leaf" href="<?php echo esc_attr( $footer_contact['mobile_uri'] ); ?>"><?php echo esc_html( $footer_contact['mobile'] ); ?></a>
								<?php endif; ?>
							</span>
						</li>
					<?php endif; ?>

					<?php if ( $footer_contact['email'] ) : ?>
						<li class="flex items-start gap-4">
							<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-secondary/15 text-leaf"><i class="fa-solid fa-envelope" aria-hidden="true"></i></span>
							<span class="min-w-0">
								<span class="mb-0.5 block font-bold text-white"><?php esc_html_e( 'Email Us', 'amanahcareservices' ); ?></span>
								<a class="break-all transition hover:text-leaf" href="mailto:<?php echo esc_attr( antispambot( $footer_contact['email'] ) ); ?>"><?php echo esc_html( antispambot( $footer_contact['email'] ) ); ?></a>
							</span>
						</li>
					<?php endif; ?>

					<?php if ( $footer_contact['address'] ) : ?>
						<li class="flex items-start gap-4">
							<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-secondary/15 text-leaf"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span>
							<address class="not-italic">
								<span class="mb-0.5 block font-bold text-white"><?php esc_html_e( 'Visit Us', 'amanahcareservices' ); ?></span>
								<a class="transition hover:text-leaf" href="<?php echo esc_url( $footer_contact['map_url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo nl2br( esc_html( $footer_contact['address'] ) ); ?></a>
							</address>
						</li>
					<?php elseif ( $footer_contact['service_area'] ) : ?>
						<li class="flex items-start gap-4">
							<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-secondary/15 text-leaf"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span>
							<span>
								<span class="mb-0.5 block font-bold text-white"><?php esc_html_e( 'Service Area', 'amanahcareservices' ); ?></span>
								<?php echo esc_html( $footer_contact['service_area'] ); ?>
							</span>
						</li>
					<?php endif; ?>

					<?php if ( $footer_contact['business_hours'] ) : ?>
						<li class="flex items-start gap-4">
							<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-secondary/15 text-leaf"><i class="fa-regular fa-clock" aria-hidden="true"></i></span>
							<span>
								<span class="mb-0.5 block font-bold text-white"><?php esc_html_e( 'Business Hours', 'amanahcareservices' ); ?></span>
								<?php echo nl2br( esc_html( $footer_contact['business_hours'] ) ); ?>
							</span>
						</li>
					<?php endif; ?>
				</ul>

				<?php if ( $footer_contact['ndis_number'] ) : ?>
					<p class="mt-6 flex items-center gap-3 rounded-2xl border border-white/10 bg-white/[0.05] px-4 py-3 text-xs font-semibold text-white/85">
						<i class="fa-solid fa-shield-heart text-base text-leaf" aria-hidden="true"></i>
						<span>
							<?php esc_html_e( 'Registered NDIS Provider', 'amanahcareservices' ); ?>
							<span class="block text-white/60"><?php echo esc_html( sprintf( /* translators: %s: NDIS registration number. */ __( 'Registration No. %s', 'amanahcareservices' ), $footer_contact['ndis_number'] ) ); ?></span>
						</span>
					</p>
				<?php endif; ?>
			</div>
		</div>

		<div class="flex flex-col items-center justify-between gap-3 border-t border-white/10 py-7 text-center text-xs text-white/65 md:flex-row md:text-left">
			<p>
				&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'amanahcareservices' ); ?>
				<?php if ( $footer_contact['abn'] ) : ?>
					<span class="ml-1 border-l border-white/20 pl-2"><?php echo esc_html( sprintf( /* translators: %s: ABN. */ __( 'ABN %s', 'amanahcareservices' ), $footer_contact['abn'] ) ); ?></span>
				<?php endif; ?>
			</p>
			<p class="flex flex-wrap items-center justify-center gap-3">
				<a href="<?php echo esc_url( get_privacy_policy_url() ? get_privacy_policy_url() : home_url( '/privacy-policy/' ) ); ?>" class="font-semibold text-white/85 transition hover:text-leaf"><?php esc_html_e( 'Privacy Policy', 'amanahcareservices' ); ?></a>
				<span class="border-l border-white/20 pl-3">
					<?php esc_html_e( 'Website by', 'amanahcareservices' ); ?>
					<a href="https://www.ausasiaonline.com.au/" target="_blank" rel="noopener noreferrer" class="font-bold text-leaf transition hover:text-white">Aus Asia Online</a>
				</span>
			</p>
		</div>
	</div>
</footer>

<style>
	.amanah-footer {
		background:
			radial-gradient(circle at 12% 0%, rgba(81, 31, 159, 0.45), transparent 38%),
			radial-gradient(circle at 95% 85%, rgba(46, 162, 42, 0.14), transparent 32%),
			linear-gradient(160deg, #1b0b3a 0%, #160930 60%, #10061f 100%);
	}

	.amanah-footer-art {
		position: absolute;
		inset: 0;
		overflow: hidden;
		pointer-events: none;
	}

	.amanah-footer-art>span {
		position: absolute;
		display: block;
	}

	.amanah-footer-art__line {
		top: 0;
		left: 50%;
		width: min(76rem, 90%);
		height: 1px;
		background: linear-gradient(90deg, transparent, rgba(155, 224, 143, 0.55), transparent);
		transform: translateX(-50%);
	}

	.amanah-footer-art__glow {
		border-radius: 9999px;
		filter: blur(110px);
	}

	.amanah-footer-art__glow--purple {
		top: 20%;
		left: 35%;
		width: 22rem;
		height: 22rem;
		background: rgba(124, 77, 206, 0.16);
	}

	.amanah-footer-art__glow--green {
		right: -6rem;
		bottom: 2rem;
		width: 20rem;
		height: 20rem;
		background: rgba(46, 162, 42, 0.1);
	}

	.amanah-footer-links {
		margin: 0;
		padding: 0;
		list-style: none;
	}

	.amanah-footer-links a {
		display: inline-flex;
		align-items: center;
		gap: 0.6rem;
		color: rgba(255, 255, 255, 0.78);
		transition: color 0.25s ease, transform 0.25s ease;
	}

	.amanah-footer-links a::before {
		width: 0.32rem;
		height: 0.32rem;
		border-radius: 9999px;
		background: #9be08f;
		content: "";
		opacity: 0.6;
		transition: opacity 0.25s ease, box-shadow 0.25s ease;
	}

	.amanah-footer-links a:hover {
		color: #fff;
		transform: translateX(0.2rem);
	}

	.amanah-footer-links a:hover::before {
		opacity: 1;
		box-shadow: 0 0 0 4px rgba(155, 224, 143, 0.14);
	}

	.amanah-footer-heading {
		display: flex;
		align-items: center;
		gap: 0.75rem;
	}

	.amanah-footer-heading::after {
		width: 2rem;
		height: 2px;
		border-radius: 9999px;
		background: linear-gradient(90deg, #2ea22a, transparent);
		content: "";
	}
</style>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
