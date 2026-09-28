<?php
/**
 * Template Name: Services
 *
 * All services on one page as glass tabs. Each service keeps its own anchor
 * (/services/#slug), which opens that tab. Without JavaScript every service
 * is shown in full, one after another.
 *
 * @package amanahcareservices
 */

get_header();

$services_contact = amanahcareservices_get_contact();
$services_phone   = amanahcareservices_get_primary_phone();
$services_list    = array_values( amanahcareservices_get_services() );
$services_total   = count( $services_list );

// Site button styles (as used on the homepage and header).
$btn_base    = 'group relative inline-flex min-h-[50px] items-center justify-center overflow-hidden rounded-md px-7 text-[11px] font-extrabold uppercase tracking-[0.14em] transition duration-300 hover:-translate-y-0.5';
$btn_primary = $btn_base . ' bg-primary text-white shadow-[0_14px_32px_rgba(81,31,159,.28)] hover:bg-primaryDark hover:shadow-[0_18px_38px_rgba(81,31,159,.36)]';
$btn_outline = $btn_base . ' border border-primary/25 bg-white text-primary shadow-[0_10px_24px_-12px_rgba(27,11,58,.2)] hover:border-primary/50';
$btn_white   = $btn_base . ' bg-white text-primary shadow-[0_14px_32px_rgba(0,0,0,.25)] hover:bg-soft';
$btn_ghost   = $btn_base . ' gap-3 border border-white/25 text-white hover:border-white/50 hover:bg-white/10';
$btn_bar     = '<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>';
$btn_arrow   = '<span class="ml-3 flex items-center"><i class="fa-solid fa-arrow-right text-[12px] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i></span>';
?>

