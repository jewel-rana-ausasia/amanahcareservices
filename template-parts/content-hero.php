<?php

/**
 * Premium homepage hero section.
 *
 * Full-width background image with content overlay.
 *
 * @package amanahcareservices
 */

$hero_contact  = amanahcareservices_get_contact();
$hero_phone    = amanahcareservices_get_primary_phone();
$hero_image_id = absint(get_theme_mod('amanahcareservices_hero_image', 0));

$hero_bg = $hero_image_id
	? wp_get_attachment_image_url($hero_image_id, 'full')
	: get_template_directory_uri() . '/assets/images/hero/amanah-hero-bg.jpg';
?>

<section id="home-hero" class="amanah-premium-hero relative isolate flex overflow-hidden" aria-labelledby="home-hero-title">

	<!-- Background image -->
	<div class="absolute inset-0 -z-20">
		<img src="<?php echo esc_url($hero_bg); ?>" alt="" width="1920" height="950" class="amanah-premium-hero__image h-full w-full object-cover object-bottom" fetchpriority="high" loading="eager" decoding="async">
	</div>

	<!-- Readability overlay -->
	<div class="amanah-premium-hero__overlay absolute inset-0 -z-10" aria-hidden="true"></div>

	<!-- Very subtle brand atmosphere -->
	<div class="pointer-events-none absolute inset-0 -z-[5] overflow-hidden" aria-hidden="true">
		<span class="absolute -left-28 top-[14%] h-72 w-72 rounded-full bg-white/30 blur-[100px]"></span>
		<span class="absolute left-[36%] top-[12%] hidden h-56 w-56 rounded-full bg-[#7534c5]/5 blur-[100px] lg:block"></span>
	</div>

	<div class="container relative mx-auto flex w-full items-center px-5 py-16 md:px-8 lg:px-12 lg:py-20">

		<div class="w-full max-w-[790px]">

			<!-- Eyebrow -->
			<div class="mb-7 inline-flex items-center gap-3 rounded-full border border-white/90 bg-white/90 py-2 pl-2 pr-5 shadow-[0_14px_40px_rgba(55,27,91,.10)] backdrop-blur-xl">
				<span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-secondary text-white shadow-[0_5px_15px_rgba(46,162,42,.22)]">
					<i class="fa-solid fa-heart text-[10px]" aria-hidden="true"></i>
				</span>

				<span class="text-[10px] font-extrabold uppercase tracking-[0.2em] text-primary sm:text-[11px]">
					<?php
					if (! empty($hero_contact['ndis_number'])) {
						esc_html_e('Registered NDIS Provider', 'amanahcareservices');
					} else {
						esc_html_e('Disability & Community Support', 'amanahcareservices');
					}
					?>
				</span>

				<span class="hidden h-px w-10 bg-gradient-to-r from-secondary/60 to-transparent sm:block"></span>
			</div>

			<!-- Heading -->
			<h1 id="home-hero-title" class="max-w-[780px] text-[2.35rem] font-extrabold leading-[1.04] tracking-[-0.04em] text-[#180d2c] sm:text-[3.1rem] md:text-[3.4rem] lg:text-[3.75rem] xl:text-[4.1rem]">
				<?php esc_html_e('Care built on trust,', 'amanahcareservices'); ?>

				<span class="amanah-premium-hero__gradient mt-1 block">
					<?php esc_html_e('delivered with heart.', 'amanahcareservices'); ?>
				</span>
			</h1>

			<!-- Description -->
			<p class="mt-7 max-w-[640px] text-[16px] font-medium leading-[1.85] text-[#50465e] sm:text-[17px] lg:text-[18px]">
				<?php esc_html_e('Amanah Care Services provides respectful, person-centred support that helps you live safely, build independence and stay connected to the people and community you love.', 'amanahcareservices'); ?>
			</p>

			<!-- Buttons -->
			<div class="mt-10 flex flex-col gap-4 sm:flex-row sm:items-center">

				<a href="<?php echo esc_url($hero_contact['referral_url']); ?>" class="group relative inline-flex min-h-[50px] items-center justify-center overflow-hidden rounded-md bg-primary px-6 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_14px_32px_rgba(81,31,159,.28)] transition duration-300 hover:-translate-y-0.5 hover:bg-primaryDark hover:shadow-[0_18px_38px_rgba(81,31,159,.36)]">
					<span><?php esc_html_e('Make a Referral', 'amanahcareservices'); ?></span>
					<span class="ml-3 flex items-center">
						<i class="fa-solid fa-arrow-right text-[12px] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
					</span>
					<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
				</a>

				<a href="<?php echo esc_attr(! empty($hero_phone['uri']) ? $hero_phone['uri'] : $hero_contact['cta_url']); ?>" class="group inline-flex min-h-[50px] items-center justify-center gap-2.5 rounded-md border-2 border-primary bg-white/90 px-6 text-[11px] font-extrabold uppercase tracking-[0.14em] text-primary backdrop-blur transition duration-300 hover:-translate-y-0.5 hover:bg-primary hover:text-white">
					<i class="fa-solid fa-phone text-[12px] text-secondary transition-colors duration-300 group-hover:text-white" aria-hidden="true"></i>
					<span><?php esc_html_e('Talk to Our Team', 'amanahcareservices'); ?></span>
				</a>

			</div>
		</div>

	</div>

	<!-- Bottom scroll indicator -->
	<a href="#services" class="group absolute bottom-7 left-1/2 z-20 hidden -translate-x-1/2 items-center gap-3 lg:flex" aria-label="<?php esc_attr_e('Explore our services', 'amanahcareservices'); ?>">
		<span class="text-[9px] font-extrabold uppercase tracking-[0.2em] text-[#493b55]/60 transition group-hover:text-primary">
			<?php esc_html_e('Explore', 'amanahcareservices'); ?>
		</span>

		<span class="relative flex h-9 w-6 items-start justify-center rounded-full border border-[#51445e]/25 pt-2">
			<span class="amanah-scroll-dot h-1.5 w-1.5 rounded-full bg-secondary"></span>
		</span>
	</a>