<main id="primary" class="site-main bg-white">
	<?php
	get_template_part(
		'template-parts/content',
		'banner',
		array(
			'eyebrow'     => __( 'Our Services', 'amanahcareservices' ),
			'title'       => __( 'Support for everyday life, shaped around you.', 'amanahcareservices' ),
			'description' => __( 'Flexible, person-centred services you can combine and adjust as your goals change.', 'amanahcareservices' ),
		)
	);
	?>

	<section class="amanah-svc relative isolate overflow-hidden pb-20 pt-16 sm:pb-24 sm:pt-20 lg:pb-28" aria-labelledby="services-intro-title">
		<span class="amanah-svc__orb amanah-svc__orb--purple" aria-hidden="true"></span>
		<span class="amanah-svc__orb amanah-svc__orb--green" aria-hidden="true"></span>
		<span class="amanah-svc__orb amanah-svc__orb--lilac" aria-hidden="true"></span>

		<div class="container relative mx-auto px-5 md:px-8 lg:px-12">
			<!-- Intro -->
			<div class="mx-auto max-w-5xl text-center" data-reveal>
				<p class="amanah-eyebrow justify-center"><?php esc_html_e( 'How we can help', 'amanahcareservices' ); ?></p>
				<h2 id="services-intro-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl">
					<?php esc_html_e( 'Choose the support', 'amanahcareservices' ); ?>
					<span class="text-primary"><?php esc_html_e( 'that fits your life.', 'amanahcareservices' ); ?></span>
				</h2>
				<p class="mx-auto mt-6 max-w-4xl text-lg leading-8 text-body">
					<?php
					echo esc_html(
						sprintf(
							/* translators: %d: number of NDIS registration groups. */
							__( 'We are registered to deliver %d NDIS support categories. Every service is tailored to you. Tell us your goals and routines and we’ll build a support plan around them, with familiar, caring workers you can trust.', 'amanahcareservices' ),
							$services_total
						)
					);
					?>
				</p>
			</div>

			<div class="mt-12 lg:mt-14" data-service-tabs>
				<!-- Glass tab bar -->
				<div class="amanah-svc-tabs" data-reveal>
					<div class="amanah-svc-tabs__list" role="tablist" aria-label="<?php esc_attr_e( 'Our services', 'amanahcareservices' ); ?>">
						<?php foreach ( $services_list as $index => $service ) : ?>
							<a href="#<?php echo esc_attr( $service['slug'] ); ?>"
								id="tab-<?php echo esc_attr( $service['slug'] ); ?>"
								class="amanah-svc-tab"
								role="tab"
								aria-controls="<?php echo esc_attr( $service['slug'] ); ?>"
								aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
								data-tab="<?php echo esc_attr( $service['slug'] ); ?>">
								<span class="amanah-svc-tab__icon" aria-hidden="true"><i class="fa-solid <?php echo esc_attr( $service['icon'] ); ?>"></i></span>
								<span class="amanah-svc-tab__label"><?php echo esc_html( ! empty( $service['group'] ) ? $service['group'] : $service['title'] ); ?></span>
							</a>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- Service panels -->
				<div class="mt-8 space-y-8 lg:mt-10">
					<?php foreach ( $services_list as $index => $service ) : ?>
						<?php
						$is_green  = 1 === $index % 2;
						$heading   = ! empty( $service['group'] ) ? $service['group'] : $service['title'];
						$prev      = $services_list[ ( $index - 1 + $services_total ) % $services_total ];
						$next      = $services_list[ ( $index + 1 ) % $services_total ];
						$panel_num = str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT );
						?>
						<article id="<?php echo esc_attr( $service['slug'] ); ?>"
							class="amanah-svc-panel <?php echo $is_green ? 'is-green' : ''; ?>"
							role="tabpanel"
							tabindex="-1"
							aria-labelledby="<?php echo esc_attr( $service['slug'] ); ?>-title">
							<div class="grid gap-8 lg:grid-cols-12 lg:gap-14">
								<!-- Media (stays in view while reading on desktop) -->
								<div class="lg:col-span-5">
									<div class="amanah-svc-media-wrap">
										<div class="amanah-svc-media">
											<?php if ( $service['image'] ) : ?>
												<img src="<?php echo esc_url( $service['image'] ); ?>" alt="" loading="<?php echo 0 === $index ? 'eager' : 'lazy'; ?>" decoding="async" class="amanah-svc-media__img">
											<?php else : ?>
												<span class="amanah-svc-media__placeholder" aria-hidden="true"><i class="fa-solid <?php echo esc_attr( $service['icon'] ); ?>"></i></span>
											<?php endif; ?>
											<span class="amanah-svc-media__shade" aria-hidden="true"></span>

											<?php if ( ! empty( $service['code'] ) ) : ?>
												<span class="amanah-svc-glass-chip absolute left-4 top-4">
													<span class="sr-only"><?php esc_html_e( 'NDIS registration group', 'amanahcareservices' ); ?></span>
													<span aria-hidden="true">NDIS</span> <?php echo esc_html( $service['code'] ); ?>
												</span>
											<?php endif; ?>
											<span class="amanah-svc-media__num" aria-hidden="true"><?php echo esc_html( $panel_num ); ?></span>

											<div class="amanah-svc-media__card">
												<span class="amanah-svc-media__icon" aria-hidden="true"><i class="fa-solid <?php echo esc_attr( $service['icon'] ); ?>"></i></span>
												<span class="min-w-0">
													<span class="block text-[10px] font-extrabold uppercase tracking-[0.2em] text-white/70"><?php esc_html_e( 'Amanah Care Services', 'amanahcareservices' ); ?></span>
													<span class="mt-1 block text-base font-extrabold leading-snug text-white"><?php echo esc_html( $service['title'] ); ?></span>
												</span>
											</div>
										</div>
									</div>
								</div>

								<!-- Content -->
								<div class="lg:col-span-7 lg:py-3">
									<div class="flex flex-wrap items-center gap-3">
										<span class="amanah-svc-kicker"><?php echo esc_html( sprintf( '%s / %s', $panel_num, str_pad( (string) $services_total, 2, '0', STR_PAD_LEFT ) ) ); ?></span>
										<span class="h-px w-10 bg-gradient-to-r from-secondary to-primary" aria-hidden="true"></span>
										<span class="text-[11px] font-extrabold uppercase tracking-[0.2em] text-body"><?php esc_html_e( 'NDIS support service', 'amanahcareservices' ); ?></span>
									</div>

									<h2 id="<?php echo esc_attr( $service['slug'] ); ?>-title" class="mt-5 text-3xl font-extrabold leading-[1.1] tracking-[-0.035em] text-ink md:text-[2.6rem]"><?php echo esc_html( $heading ); ?></h2>
									<?php if ( $heading !== $service['title'] ) : ?>
										<p class="mt-3 text-lg font-bold tracking-[-0.01em] <?php echo $is_green ? 'text-secondaryDark' : 'text-primary'; ?>"><?php echo esc_html( $service['title'] ); ?></p>
									<?php endif; ?>

									<p class="amanah-svc-lead"><?php echo esc_html( $service['description'] ); ?></p>

									<?php if ( ! empty( $service['overview'] ) ) : ?>
										<div class="mt-6 space-y-4">
											<?php foreach ( (array) $service['overview'] as $paragraph ) : ?>
												<p class="text-[15.5px] leading-[1.85] text-body"><?php echo esc_html( $paragraph ); ?></p>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>

									<?php if ( ! empty( $service['includes'] ) ) : ?>
										<div class="amanah-svc-block">
											<h3 class="amanah-svc-block__title">
												<span class="amanah-svc-block__icon" aria-hidden="true"><i class="fa-solid fa-list-check"></i></span>
												<?php esc_html_e( 'What’s included', 'amanahcareservices' ); ?>
											</h3>
											<ul class="amanah-svc-includes">
												<?php foreach ( $service['includes'] as $item ) : ?>
													<li>
														<span class="amanah-svc-includes__tick" aria-hidden="true"><i class="fa-solid fa-check"></i></span>
														<span><?php echo esc_html( $item ); ?></span>
													</li>
												<?php endforeach; ?>
											</ul>
										</div>
									<?php endif; ?>
								</div>
							</div>

							<?php if ( ! empty( $service['suits'] ) || ! empty( $service['outcomes'] ) ) : ?>
								<div class="amanah-svc-duo">
									<?php if ( ! empty( $service['suits'] ) ) : ?>
										<div class="amanah-svc-duo__col">
											<h3 class="amanah-svc-block__title">
												<span class="amanah-svc-block__icon" aria-hidden="true"><i class="fa-solid fa-user-group"></i></span>
												<?php esc_html_e( 'Who it’s for', 'amanahcareservices' ); ?>
											</h3>
											<ul class="mt-5 space-y-3">
												<?php foreach ( $service['suits'] as $item ) : ?>
													<li class="flex items-start gap-3 text-[15px] font-semibold leading-6 text-ink">
														<span class="amanah-svc-dot" aria-hidden="true"></span>
														<?php echo esc_html( $item ); ?>
													</li>
												<?php endforeach; ?>
											</ul>
										</div>
									<?php endif; ?>

									<?php if ( ! empty( $service['outcomes'] ) ) : ?>
										<div class="amanah-svc-duo__col">
											<h3 class="amanah-svc-block__title">
												<span class="amanah-svc-block__icon" aria-hidden="true"><i class="fa-solid fa-star"></i></span>
												<?php esc_html_e( 'What you can expect', 'amanahcareservices' ); ?>
											</h3>
											<ol class="mt-5 space-y-3">
												<?php foreach ( $service['outcomes'] as $o_index => $item ) : ?>
													<li class="flex items-start gap-3 text-[15px] font-semibold leading-6 text-ink">
														<span class="amanah-svc-step" aria-hidden="true"><?php echo esc_html( $o_index + 1 ); ?></span>
														<?php echo esc_html( $item ); ?>
													</li>
												<?php endforeach; ?>
											</ol>
										</div>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<!-- CTA strip -->
							<div class="amanah-svc-cta">
								<div class="relative flex items-center gap-4">
									<span class="amanah-svc-cta__icon" aria-hidden="true"><i class="fa-solid fa-comments"></i></span>
									<div>
										<p class="text-lg font-extrabold leading-snug text-white">
											<?php
											echo esc_html(
												sprintf(
													/* translators: %s: service name. */
													__( 'Ready to talk about %s?', 'amanahcareservices' ),
													$service['title']
												)
											);
											?>
										</p>
										<p class="mt-1 text-sm text-white/70"><?php esc_html_e( 'Tell us what you need and we’ll build a support plan around you.', 'amanahcareservices' ); ?></p>
									</div>
								</div>
								<div class="relative flex flex-col gap-3 sm:flex-row sm:shrink-0">
									<a href="<?php echo esc_url( $services_contact['cta_url'] ); ?>" class="<?php echo esc_attr( $btn_white ); ?>">
										<span><?php esc_html_e( 'Enquire now', 'amanahcareservices' ); ?></span>
										<?php echo $btn_arrow . $btn_bar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static markup. ?>
									</a>
									<?php if ( $services_phone['label'] ) : ?>
										<a href="<?php echo esc_attr( $services_phone['uri'] ); ?>" class="<?php echo esc_attr( $btn_ghost ); ?>">
											<i class="fa-solid fa-phone text-[12px] text-leaf" aria-hidden="true"></i>
											<span><?php echo esc_html( $services_phone['label'] ); ?></span>
											<?php echo $btn_bar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static markup. ?>
										</a>
									<?php endif; ?>
								</div>
							</div>

							<!-- Previous / next -->
							<nav class="amanah-svc-pager mt-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between" aria-label="<?php esc_attr_e( 'More services', 'amanahcareservices' ); ?>">
								<a href="#<?php echo esc_attr( $prev['slug'] ); ?>" data-tab-target="<?php echo esc_attr( $prev['slug'] ); ?>" class="<?php echo esc_attr( $btn_outline ); ?>">
									<i class="fa-solid fa-arrow-left mr-3 text-[12px] transition-transform duration-300 group-hover:-translate-x-1" aria-hidden="true"></i>
									<span><span class="sr-only"><?php esc_html_e( 'Previous service:', 'amanahcareservices' ); ?> </span><?php echo esc_html( ! empty( $prev['group'] ) ? $prev['group'] : $prev['title'] ); ?></span>
									<?php echo $btn_bar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static markup. ?>
								</a>
								<a href="#<?php echo esc_attr( $next['slug'] ); ?>" data-tab-target="<?php echo esc_attr( $next['slug'] ); ?>" class="<?php echo esc_attr( $btn_primary ); ?>">
									<span><span class="sr-only"><?php esc_html_e( 'Next service:', 'amanahcareservices' ); ?> </span><?php echo esc_html( ! empty( $next['group'] ) ? $next['group'] : $next['title'] ); ?></span>
									<?php echo $btn_arrow . $btn_bar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static markup. ?>
								</a>
							</nav>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Funding note -->
	<section class="py-20 sm:py-24" aria-labelledby="services-funding-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-soft to-mint px-7 py-12 sm:px-12 lg:flex lg:items-center lg:justify-between lg:gap-12 lg:px-16 lg:py-16" data-reveal>
				<span class="pointer-events-none absolute -right-20 -top-20 h-72 w-72 rounded-full border-[46px] border-primary/[0.05]" aria-hidden="true"></span>
				<div class="relative max-w-2xl">
					<p class="amanah-eyebrow"><?php esc_html_e( 'Funding your support', 'amanahcareservices' ); ?></p>
					<h2 id="services-funding-title" class="mt-5 text-3xl font-extrabold leading-[1.15] tracking-[-0.03em] text-ink md:text-4xl"><?php esc_html_e( 'Not sure how to use your NDIS plan?', 'amanahcareservices' ); ?></h2>
					<p class="mt-5 text-lg leading-8 text-body"><?php esc_html_e( 'We’ll help you understand which parts of your plan can fund your support and how the process works, step by step.', 'amanahcareservices' ); ?></p>
				</div>
				<div class="relative mt-8 flex flex-col gap-3 sm:flex-row lg:mt-0 lg:shrink-0">
					<a href="<?php echo esc_url( home_url( '/ndis/' ) ); ?>" class="<?php echo esc_attr( $btn_primary ); ?>">
						<span><?php esc_html_e( 'NDIS explained', 'amanahcareservices' ); ?></span>
						<?php echo $btn_arrow . $btn_bar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static markup. ?>
					</a>
					<a href="<?php echo esc_url( $services_contact['referral_url'] ); ?>" class="<?php echo esc_attr( $btn_outline ); ?>">
						<span><?php esc_html_e( 'Make a Referral', 'amanahcareservices' ); ?></span>
						<?php echo $btn_arrow . $btn_bar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static markup. ?>
					</a>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/content', 'page-extra' ); ?>
</main>

<style>
	/* Section backdrop: soft colour orbs give the glass something to blur. */
	.amanah-svc {
		background: linear-gradient(180deg, #ffffff 0%, #faf8fe 45%, #f7fbf6 100%);
	}

	.amanah-svc__orb {
		position: absolute;
		z-index: -1;
		border-radius: 999px;
		filter: blur(70px);
		pointer-events: none;
	}

	.amanah-svc__orb--purple {
		top: 14rem;
		left: -8rem;
		width: 30rem;
		height: 30rem;
		background: rgba(123, 77, 209, 0.28);
	}

	.amanah-svc__orb--green {
		top: 22rem;
		right: -10rem;
		width: 28rem;
		height: 28rem;
		background: rgba(155, 224, 143, 0.4);
	}

	.amanah-svc__orb--lilac {
		bottom: 10%;
		left: 30%;
		width: 34rem;
		height: 24rem;
		background: rgba(201, 182, 240, 0.35);
	}

	.amanah-svc .amanah-eyebrow::after {
		width: 2.25rem;
		height: 2px;
		border-radius: 9999px;
		background: linear-gradient(90deg, #2ea22a, #511f9f);
		content: "";
	}

	/* Glass tab bar */
	.amanah-svc-tabs {
		padding: 0.6rem;
		border: 1px solid rgba(255, 255, 255, 0.75);
		border-radius: 1.75rem;
		background: linear-gradient(135deg, rgba(255, 255, 255, 0.62), rgba(255, 255, 255, 0.32));
		-webkit-backdrop-filter: blur(22px) saturate(160%);
		backdrop-filter: blur(22px) saturate(160%);
		box-shadow:
			inset 0 1px 0 rgba(255, 255, 255, 0.9),
			0 24px 60px -30px rgba(27, 11, 58, 0.35);
	}

	.amanah-svc-tabs__list {
		display: flex;
		gap: 0.5rem;
		overflow-x: auto;
		scroll-snap-type: x mandatory;
		scrollbar-width: none;
	}

	.amanah-svc-tabs__list::-webkit-scrollbar {
		display: none;
	}

	@media (min-width: 768px) {
		.amanah-svc-tabs__list {
			display: grid;
			grid-template-columns: repeat(3, minmax(0, 1fr));
			overflow: visible;
		}
	}

	@media (min-width: 1024px) {
		.amanah-svc-tabs__list {
			grid-template-columns: repeat(4, minmax(0, 1fr));
		}
	}

	.amanah-svc-tab {
		display: flex;
		flex: 0 0 auto;
		align-items: center;
		gap: 0.75rem;
		min-width: 15rem;
		padding: 0.7rem 0.85rem;
		border: 1px solid rgba(255, 255, 255, 0.6);
		border-radius: 1.2rem;
		background: rgba(255, 255, 255, 0.45);
		color: #1B0B3A;
		scroll-snap-align: start;
		transition: background 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease, transform 0.35s ease, color 0.35s ease;
	}

	@media (min-width: 768px) {
		.amanah-svc-tab {
			min-width: 0;
		}
	}

	.amanah-svc-tab:hover {
		transform: translateY(-2px);
		border-color: rgba(81, 31, 159, 0.2);
		background: rgba(255, 255, 255, 0.8);
		box-shadow: 0 12px 28px -18px rgba(81, 31, 159, 0.5);
	}

	.amanah-svc-tab:focus-visible {
		outline: 3px solid #2EA22A;
		outline-offset: 2px;
	}

	.amanah-svc-tab__icon {
		display: flex;
		flex: none;
		align-items: center;
		justify-content: center;
		width: 2.5rem;
		height: 2.5rem;
		border-radius: 0.85rem;
		background: #F6F2FD;
		color: #511F9F;
		font-size: 0.9rem;
		transition: background 0.35s ease, color 0.35s ease;
	}

	.amanah-svc-tab__label {
		display: -webkit-box;
		min-width: 0;
		overflow: hidden;
		font-size: 0.85rem;
		font-weight: 800;
		line-height: 1.3;
		-webkit-box-orient: vertical;
		-webkit-line-clamp: 2;
		line-clamp: 2;
	}

	.amanah-svc-tab[aria-selected="true"] {
		border-color: rgba(255, 255, 255, 0.35);
		background: linear-gradient(135deg, rgba(106, 49, 194, 0.92), rgba(58, 21, 117, 0.92));
		color: #ffffff;
		box-shadow:
			inset 0 1px 0 rgba(255, 255, 255, 0.25),
			0 16px 34px -16px rgba(81, 31, 159, 0.75);
	}

	.amanah-svc-tab[aria-selected="true"] .amanah-svc-tab__icon {
		background: rgba(255, 255, 255, 0.18);
		color: #9BE08F;
	}

	/* Before JS runs every tab looks the same; nothing is "selected" yet. */
	[data-service-tabs]:not(.is-ready) .amanah-svc-tab[aria-selected="true"] {
		border-color: rgba(255, 255, 255, 0.6);
		background: rgba(255, 255, 255, 0.45);
		color: #1B0B3A;
		box-shadow: none;
	}

	/* Service panel: frosted glass card */
	.amanah-svc-panel {
		position: relative;
		padding: 1rem;
		border: 1px solid rgba(255, 255, 255, 0.8);
		border-radius: 2.25rem;
		background: linear-gradient(145deg, rgba(255, 255, 255, 0.86), rgba(255, 255, 255, 0.66));
		-webkit-backdrop-filter: blur(24px);
		backdrop-filter: blur(24px);
		box-shadow:
			inset 0 1px 0 #ffffff,
			0 40px 90px -45px rgba(27, 11, 58, 0.4);
		scroll-margin-top: calc(var(--amanah-header-h, 96px) + 1.5rem);
	}

	.amanah-svc-panel:focus {
		outline: none;
	}

	@media (min-width: 640px) {
		.amanah-svc-panel {
			padding: 1.5rem;
		}
	}

	@media (min-width: 1024px) {
		.amanah-svc-panel {
			padding: 1.75rem 2.75rem 1.75rem 1.75rem;
		}
	}

	[data-service-tabs].is-ready .amanah-svc-panel:not([hidden]) {
		animation: amanah-svc-in 0.6s cubic-bezier(0.22, 1, 0.36, 1) both;
	}

	@keyframes amanah-svc-in {
		from {
			opacity: 0;
			transform: translateY(14px);
		}

		to {
			opacity: 1;
			transform: none;
		}
	}

	/* Media */
	@media (min-width: 1024px) {
		.amanah-svc-media-wrap {
			position: sticky;
			top: calc(var(--amanah-header-h, 96px) + 1.5rem);
		}
	}

	.amanah-svc-media {
		position: relative;
		aspect-ratio: 4 / 3;
		min-height: 18rem;
		overflow: hidden;
		border-radius: 1.6rem;
		background:
			radial-gradient(circle at 100% 0%, rgba(155, 224, 143, 0.35), transparent 45%),
			linear-gradient(150deg, #6a31c2 0%, #3a1575 60%, #1b0b3a 100%);
		box-shadow: 0 30px 60px -35px rgba(27, 11, 58, 0.55);
	}

	@media (min-width: 1024px) {
		.amanah-svc-media {
			aspect-ratio: 4 / 5;
		}
	}

	.is-green .amanah-svc-media {
		background:
			radial-gradient(circle at 0% 0%, rgba(201, 182, 240, 0.4), transparent 45%),
			linear-gradient(150deg, #36b531 0%, #1e7a1b 60%, #124d11 100%);
	}

	.amanah-svc-media__img {
		position: absolute;
		inset: 0;
		width: 100%;
		height: 100%;
		object-fit: cover;
		transition: transform 1.2s cubic-bezier(0.22, 1, 0.36, 1);
	}

	.amanah-svc-media:hover .amanah-svc-media__img {
		transform: scale(1.05);
	}

	.amanah-svc-media__placeholder {
		position: absolute;
		inset: 0;
		display: flex;
		align-items: center;
		justify-content: center;
		color: rgba(255, 255, 255, 0.9);
		font-size: 4rem;
	}

	.amanah-svc-media__shade {
		position: absolute;
		inset: 0;
		background: linear-gradient(180deg, rgba(27, 11, 58, 0.35) 0%, transparent 30%, transparent 50%, rgba(27, 11, 58, 0.75) 100%);
		pointer-events: none;
	}

	.amanah-svc-glass-chip {
		z-index: 2;
		display: inline-flex;
		align-items: center;
		gap: 0.3rem;
		padding: 0.45rem 0.9rem;
		border: 1px solid rgba(255, 255, 255, 0.35);
		border-radius: 999px;
		background: rgba(255, 255, 255, 0.16);
		-webkit-backdrop-filter: blur(12px);
		backdrop-filter: blur(12px);
		color: #ffffff;
		font-size: 0.7rem;
		font-weight: 800;
		letter-spacing: 0.14em;
	}

	.amanah-svc-media__num {
		position: absolute;
		top: 0.9rem;
		right: 1.1rem;
		z-index: 2;
		color: rgba(255, 255, 255, 0.9);
		font-family: 'Marcellus', Georgia, serif;
		font-size: 2.25rem;
		line-height: 1;
	}

	.amanah-svc-media__card {
		position: absolute;
		right: 1rem;
		bottom: 1rem;
		left: 1rem;
		z-index: 2;
		display: flex;
		align-items: center;
		gap: 0.9rem;
		padding: 0.9rem 1rem;
		border: 1px solid rgba(255, 255, 255, 0.3);
		border-radius: 1.25rem;
		background: rgba(27, 11, 58, 0.28);
		-webkit-backdrop-filter: blur(16px) saturate(150%);
		backdrop-filter: blur(16px) saturate(150%);
		box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);
	}

	.amanah-svc-media__icon {
		display: flex;
		flex: none;
		align-items: center;
		justify-content: center;
		width: 3rem;
		height: 3rem;
		border-radius: 0.95rem;
		background: linear-gradient(145deg, #6a31c2, #3a1575);
		box-shadow: 0 12px 24px -10px rgba(81, 31, 159, 0.7);
		color: #ffffff;
	}

	.is-green .amanah-svc-media__icon {
		background: linear-gradient(145deg, #36b531, #1e7a1b);
		box-shadow: 0 12px 24px -10px rgba(30, 122, 27, 0.7);
	}

	/* Content */
	.amanah-svc-kicker {
		display: inline-flex;
		align-items: center;
		padding: 0.35rem 0.75rem;
		border-radius: 0.5rem;
		background: #F6F2FD;
		color: #511F9F;
		font-size: 0.72rem;
		font-weight: 800;
		letter-spacing: 0.12em;
	}

	.is-green .amanah-svc-kicker {
		background: #EEF8EC;
		color: #1E7A1B;
	}

	.amanah-svc-lead {
		position: relative;
		margin-top: 1.75rem;
		padding-left: 1.25rem;
		color: #1B0B3A;
		font-size: 1.125rem;
		font-weight: 600;
		line-height: 1.75;
	}

	.amanah-svc-lead::before {
		position: absolute;
		top: 0.35rem;
		bottom: 0.35rem;
		left: 0;
		width: 3px;
		border-radius: 999px;
		background: linear-gradient(180deg, #511F9F, #2EA22A);
		content: "";
	}

	.amanah-svc-block {
		margin-top: 2.25rem;
		padding-top: 2rem;
		border-top: 1px solid #efe9f8;
	}

	.amanah-svc-block__title {
		display: flex;
		align-items: center;
		gap: 0.75rem;
		color: #1B0B3A;
		font-size: 1.05rem;
		font-weight: 800;
		letter-spacing: -0.01em;
	}

	.amanah-svc-block__icon {
		display: flex;
		flex: none;
		align-items: center;
		justify-content: center;
		width: 2.25rem;
		height: 2.25rem;
		border-radius: 0.7rem;
		background: linear-gradient(145deg, #6a31c2, #3a1575);
		box-shadow: 0 10px 20px -10px rgba(81, 31, 159, 0.7);
		color: #ffffff;
		font-size: 0.8rem;
	}

	.is-green .amanah-svc-block__icon {
		background: linear-gradient(145deg, #36b531, #1e7a1b);
		box-shadow: 0 10px 20px -10px rgba(30, 122, 27, 0.7);
	}

	.amanah-svc-includes {
		display: grid;
		gap: 0 2rem;
		margin-top: 1.1rem;
	}

	@media (min-width: 640px) {
		.amanah-svc-includes {
			grid-template-columns: repeat(2, minmax(0, 1fr));
		}
	}

	.amanah-svc-includes li {
		display: flex;
		align-items: flex-start;
		gap: 0.75rem;
		padding: 0.85rem 0;
		border-bottom: 1px dashed #e6def3;
		color: #1B0B3A;
		font-size: 0.95rem;
		font-weight: 600;
		line-height: 1.5;
	}

	.amanah-svc-includes__tick {
		display: flex;
		flex: none;
		align-items: center;
		justify-content: center;
		width: 1.35rem;
		height: 1.35rem;
		margin-top: 0.1rem;
		border-radius: 999px;
		background: #EEF8EC;
		color: #1E7A1B;
		font-size: 0.6rem;
	}

	.amanah-svc-duo {
		display: grid;
		margin-top: 2.5rem;
		overflow: hidden;
		border: 1px solid #ece5f8;
		border-radius: 1.5rem;
		background: linear-gradient(145deg, #fbf9ff, #f6fbf5);
	}

	@media (min-width: 640px) {
		.amanah-svc-duo {
			grid-template-columns: repeat(2, minmax(0, 1fr));
		}
	}

	.amanah-svc-duo__col {
		padding: 1.5rem;
	}

	@media (min-width: 1024px) {
		.amanah-svc-duo__col {
			padding: 2rem 2.25rem;
		}

		.amanah-svc-duo__col ul {
			display: grid;
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 0.75rem 1.5rem;
		}

		.amanah-svc-duo__col ul > li {
			margin-top: 0 !important;
		}
	}

	.amanah-svc-duo__col + .amanah-svc-duo__col {
		border-top: 1px solid #ece5f8;
	}

	@media (min-width: 640px) {
		.amanah-svc-duo__col + .amanah-svc-duo__col {
			border-top: 0;
			border-left: 1px solid #ece5f8;
		}
	}

	.amanah-svc-dot {
		flex: none;
		width: 0.5rem;
		height: 0.5rem;
		margin-top: 0.55rem;
		border-radius: 999px;
		background: #2EA22A;
		box-shadow: 0 0 0 4px rgba(46, 162, 42, 0.15);
	}

	.amanah-svc-step {
		display: flex;
		flex: none;
		align-items: center;
		justify-content: center;
		width: 1.5rem;
		height: 1.5rem;
		border-radius: 0.45rem;
		background: #511F9F;
		color: #ffffff;
		font-size: 0.72rem;
		font-weight: 800;
	}

	.is-green .amanah-svc-step {
		background: #1E7A1B;
	}

	.amanah-svc-pager > a {
		text-align: center;
	}

	/* CTA strip */
	.amanah-svc-cta {
		position: relative;
		display: flex;
		flex-direction: column;
		gap: 1.25rem;
		margin-top: 2.5rem;
		padding: 1.5rem;
		overflow: hidden;
		border-radius: 1.5rem;
		background:
			radial-gradient(circle at 0% 0%, rgba(123, 77, 209, 0.55), transparent 45%),
			radial-gradient(circle at 100% 100%, rgba(46, 162, 42, 0.3), transparent 40%),
			linear-gradient(135deg, #3a1575 0%, #1b0b3a 100%);
	}

	@media (min-width: 1024px) {
		.amanah-svc-cta {
			flex-direction: row;
			align-items: center;
			justify-content: space-between;
			padding: 1.75rem 2rem;
		}
	}

	.amanah-svc-cta__icon {
		display: flex;
		flex: none;
		align-items: center;
		justify-content: center;
		width: 3.25rem;
		height: 3.25rem;
		border: 1px solid rgba(255, 255, 255, 0.2);
		border-radius: 1rem;
		background: rgba(255, 255, 255, 0.1);
		color: #9BE08F;
		font-size: 1.1rem;
	}

	.amanah-svc-panel a:focus-visible {
		outline: 3px solid #2EA22A;
		outline-offset: 3px;
	}

	@media (prefers-reduced-motion: reduce) {
		.amanah-svc-tab,
		.amanah-svc-media__img {
			transition: none;
		}

		[data-service-tabs].is-ready .amanah-svc-panel:not([hidden]) {
			animation: none;
		}
	}
</style>

<?php
get_footer();