</section>

<style>
	/* Fill the viewport below the header; --amanah-header-h is set by js/site.js. */
	.amanah-premium-hero {
		min-height: max(600px, calc(100vh - var(--amanah-header-h, 142px)));
		min-height: max(600px, calc(100svh - var(--amanah-header-h, 142px)));
		background: #f8f7f9;
	}

	.amanah-premium-hero__image {
		object-position: center center;
		transform: scale(1.002);
	}

	.amanah-premium-hero__overlay {
		background:
			linear-gradient(90deg,
				rgba(255, 255, 255, .97) 0%,
				rgba(255, 255, 255, .94) 18%,
				rgba(255, 255, 255, .79) 35%,
				rgba(255, 255, 255, .36) 49%,
				rgba(255, 255, 255, .04) 67%,
				rgba(255, 255, 255, 0) 100%);
	}

	.amanah-premium-hero__gradient {
		background: linear-gradient(90deg,
				#6522c8 0%,
				#7933c9 28%,
				#6339b1 48%,
				#2ea22a 82%,
				#218d2b 100%);
		-webkit-background-clip: text;
		background-clip: text;
		color: transparent;
	}

	.amanah-scroll-dot {
		animation: amanahHeroScroll 1.8s ease-in-out infinite;
	}

	@keyframes amanahHeroScroll {
		0% {
			transform: translateY(0);
			opacity: 0;
		}

		20% {
			opacity: 1;
		}

		75% {
			opacity: 1;
		}

		100% {
			transform: translateY(14px);
			opacity: 0;
		}
	}

	@media (max-width: 1279px) {
		.amanah-premium-hero__image {
			object-position: 58% center;
		}

		.amanah-premium-hero__overlay {
			background:
				linear-gradient(90deg,
					rgba(255, 255, 255, .97) 0%,
					rgba(255, 255, 255, .92) 31%,
					rgba(255, 255, 255, .55) 51%,
					rgba(255, 255, 255, .08) 75%,
					transparent 100%);
		}
	}

	@media (max-width: 1023px) {
		.amanah-premium-hero__image {
			object-position: 66% center;
		}

		.amanah-premium-hero__overlay {
			background:
				linear-gradient(90deg,
					rgba(255, 255, 255, .98) 0%,
					rgba(255, 255, 255, .94) 44%,
					rgba(255, 255, 255, .62) 68%,
					rgba(255, 255, 255, .18) 100%);
		}
	}

	@media (max-width: 767px) {
		.amanah-premium-hero {
			align-items: flex-start;
		}

		.amanah-premium-hero__image {
			object-position: 70% center;
		}

		.amanah-premium-hero__overlay {
			background:
				linear-gradient(180deg,
					rgba(255, 255, 255, .98) 0%,
					rgba(255, 255, 255, .96) 48%,
					rgba(255, 255, 255, .82) 70%,
					rgba(255, 255, 255, .40) 100%);
		}
	}

	@media (max-width: 639px) {
		.amanah-premium-hero__image {
			object-position: 71% center;
			opacity: .8;
		}

		.amanah-premium-hero__overlay {
			background:
				linear-gradient(180deg,
					rgba(255, 255, 255, .99) 0%,
					rgba(255, 255, 255, .97) 55%,
					rgba(255, 255, 255, .85) 74%,
					rgba(255, 255, 255, .55) 100%);
		}
	}

	@media (prefers-reduced-motion: reduce) {
		.amanah-scroll-dot {
			animation: none;
		}
	}
</style>