<?php
/**
 * Template Name: Home
 *
 * Premium homepage for Amanah Care Services.
 *
 * @package amanahcareservices
 */

get_header();

$home_contact  = amanahcareservices_get_contact();
$home_phone    = amanahcareservices_get_primary_phone();
$home_socials  = amanahcareservices_get_social_links();
$home_services = array_values( amanahcareservices_get_services() );
$home_about_id = absint( get_theme_mod( 'amanahcareservices_about_image', 0 ) );

$home_values = array(
	array( 'icon' => 'fa-handshake-simple', 'title' => 'Trust & integrity', 'text' => 'We do what we say, every time, and treat your home and your trust with genuine care.' ),
	array( 'icon' => 'fa-hands-holding-child', 'title' => 'Dignity & respect', 'text' => 'Your privacy, choices and independence come first in every visit and conversation.' ),
	array( 'icon' => 'fa-compass', 'title' => 'Person-centred', 'text' => 'Support shaped around your goals, routines and the life you want to live.' ),
	array( 'icon' => 'fa-shield-heart', 'title' => 'Safe & reliable', 'text' => 'Consistent, familiar support workers you can count on, week after week.' ),
);

$home_steps = array(
	array( 'icon' => 'fa-phone-volume', 'title' => 'Reach out', 'text' => 'Call, email or send a referral. We’ll get back to you quickly and answer your questions in plain language.' ),
	array( 'icon' => 'fa-comments', 'title' => 'Get to know you', 'text' => 'We meet with you, and anyone you’d like involved, to understand your goals, routines and preferences.' ),
	array( 'icon' => 'fa-clipboard-list', 'title' => 'Plan your support', 'text' => 'Together we agree on a support plan and match you with workers who suit your needs and personality.' ),
	array( 'icon' => 'fa-circle-check', 'title' => 'Start & review', 'text' => 'Support begins, and we check in regularly so it keeps working as your life and goals change.' ),
);

$home_reasons = array(
	array( 'icon' => 'fa-user-group', 'title' => 'Familiar faces', 'text' => 'We aim to keep the same support workers with you, so trust can grow over time.' ),
	array( 'icon' => 'fa-comments', 'title' => 'Clear communication', 'text' => 'Honest updates and a team that picks up the phone when you need us.' ),
	array( 'icon' => 'fa-earth-oceania', 'title' => 'Culturally respectful', 'text' => 'We respect your faith, culture, language and family values in every visit.' ),
	array( 'icon' => 'fa-people-roof', 'title' => 'Family involved', 'text' => 'With your consent, we work closely with family, carers and your support network.' ),
);

$home_audiences = array(
	array( 'icon' => 'fa-universal-access', 'title' => 'NDIS participants', 'text' => 'Use your plan for the support you choose, with a team that listens.' ),
	array( 'icon' => 'fa-house-chimney-user', 'title' => 'Families & carers', 'text' => 'Peace of mind that your loved one is safe, respected and supported.' ),
	array( 'icon' => 'fa-clipboard-user', 'title' => 'Coordinators & plan managers', 'text' => 'A responsive provider who communicates clearly and follows through.' ),
);

$home_faqs = array(
	array(
		'question' => 'How do I get started with Amanah Care Services?',
		'answer'   => 'Contact us by phone, email or our referral form. We’ll arrange a friendly chat to learn about you, your goals and the support you’re looking for, then explain the next steps clearly.',
	),
	array(
		'question' => 'Can I choose my support workers?',
		'answer'   => 'Yes. Your preferences matter. We match you with workers who suit your needs, interests and personality, and we aim to keep the same familiar faces with you over time.',
	),
	array(
		'question' => 'Can my family or support coordinator be involved?',
		'answer'   => 'Absolutely. With your consent, we welcome family members, carers, nominees and support coordinators to be part of planning and ongoing communication.',
	),
	array(
		'question' => 'What if my needs change?',
		'answer'   => 'Tell us at any time. We review your support regularly and adjust hours, services or routines so your support keeps fitting your life.',
	),
	array(
		'question' => 'Do you respect cultural and religious needs?',
		'answer'   => 'Yes. Respect for your culture, faith, language and family values is part of who we are. Let us know what matters to you and we’ll build it into your support.',
	),
);

$home_testimonials = array();
for ( $i = 1; $i <= 3; $i++ ) {
	$quote = trim( (string) get_theme_mod( 'amanahcareservices_testimonial_' . $i . '_quote', '' ) );
	if ( '' === $quote ) {
		continue;
	}
	$home_testimonials[] = array(
		'quote' => $quote,
		'name'  => trim( (string) get_theme_mod( 'amanahcareservices_testimonial_' . $i . '_name', '' ) ),
		'role'  => trim( (string) get_theme_mod( 'amanahcareservices_testimonial_' . $i . '_role', '' ) ),
	);
}
?>

<main id="primary" class="site-main overflow-hidden bg-white">

	<?php get_template_part( 'template-parts/content', 'hero' ); ?>

	<!-- =========================================================
	     Values strip
	     ========================================================= -->
	<section class="amanah-values relative isolate px-5 py-16 md:px-8 lg:px-12 lg:py-20" aria-label="<?php esc_attr_e( 'Our values', 'amanahcareservices' ); ?>">
		<div class="container mx-auto">
			<ul class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4 xl:gap-6">
				<?php foreach ( $home_values as $index => $value ) : ?>
					<?php $is_green = 1 === $index % 2; ?>
					<li class="amanah-value-card group relative flex min-h-[220px] flex-col overflow-hidden rounded-none border border-[#ece6f5] bg-white p-8 shadow-[0_18px_45px_-28px_rgba(27,11,58,0.35)] ring-0 ring-primary/[0.05] transition duration-500 hover:-translate-y-2 hover:border-[#d8cbee] hover:ring-[6px] hover:shadow-[0_34px_70px_-30px_rgba(81,31,159,0.45)]" data-reveal>
						<span class="pointer-events-none absolute -right-10 -top-10 h-36 w-36 rounded-full <?php echo $is_green ? 'bg-mint' : 'bg-soft'; ?> opacity-70 blur-2xl transition-opacity duration-500 group-hover:opacity-100" aria-hidden="true"></span>

						<div class="relative flex items-center gap-4">
							<span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-md bg-gradient-to-br <?php echo $is_green ? 'from-[#3cb838] to-secondaryDark shadow-[0_14px_30px_-10px_rgba(46,162,42,0.6)]' : 'from-[#6d2fc6] to-primaryDark shadow-[0_14px_30px_-10px_rgba(81,31,159,0.6)]'; ?> text-white transition duration-500 group-hover:-rotate-6 group-hover:scale-105">
								<i class="fa-solid <?php echo esc_attr( $value['icon'] ); ?> text-xl" aria-hidden="true"></i>
							</span>
							<h3 class="text-lg font-extrabold leading-tight tracking-[-0.01em] text-ink"><?php echo esc_html( $value['title'] ); ?></h3>
						</div>
						<p class="relative mt-6 flex-1 text-[15px] leading-7 text-body"><?php echo esc_html( $value['text'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<!-- =========================================================
	     About
	     ========================================================= -->
	<?php
	$home_about_image_url = $home_about_id ? wp_get_attachment_image_url( $home_about_id, 'large' ) : '';
	if ( ! $home_about_image_url ) {
		$home_about_file      = file_exists( get_template_directory() . '/assets/images/about/amanah-about.jpg' ) ? 'about/amanah-about.jpg' : 'hero/amanah-hero-bg.jpg';
		$home_about_image_url = get_template_directory_uri() . '/assets/images/' . $home_about_file;
	}

	$home_about_points = array(
		array( 'icon' => 'fa-ear-listen', 'title' => 'We listen first', 'text' => 'Your voice guides every decision about your support.' ),
		array( 'icon' => 'fa-seedling', 'title' => 'We build independence', 'text' => 'Support that grows your confidence and skills over time.' ),
		array( 'icon' => 'fa-earth-oceania', 'title' => 'We respect your culture', 'text' => 'Your faith, language and family values are part of your care.' ),
	);
	?>
	<section id="about" class="relative isolate overflow-hidden bg-white py-20 sm:py-24 lg:py-28" aria-labelledby="home-about-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid items-center gap-16 lg:grid-cols-12 lg:gap-14 xl:gap-20">

				<!-- Image -->
				<div class="relative lg:col-span-6" data-reveal>
					<span class="absolute -left-4 -top-4 h-full w-full border-2 border-primary/15 sm:-left-5 sm:-top-5" aria-hidden="true"></span>
					<span class="absolute -bottom-5 -right-5 h-32 w-32 bg-secondary/15 sm:h-40 sm:w-40" aria-hidden="true"></span>

					<div class="relative overflow-hidden shadow-[0_40px_80px_-35px_rgba(27,11,58,0.45)]">
						<img
							src="<?php echo esc_url( $home_about_image_url ); ?>"
							alt="<?php esc_attr_e( 'An Amanah Care Services support worker and a participant planning their week together at home', 'amanahcareservices' ); ?>"
							class="h-[420px] w-full object-cover object-center transition duration-1000 hover:scale-[1.03] sm:h-[520px] lg:h-[600px]"
							loading="lazy"
							decoding="async">
						<span class="absolute inset-0 bg-gradient-to-t from-ink/35 via-transparent to-transparent" aria-hidden="true"></span>
					</div>
				</div>

				<!-- Content -->
				<div class="lg:col-span-6" data-reveal>
					<p class="amanah-eyebrow"><?php esc_html_e( 'About Amanah Care Services', 'amanahcareservices' ); ?></p>
					<h2 id="home-about-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-[2.75rem]">
						<?php esc_html_e( 'A name that is also', 'amanahcareservices' ); ?>
						<span class="text-primary"><?php esc_html_e( 'our promise to you.', 'amanahcareservices' ); ?></span>
					</h2>
					<p class="mt-6 text-lg leading-8 text-body">
						<?php esc_html_e( 'When you welcome us into your home and your life, you are trusting us with something precious. We take that seriously. Our team listens first, respects your choices and shows up with warmth, patience and consistency.', 'amanahcareservices' ); ?>
					</p>

					<ul class="mt-9 divide-y divide-[#efe9f7] border-y border-[#efe9f7]">
						<?php foreach ( $home_about_points as $index => $point ) : ?>
							<li class="group flex items-start gap-5 py-5">
								<span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-md <?php echo 1 === $index % 2 ? 'bg-mint text-secondaryDark group-hover:bg-secondary' : 'bg-soft text-primary group-hover:bg-primary'; ?> transition duration-300 group-hover:text-white">
									<i class="fa-solid <?php echo esc_attr( $point['icon'] ); ?>" aria-hidden="true"></i>
								</span>
								<span>
									<span class="block text-base font-extrabold text-ink"><?php echo esc_html( $point['title'] ); ?></span>
									<span class="mt-1 block text-[15px] leading-7 text-body"><?php echo esc_html( $point['text'] ); ?></span>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>

					<div class="mt-10 flex flex-wrap items-center gap-x-8 gap-y-5">
						<a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="group relative inline-flex min-h-[50px] items-center justify-center overflow-hidden rounded-md bg-primary px-6 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_14px_32px_rgba(81,31,159,.28)] transition duration-300 hover:-translate-y-0.5 hover:bg-primaryDark">
							<span><?php esc_html_e( 'Learn more about us', 'amanahcareservices' ); ?></span>
							<span class="ml-3 flex items-center"><i class="fa-solid fa-arrow-right text-[12px] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i></span>
							<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
						</a>
						<?php if ( $home_contact['ndis_number'] ) : ?>
							<span class="flex items-center gap-3 text-sm font-bold text-ink">
								<i class="fa-solid fa-shield-heart text-2xl text-secondary" aria-hidden="true"></i>
								<span>
									<?php esc_html_e( 'Registered NDIS Provider', 'amanahcareservices' ); ?>
									<span class="block text-xs font-semibold text-body"><?php echo esc_html( sprintf( /* translators: %s: NDIS registration number. */ __( 'Registration No. %s', 'amanahcareservices' ), $home_contact['ndis_number'] ) ); ?></span>
								</span>
							</span>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- =========================================================
	     Services
	     ========================================================= -->
	<section id="services" class="amanah-services relative isolate overflow-hidden py-20 sm:py-24 lg:py-28" aria-labelledby="home-services-title">
		<div class="container relative mx-auto px-4 md:px-6">
			<div class="mx-auto mb-12 max-w-3xl text-center lg:mb-14" data-reveal>
				<div class="flex flex-col items-center">
					<p class="amanah-eyebrow justify-center"><?php esc_html_e( 'How we can help', 'amanahcareservices' ); ?></p>
					<h2 id="home-services-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl">
						<?php esc_html_e( 'Support for everyday life,', 'amanahcareservices' ); ?>
						<span class="text-secondaryDark"><?php esc_html_e( 'shaped around you.', 'amanahcareservices' ); ?></span>
					</h2>
					<p class="mx-auto mt-6 max-w-2xl text-base leading-7 text-body">
						<?php
						echo esc_html(
							sprintf(
								/* translators: %d: number of NDIS registration groups. */
								__( 'We are registered to deliver %d NDIS support categories. Combine and adjust them as your goals change, always with patience, respect and care.', 'amanahcareservices' ),
								count( $home_services )
							)
						);
						?>
					</p>
				</div>
			</div>

			<div class="amanah-services-carousel relative" data-reveal>
				<button type="button" class="amanah-services-prev amanah-slider-btn amanah-slider-btn--prev" aria-label="<?php esc_attr_e( 'Previous service', 'amanahcareservices' ); ?>">
					<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
				</button>
				<button type="button" class="amanah-services-next amanah-slider-btn amanah-slider-btn--next" aria-label="<?php esc_attr_e( 'Next service', 'amanahcareservices' ); ?>">
					<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
				</button>

				<div class="amanah-services-slider swiper">
					<div class="swiper-wrapper">
						<?php foreach ( $home_services as $index => $service ) : ?>
							<?php $is_green = 1 === $index % 2; ?>
							<div class="swiper-slide">
								<article class="amanah-service-card group" aria-labelledby="home-service-<?php echo esc_attr( $service['slug'] ); ?>">
									<div class="amanah-service-card__media <?php echo $is_green ? 'is-green' : ''; ?>">
										<?php if ( $service['image'] ) : ?>
											<img src="<?php echo esc_url( $service['image'] ); ?>" alt="" loading="lazy" decoding="async" class="amanah-service-card__img">
										<?php else : ?>
											<span class="amanah-service-card__placeholder" aria-hidden="true">
												<i class="fa-solid <?php echo esc_attr( $service['icon'] ); ?>"></i>
											</span>
										<?php endif; ?>
										<span class="amanah-service-card__shade" aria-hidden="true"></span>
	
										<?php if ( ! empty( $service['code'] ) ) : ?>
											<span class="amanah-service-card__code">
												<span class="sr-only"><?php esc_html_e( 'NDIS registration group', 'amanahcareservices' ); ?></span>
												<span aria-hidden="true">NDIS</span> <?php echo esc_html( $service['code'] ); ?>
											</span>
										<?php endif; ?>
										<span class="amanah-service-card__num" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
									</div>
	
									<div class="amanah-service-card__body">
										<span class="amanah-service-card__icon <?php echo $is_green ? 'is-green' : ''; ?>" aria-hidden="true">
											<i class="fa-solid <?php echo esc_attr( $service['icon'] ); ?>"></i>
										</span>
	
										<h3 id="home-service-<?php echo esc_attr( $service['slug'] ); ?>" class="mt-5 text-lg font-extrabold leading-snug text-ink transition-colors group-hover:text-primary">
											<a href="<?php echo esc_url( $service['url'] ); ?>" class="after:absolute after:inset-0 after:z-[3] after:rounded-[1.75rem] after:content-[''] focus:outline-none"><?php echo esc_html( ! empty( $service['group'] ) ? $service['group'] : $service['title'] ); ?></a>
										</h3>
										<p class="mt-3 line-clamp-3 flex-1 text-sm leading-7 text-body"><?php echo esc_html( $service['description'] ); ?></p>
	
										<span class="mt-6 flex items-center justify-between border-t border-[#f0ebf8] pt-5" aria-hidden="true">
											<span class="text-[11px] font-extrabold uppercase tracking-[0.16em] <?php echo $is_green ? 'text-secondaryDark' : 'text-primary'; ?>"><?php esc_html_e( 'Explore service', 'amanahcareservices' ); ?></span>
											<span class="amanah-service-card__arrow"><i class="fa-solid fa-arrow-right"></i></span>
										</span>
									</div>
								</article>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="mt-10 flex flex-col items-center gap-8">
				<div class="amanah-services-pagination"></div>
				<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"
					class="group relative inline-flex min-h-[50px] items-center justify-center overflow-hidden rounded-md bg-primary px-7 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_14px_32px_rgba(81,31,159,.28)] transition duration-300 hover:-translate-y-0.5 hover:bg-primaryDark hover:shadow-[0_18px_38px_rgba(81,31,159,.36)]">
					<span><?php esc_html_e( 'View all services', 'amanahcareservices' ); ?></span>
					<span class="ml-3 flex items-center">
						<i class="fa-solid fa-arrow-right text-[12px] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
					</span>
					<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
				</a>
			</div>
		</div>
	</section>

	<!-- =========================================================
	     Process
	     ========================================================= -->
	<section class="amanah-process relative isolate overflow-hidden py-20 text-white sm:py-24 lg:py-28" aria-labelledby="home-process-title">
		<div class="container relative mx-auto px-5 md:px-8 lg:px-12">
			<div class="mx-auto max-w-3xl text-center" data-reveal>
				<p class="amanah-eyebrow amanah-eyebrow--light justify-center"><?php esc_html_e( 'Getting started', 'amanahcareservices' ); ?></p>
				<h2 id="home-process-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] md:text-5xl">
					<?php esc_html_e( 'Starting support should feel', 'amanahcareservices' ); ?>
					<span class="text-leaf"><?php esc_html_e( 'simple and clear.', 'amanahcareservices' ); ?></span>
				</h2>
				<p class="mt-6 text-lg leading-8 text-white/70"><?php esc_html_e( 'Four friendly steps, with our team beside you the whole way.', 'amanahcareservices' ); ?></p>
			</div>

			<ol class="relative mt-16 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
				<?php foreach ( $home_steps as $index => $step ) : ?>
					<?php $is_green = 1 === $index % 2; ?>
					<li class="amanah-step-card group <?php echo $is_green ? 'is-green' : ''; ?>" data-reveal>
						<div class="relative flex items-center justify-between">
							<span class="amanah-step-card__icon" aria-hidden="true">
								<span class="amanah-step-card__icon-tile"><i class="fa-solid <?php echo esc_attr( $step['icon'] ); ?>"></i></span>
							</span>
							<?php if ( $index < count( $home_steps ) - 1 ) : ?>
								<span class="amanah-step-card__next hidden xl:flex" aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
							<?php endif; ?>
						</div>

						<h3 class="relative mt-7 text-xl font-extrabold tracking-[-0.01em]"><?php echo esc_html( $step['title'] ); ?></h3>
						<p class="relative mt-3 text-[15px] leading-7 text-white/70"><?php echo esc_html( $step['text'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>

			<div class="mt-14 flex flex-col items-stretch justify-center gap-4 sm:flex-row sm:items-center" data-reveal>
				<a href="<?php echo esc_url( $home_contact['cta_url'] ); ?>"
					class="group relative inline-flex min-h-[50px] items-center justify-center overflow-hidden rounded-md bg-white px-7 text-[11px] font-extrabold uppercase tracking-[0.14em] text-primary shadow-[0_14px_32px_rgba(0,0,0,.25)] transition duration-300 hover:-translate-y-0.5 hover:bg-soft">
					<span><?php esc_html_e( 'Start the conversation', 'amanahcareservices' ); ?></span>
					<span class="ml-3 flex items-center">
						<i class="fa-solid fa-arrow-right text-[12px] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
					</span>
					<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
				</a>
				<?php if ( $home_phone['label'] ) : ?>
					<a href="<?php echo esc_attr( $home_phone['uri'] ); ?>"
						class="group relative inline-flex min-h-[50px] items-center justify-center gap-3 overflow-hidden rounded-md border border-white/25 px-7 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white transition duration-300 hover:-translate-y-0.5 hover:border-white/50 hover:bg-white/10">
						<i class="fa-solid fa-phone text-[12px] text-leaf" aria-hidden="true"></i>
						<span><?php echo esc_html( $home_phone['label'] ); ?></span>
						<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-leaf transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- =========================================================
	     Why choose us
	     ========================================================= -->
	<section class="relative isolate overflow-hidden bg-[#fbfafe] py-20 sm:py-24 lg:py-32" aria-labelledby="home-why-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid gap-14 lg:grid-cols-12 lg:gap-12 xl:gap-20">
				<div class="lg:col-span-5">
					<div class="lg:sticky lg:top-32" data-reveal>
						<p class="amanah-eyebrow"><?php esc_html_e( 'Why families choose Amanah', 'amanahcareservices' ); ?></p>
						<h2 id="home-why-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl">
							<?php esc_html_e( 'The small things are', 'amanahcareservices' ); ?>
							<span class="text-primary"><?php esc_html_e( 'the big things.', 'amanahcareservices' ); ?></span>
						</h2>
						<p class="mt-6 text-lg leading-8 text-body"><?php esc_html_e( 'Showing up on time. Remembering how you take your tea. Asking before assuming. Great care is built on everyday moments of respect.', 'amanahcareservices' ); ?></p>

						<div class="relative mt-10 overflow-hidden rounded-[2rem] bg-gradient-to-br from-primary to-primaryDark p-8 text-white shadow-[0_30px_60px_-20px_rgba(81,31,159,0.55)]">
							<p class="text-[11px] font-extrabold uppercase tracking-[0.22em] text-leaf"><?php esc_html_e( 'Have a question?', 'amanahcareservices' ); ?></p>
							<p class="mt-3 text-2xl font-extrabold leading-snug"><?php esc_html_e( 'Our friendly team is here to help.', 'amanahcareservices' ); ?></p>
							<div class="mt-6 space-y-3 text-sm">
								<?php if ( $home_phone['label'] ) : ?>
									<a class="flex items-center gap-3 font-bold transition hover:text-leaf" href="<?php echo esc_attr( $home_phone['uri'] ); ?>">
										<span class="flex h-9 w-9 items-center justify-center rounded-full bg-white/10"><i class="fa-solid fa-phone text-xs" aria-hidden="true"></i></span>
										<?php echo esc_html( $home_phone['label'] ); ?>
									</a>
								<?php endif; ?>
								<?php if ( $home_contact['email'] ) : ?>
									<a class="flex items-center gap-3 break-all font-bold transition hover:text-leaf" href="mailto:<?php echo esc_attr( antispambot( $home_contact['email'] ) ); ?>">
										<span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/10"><i class="fa-solid fa-envelope text-xs" aria-hidden="true"></i></span>
										<?php echo esc_html( antispambot( $home_contact['email'] ) ); ?>
									</a>
								<?php endif; ?>
							</div>
							<a href="<?php echo esc_url( $home_contact['cta_url'] ); ?>" class="mt-7 inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-[12px] font-extrabold uppercase tracking-[0.14em] text-primary transition hover:bg-mint">
								<?php esc_html_e( 'Contact us', 'amanahcareservices' ); ?>
								<i class="fa-solid fa-arrow-right text-[10px]" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>

				<div class="grid gap-5 sm:grid-cols-2 lg:col-span-7">
					<?php foreach ( $home_reasons as $index => $reason ) : ?>
						<div class="group relative overflow-hidden rounded-[1.75rem] border border-[#ece6f6] bg-white p-7 transition duration-300 hover:-translate-y-1 hover:shadow-[0_24px_50px_-20px_rgba(27,11,58,0.2)] <?php echo 1 === $index % 2 ? 'sm:translate-y-8' : ''; ?>" data-reveal>
							<span class="absolute inset-x-0 top-0 h-1 origin-left scale-x-0 bg-gradient-to-r from-primary to-secondary transition-transform duration-500 group-hover:scale-x-100" aria-hidden="true"></span>
							<span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br <?php echo in_array( $index, array( 1, 2 ), true ) ? 'from-secondary to-secondaryDark shadow-[0_14px_28px_-10px_rgba(46,162,42,0.6)]' : 'from-primary to-primaryDark shadow-[0_14px_28px_-10px_rgba(81,31,159,0.6)]'; ?> text-white transition duration-500 group-hover:-rotate-6">
								<i class="fa-solid <?php echo esc_attr( $reason['icon'] ); ?> text-lg" aria-hidden="true"></i>
							</span>
							<h3 class="mt-6 text-lg font-extrabold text-ink"><?php echo esc_html( $reason['title'] ); ?></h3>
							<p class="mt-2 text-sm leading-7 text-body"><?php echo esc_html( $reason['text'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- =========================================================
	     Who we support
	     ========================================================= -->
	<section class="amanah-audience relative overflow-hidden py-20 sm:py-24 lg:py-28" aria-labelledby="home-audience-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div data-reveal>
				<div class="relative mx-auto max-w-3xl text-center">
					<p class="amanah-eyebrow justify-center"><?php esc_html_e( 'Who we support', 'amanahcareservices' ); ?></p>
					<h2 id="home-audience-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-[2.75rem]">
						<?php esc_html_e( 'Working together for', 'amanahcareservices' ); ?>
						<span class="text-primary"><?php esc_html_e( 'better outcomes.', 'amanahcareservices' ); ?></span>
					</h2>
					<p class="mx-auto mt-6 max-w-2xl text-base leading-7 text-body">
						<?php esc_html_e( 'Referrals are welcome from participants, families, support coordinators, plan managers and health professionals.', 'amanahcareservices' ); ?>
					</p>
				</div>

				<div class="relative mt-14 grid gap-6 md:grid-cols-3">
					<?php foreach ( $home_audiences as $index => $audience ) : ?>
						<?php $is_green = 1 === $index % 2; ?>
						<div class="group relative isolate flex flex-col overflow-hidden rounded-[1.75rem] border border-white bg-white/95 p-8 shadow-[0_1px_0_rgba(255,255,255,0.9)_inset,0_24px_60px_-28px_rgba(27,11,58,0.28)] ring-1 ring-[#ece6f6] backdrop-blur transition duration-500 hover:-translate-y-1.5 hover:shadow-[0_1px_0_rgba(255,255,255,0.9)_inset,0_36px_70px_-28px_rgba(81,31,159,0.38)] lg:p-9">
							<span class="pointer-events-none absolute -right-16 -top-16 -z-10 h-44 w-44 rounded-full <?php echo $is_green ? 'bg-mint' : 'bg-soft'; ?> opacity-70 transition duration-500 group-hover:scale-110 group-hover:opacity-100" aria-hidden="true"></span>

							<div class="flex items-start justify-between">
								<span class="relative flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br <?php echo $is_green ? 'from-secondary to-secondaryDark shadow-[0_14px_28px_-10px_rgba(46,162,42,0.6)]' : 'from-primary to-primaryDark shadow-[0_14px_28px_-10px_rgba(81,31,159,0.6)]'; ?> text-white transition duration-500 group-hover:-rotate-6">
									<i class="fa-solid <?php echo esc_attr( $audience['icon'] ); ?> text-lg" aria-hidden="true"></i>
								</span>
								<span class="font-display text-4xl font-extrabold leading-none tracking-[-0.04em] text-primary/10 transition duration-500 group-hover:text-primary/20" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							</div>

							<h3 class="mt-7 text-xl font-extrabold tracking-[-0.02em] text-ink"><?php echo esc_html( $audience['title'] ); ?></h3>
							<p class="mt-5 text-[15px] leading-7 text-body"><?php echo esc_html( $audience['text'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="relative mt-12 flex flex-col items-stretch justify-center gap-4 sm:flex-row sm:items-center">
					<a href="<?php echo esc_url( $home_contact['referral_url'] ); ?>"
						class="group relative inline-flex min-h-[50px] items-center justify-center overflow-hidden rounded-md bg-primary px-7 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_14px_32px_rgba(81,31,159,.28)] transition duration-300 hover:-translate-y-0.5 hover:bg-primaryDark hover:shadow-[0_18px_38px_rgba(81,31,159,.36)]">
						<span><?php esc_html_e( 'Make a Referral', 'amanahcareservices' ); ?></span>
						<span class="ml-3 flex items-center">
							<i class="fa-solid fa-arrow-right text-[12px] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
						</span>
						<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
					</a>
					<a href="<?php echo esc_url( home_url( '/ndis/' ) ); ?>"
						class="group relative inline-flex min-h-[50px] items-center justify-center overflow-hidden rounded-md border border-primary/25 bg-white px-7 text-[11px] font-extrabold uppercase tracking-[0.14em] text-primary shadow-[0_10px_24px_-12px_rgba(27,11,58,.2)] transition duration-300 hover:-translate-y-0.5 hover:border-primary/50">
						<span><?php esc_html_e( 'New to the NDIS? Start here', 'amanahcareservices' ); ?></span>
						<span class="ml-3 flex items-center">
							<i class="fa-solid fa-arrow-right text-[12px] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
						</span>
						<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<?php if ( $home_testimonials ) : ?>
		<!-- =========================================================
		     Testimonials (only shown when entered in the Customizer)
		     ========================================================= -->
		<section class="amanah-process relative isolate overflow-hidden py-20 text-white lg:py-24" aria-labelledby="home-testimonials-title">
			<div class="container relative mx-auto px-5 md:px-8 lg:px-12">
				<div class="max-w-3xl" data-reveal>
					<p class="amanah-eyebrow amanah-eyebrow--light"><?php esc_html_e( 'Kind words', 'amanahcareservices' ); ?></p>
					<h2 id="home-testimonials-title" class="mt-5 text-3xl font-extrabold tracking-[-0.035em] md:text-5xl"><?php esc_html_e( 'Shared with permission.', 'amanahcareservices' ); ?></h2>
				</div>
				<div class="mt-12 grid gap-6 <?php echo count( $home_testimonials ) > 1 ? 'lg:grid-cols-' . count( $home_testimonials ) : 'max-w-3xl'; ?>">
					<?php foreach ( $home_testimonials as $testimonial ) : ?>
						<figure class="relative flex flex-col rounded-[2rem] bg-white p-8 text-ink shadow-[0_30px_80px_rgba(0,0,0,0.2)]" data-reveal>
							<span class="absolute right-7 top-4 font-display text-8xl leading-none text-primary/10" aria-hidden="true">“</span>
							<span class="flex gap-1 text-secondary" aria-hidden="true"><i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i></span>
							<blockquote class="mt-6 flex-1 text-lg font-semibold leading-8"><p><?php echo esc_html( $testimonial['quote'] ); ?></p></blockquote>
							<figcaption class="mt-8 flex items-center gap-4 border-t border-[#efeaf7] pt-6">
								<span class="flex h-11 w-11 items-center justify-center rounded-full bg-primary font-extrabold text-white" aria-hidden="true"><?php echo esc_html( $testimonial['name'] ? mb_strtoupper( mb_substr( $testimonial['name'], 0, 1 ) ) : 'A' ); ?></span>
								<span>
									<strong class="block text-sm font-extrabold"><?php echo esc_html( $testimonial['name'] ? $testimonial['name'] : __( 'Anonymous', 'amanahcareservices' ) ); ?></strong>
									<?php if ( $testimonial['role'] ) : ?>
										<span class="text-xs font-semibold uppercase tracking-[0.1em] text-body"><?php echo esc_html( $testimonial['role'] ); ?></span>
									<?php endif; ?>
								</span>
							</figcaption>
						</figure>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- =========================================================
	     FAQ
	     ========================================================= -->
	<section class="relative isolate overflow-hidden bg-[#fbfafe] py-20 sm:py-24 lg:py-28" aria-labelledby="home-faq-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
				<div class="lg:col-span-4" data-reveal>
					<p class="amanah-eyebrow"><?php esc_html_e( 'Helpful answers', 'amanahcareservices' ); ?></p>
					<h2 id="home-faq-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl"><?php esc_html_e( 'Questions are always welcome.', 'amanahcareservices' ); ?></h2>
					<p class="mt-6 leading-7 text-body"><?php esc_html_e( 'Can’t find what you’re looking for? Reach out and we’ll give you a straightforward answer.', 'amanahcareservices' ); ?></p>
					<a href="<?php echo esc_url( $home_contact['cta_url'] ); ?>" class="group mt-7 inline-flex items-center gap-3 text-sm font-extrabold text-primary">
						<?php esc_html_e( 'Ask us anything', 'amanahcareservices' ); ?>
						<span class="flex h-10 w-10 items-center justify-center rounded-full bg-soft transition group-hover:translate-x-1 group-hover:bg-primary group-hover:text-white"><i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></span>
					</a>

					<?php if ( $home_socials ) : ?>
						<div class="mt-10 border-t border-[#ece6f6] pt-7">
							<p class="text-[11px] font-extrabold uppercase tracking-[0.2em] text-body"><?php esc_html_e( 'Follow our journey', 'amanahcareservices' ); ?></p>
							<div class="mt-4 flex flex-wrap gap-2.5">
								<?php foreach ( $home_socials as $social ) : ?>
									<a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noopener noreferrer"
										aria-label="<?php echo esc_attr( sprintf( /* translators: %s: social network. */ __( 'Follow us on %s (opens in a new tab)', 'amanahcareservices' ), $social['label'] ) ); ?>"
										class="flex h-11 w-11 items-center justify-center rounded-xl border border-[#e6def5] bg-white text-primary transition hover:-translate-y-0.5 hover:border-primary hover:bg-primary hover:text-white">
										<i class="fa-brands <?php echo esc_attr( $social['icon'] ); ?>" aria-hidden="true"></i>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>

				<div class="space-y-4 lg:col-span-8" data-reveal>
					<?php foreach ( $home_faqs as $index => $faq ) : ?>
						<details class="amanah-faq group rounded-[1.5rem] border border-[#ece6f6] bg-white px-6 transition-shadow open:shadow-[0_20px_45px_-20px_rgba(27,11,58,0.18)] sm:px-8" <?php echo 0 === $index ? 'open' : ''; ?>>
							<summary class="flex cursor-pointer list-none items-center justify-between gap-5 py-6">
								<span class="text-base font-extrabold text-ink sm:text-lg"><?php echo esc_html( $faq['question'] ); ?></span>
								<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-soft text-primary transition duration-300 group-open:rotate-45 group-open:bg-primary group-open:text-white">
									<i class="fa-solid fa-plus text-sm" aria-hidden="true"></i>
								</span>
							</summary>
							<p class="max-w-3xl pb-7 pr-4 leading-7 text-body sm:pr-14"><?php echo esc_html( $faq['answer'] ); ?></p>
						</details>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<?php
	while ( have_posts() ) :
		the_post();
		if ( '' !== trim( (string) get_the_content() ) ) :
			?>
			<section class="container mx-auto px-5 py-16 md:px-8 lg:px-12">
				<div class="entry-content mx-auto max-w-4xl">
					<?php the_content(); ?>
				</div>
			</section>
			<?php
		endif;
	endwhile;
	?>
</main>

<style>
	/* Values */
	.amanah-values {
		background: linear-gradient(180deg, #ffffff 0%, #fbf9fe 100%);
	}


	/* Services slider */
	.amanah-services {
		background:
			radial-gradient(circle at 0% 0%, rgba(201, 182, 240, 0.3), transparent 30%),
			radial-gradient(circle at 100% 100%, rgba(155, 224, 143, 0.2), transparent 30%),
			#fdfcff;
	}

	.amanah-services-slider {
		/* Room for hover lift and shadows inside Swiper's overflow clip. */
		margin: -1.25rem 0 -2.5rem;
		padding: 1.25rem 0 2.5rem;
	}

	.amanah-services-slider .swiper-slide {
		height: auto;
	}

	/* Fallback before Swiper loads (or if it fails): a scrollable row. */
	.amanah-services-slider:not(.swiper-initialized) .swiper-wrapper {
		display: flex;
		gap: 1.5rem;
		overflow-x: auto;
		scroll-snap-type: x mandatory;
	}

	.amanah-services-slider:not(.swiper-initialized) .swiper-slide {
		flex: 0 0 min(85%, 20rem);
		scroll-snap-align: start;
	}

	.amanah-service-card {
		position: relative;
		display: flex;
		flex-direction: column;
		height: 100%;
		overflow: hidden;
		border: 1px solid #ece6f6;
		border-radius: 1.75rem;
		background: #ffffff;
		box-shadow: 0 14px 38px -18px rgba(27, 11, 58, 0.18);
		transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.5s ease, border-color 0.5s ease;
	}

	.amanah-service-card:hover,
	.amanah-service-card:focus-within {
		transform: translateY(-8px);
		border-color: rgba(81, 31, 159, 0.18);
		box-shadow: none;
	}

	.amanah-service-card:focus-within {
		outline: 3px solid #2EA22A;
		outline-offset: 3px;
	}

	.amanah-service-card__media {
		position: relative;
		aspect-ratio: 4 / 3;
		overflow: hidden;
		margin: 0.6rem 0.6rem 0;
		border-radius: 1.35rem;
		background:
			radial-gradient(circle at 100% 0%, rgba(155, 224, 143, 0.35), transparent 45%),
			linear-gradient(150deg, #6a31c2 0%, #3a1575 60%, #1b0b3a 100%);
	}

	.amanah-service-card__media.is-green {
		background:
			radial-gradient(circle at 0% 0%, rgba(201, 182, 240, 0.4), transparent 45%),
			linear-gradient(150deg, #36b531 0%, #1e7a1b 60%, #124d11 100%);
	}

	.amanah-service-card__img {
		position: absolute;
		inset: 0;
		width: 100%;
		height: 100%;
		object-fit: cover;
		transition: transform 1.1s cubic-bezier(0.22, 1, 0.36, 1);
	}

	.amanah-service-card:hover .amanah-service-card__img {
		transform: scale(1.07);
	}

	.amanah-service-card__placeholder {
		position: absolute;
		inset: 0;
		display: flex;
		align-items: center;
		justify-content: center;
		color: rgba(255, 255, 255, 0.9);
		font-size: 3.25rem;
		background-image:
			radial-gradient(circle at center, rgba(255, 255, 255, 0.14) 0 22%, transparent 22.5%),
			radial-gradient(circle at center, transparent 0 34%, rgba(255, 255, 255, 0.07) 34.5% 35.5%, transparent 36%),
			radial-gradient(circle at center, transparent 0 48%, rgba(255, 255, 255, 0.05) 48.5% 49.5%, transparent 50%);
		transition: transform 1.1s cubic-bezier(0.22, 1, 0.36, 1);
	}

	.amanah-service-card:hover .amanah-service-card__placeholder {
		transform: scale(1.08) rotate(-3deg);
	}

	.amanah-service-card__shade {
		position: absolute;
		inset: 0;
		background: linear-gradient(180deg, rgba(27, 11, 58, 0.35) 0%, transparent 38%, transparent 60%, rgba(27, 11, 58, 0.45) 100%);
		pointer-events: none;
	}

	.amanah-service-card__code {
		position: absolute;
		top: 0.85rem;
		left: 0.85rem;
		z-index: 2;
		display: inline-flex;
		align-items: center;
		gap: 0.3rem;
		padding: 0.4rem 0.8rem;
		border: 1px solid rgba(255, 255, 255, 0.3);
		border-radius: 999px;
		background: rgba(255, 255, 255, 0.16);
		-webkit-backdrop-filter: blur(10px);
		backdrop-filter: blur(10px);
		color: #ffffff;
		font-size: 0.68rem;
		font-weight: 800;
		letter-spacing: 0.14em;
	}

	.amanah-service-card__num {
		position: absolute;
		right: 1rem;
		bottom: 0.6rem;
		z-index: 2;
		color: rgba(255, 255, 255, 0.85);
		font-family: 'Marcellus', Georgia, serif;
		font-size: 1.75rem;
		line-height: 1;
	}

	.amanah-service-card__body {
		position: relative;
		display: flex;
		flex: 1;
		flex-direction: column;
		padding: 0 1.6rem 1.6rem;
	}

	.amanah-service-card__icon {
		position: relative;
		z-index: 2;
		display: flex;
		align-items: center;
		justify-content: center;
		width: 3.5rem;
		height: 3.5rem;
		margin-top: -1.75rem;
		border: 4px solid #ffffff;
		border-radius: 1.1rem;
		background: linear-gradient(145deg, #6a31c2, #3a1575);
		box-shadow: 0 12px 24px -10px rgba(81, 31, 159, 0.6);
		color: #ffffff;
		font-size: 1.1rem;
		transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);
	}

	.amanah-service-card__icon.is-green {
		background: linear-gradient(145deg, #36b531, #1e7a1b);
		box-shadow: 0 12px 24px -10px rgba(30, 122, 27, 0.6);
	}

	.amanah-service-card:hover .amanah-service-card__icon {
		transform: rotate(-6deg) scale(1.06);
	}

	.amanah-service-card__arrow {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 2.4rem;
		height: 2.4rem;
		border-radius: 999px;
		background: #F6F2FD;
		color: #511F9F;
		font-size: 0.75rem;
		transition: background 0.4s ease, color 0.4s ease, transform 0.4s ease;
	}

	.amanah-service-card:hover .amanah-service-card__arrow {
		background: #511F9F;
		color: #ffffff;
		transform: rotate(-45deg);
	}

	/* Slider controls */
	.amanah-slider-btn {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 3.25rem;
		height: 3.25rem;
		border: 1px solid #e0d6f2;
		border-radius: 999px;
		background: #ffffff;
		color: #511F9F;
		transition: all 0.3s ease;
	}

	/* Side arrows, vertically centred on the cards. */
	.amanah-services-carousel .amanah-slider-btn {
		position: absolute;
		top: 50%;
		z-index: 10;
		box-shadow: 0 16px 32px -14px rgba(27, 11, 58, 0.45);
		transform: translateY(-50%);
	}

	/*
	 * Cards use the full container width; arrows sit outside it.
	 * Below 1680px there is no room beside the container, so the arrows
	 * tuck into the container gutter and just overlap the card edges.
	 */
	.amanah-slider-btn--prev {
		left: -1.25rem;
	}

	.amanah-slider-btn--next {
		right: -1.25rem;
	}

	@media (min-width: 1680px) {
		.amanah-slider-btn--prev {
			left: -5rem;
		}

		.amanah-slider-btn--next {
			right: -5rem;
		}
	}

	/* On phones, swipe and dots take over. */
	@media (max-width: 639px) {
		.amanah-services-carousel .amanah-slider-btn {
			display: none;
		}
	}

	/* Balance the centred eyebrow with a line on both sides. */
	.amanah-services .amanah-eyebrow::after,
	.amanah-audience .amanah-eyebrow::after {
		width: 2.25rem;
		height: 2px;
		border-radius: 9999px;
		background: linear-gradient(90deg, #2ea22a, #511f9f);
		content: "";
	}

	.amanah-services-carousel .amanah-slider-btn:hover {
		border-color: transparent;
		background: linear-gradient(135deg, #511F9F, #3A1575);
		color: #ffffff;
		transform: translateY(-50%) scale(1.06);
	}

	.amanah-slider-btn:focus-visible {
		outline: 3px solid #2EA22A;
		outline-offset: 3px;
	}

	.amanah-slider-btn.swiper-button-disabled {
		opacity: 0.4;
		pointer-events: none;
	}

	.amanah-services-pagination.swiper-pagination-bullets {
		position: static;
		display: flex;
		gap: 0.45rem;
		width: auto;
	}

	.amanah-services-pagination .swiper-pagination-bullet {
		width: 0.55rem;
		height: 0.55rem;
		margin: 0 !important;
		background: #C9B6F0;
		opacity: 1;
		transition: width 0.4s ease, background 0.4s ease;
	}

	.amanah-services-pagination .swiper-pagination-bullet-active {
		width: 2rem;
		border-radius: 999px;
		background: #511F9F;
	}

	@media (prefers-reduced-motion: reduce) {
		.amanah-service-card,
		.amanah-service-card__img,
		.amanah-service-card__placeholder,
		.amanah-service-card__icon {
			transition: none;
		}
	}

	/* Process */
	.amanah-process {
		background:
			radial-gradient(circle at 15% 10%, rgba(123, 77, 209, 0.45), transparent 35%),
			radial-gradient(circle at 90% 90%, rgba(46, 162, 42, 0.2), transparent 30%),
			linear-gradient(160deg, #2a0f5a 0%, #1b0b3a 70%);
	}

	.amanah-step-card {
		position: relative;
		display: flex;
		flex-direction: column;
		overflow: hidden;
		padding: 2rem 1.75rem 2.1rem;
		border: 1px solid rgba(255, 255, 255, 0.1);
		border-radius: 1.5rem;
		background:
			linear-gradient(160deg, rgba(255, 255, 255, 0.09) 0%, rgba(255, 255, 255, 0.02) 55%, rgba(255, 255, 255, 0.04) 100%);
		-webkit-backdrop-filter: blur(12px);
		backdrop-filter: blur(12px);
		transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1), border-color 0.4s ease, background 0.4s ease;
	}

	.amanah-step-card::after {
		position: absolute;
		top: -5rem;
		right: -5rem;
		width: 12rem;
		height: 12rem;
		border-radius: 50%;
		background: radial-gradient(circle, rgba(123, 77, 209, 0.35), transparent 70%);
		content: "";
		opacity: 0.5;
		pointer-events: none;
		transition: opacity 0.5s ease;
	}

	.amanah-step-card.is-green::after {
		background: radial-gradient(circle, rgba(46, 162, 42, 0.3), transparent 70%);
	}

	.amanah-step-card:hover {
		transform: translateY(-6px);
		border-color: rgba(201, 182, 240, 0.3);
		background:
			linear-gradient(160deg, rgba(255, 255, 255, 0.12) 0%, rgba(255, 255, 255, 0.04) 55%, rgba(255, 255, 255, 0.06) 100%);
	}

	.amanah-step-card.is-green:hover {
		border-color: rgba(155, 224, 143, 0.3);
	}

	.amanah-step-card:hover::after {
		opacity: 1;
	}

	/* Step icon: glass ring holding a glossy gradient tile. */
	.amanah-step-card__icon {
		position: relative;
		display: flex;
		align-items: center;
		justify-content: center;
		width: 3.5rem;
		height: 3.5rem;
		padding: 0.3rem;
		border: 1px solid rgba(201, 182, 240, 0.22);
		border-radius: 1.1rem;
		background: linear-gradient(145deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.02));
		box-shadow: 0 20px 40px -18px rgba(123, 77, 209, 0.8);
		transition: border-color 0.4s ease, transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);
	}

	.amanah-step-card.is-green .amanah-step-card__icon {
		border-color: rgba(155, 224, 143, 0.25);
		box-shadow: 0 20px 40px -18px rgba(46, 162, 42, 0.8);
	}

	.amanah-step-card__icon-tile {
		position: relative;
		display: flex;
		align-items: center;
		justify-content: center;
		width: 100%;
		height: 100%;
		overflow: hidden;
		border-radius: 0.8rem;
		background:
			radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.35), transparent 55%),
			linear-gradient(145deg, #9466e6 0%, #511F9F 55%, #3A1575 100%);
		box-shadow:
			inset 0 1px 1px rgba(255, 255, 255, 0.45),
			inset 0 -6px 12px rgba(27, 11, 58, 0.35);
		color: #ffffff;
		font-size: 1rem;
		text-shadow: 0 2px 6px rgba(27, 11, 58, 0.35);
	}

	.amanah-step-card.is-green .amanah-step-card__icon-tile {
		background:
			radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.4), transparent 55%),
			linear-gradient(145deg, #5fd35a 0%, #2EA22A 55%, #1E7A1B 100%);
		box-shadow:
			inset 0 1px 1px rgba(255, 255, 255, 0.5),
			inset 0 -6px 12px rgba(18, 77, 17, 0.4);
		text-shadow: 0 2px 6px rgba(18, 77, 17, 0.4);
	}

	/* Light sweep across the tile on hover. */
	.amanah-step-card__icon-tile::after {
		position: absolute;
		inset: -50% auto -50% -60%;
		width: 40%;
		background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.45), transparent);
		content: "";
		transform: rotate(20deg) translateX(0);
		transition: transform 0.9s cubic-bezier(0.22, 1, 0.36, 1);
	}

	.amanah-step-card:hover .amanah-step-card__icon {
		border-color: rgba(201, 182, 240, 0.45);
		transform: translateY(-3px);
	}

	.amanah-step-card.is-green:hover .amanah-step-card__icon {
		border-color: rgba(155, 224, 143, 0.5);
	}

	.amanah-step-card:hover .amanah-step-card__icon-tile::after {
		transform: rotate(20deg) translateX(520%);
	}

	.amanah-step-card__next {
		align-items: center;
		justify-content: center;
		width: 2rem;
		height: 2rem;
		border: 1px solid rgba(255, 255, 255, 0.15);
		border-radius: 999px;
		color: rgba(255, 255, 255, 0.5);
		font-size: 0.65rem;
	}

	@media (prefers-reduced-motion: reduce) {
		.amanah-step-card,
		.amanah-step-card__icon,
		.amanah-step-card__icon-tile::after {
			transition: none;
		}
	}

	/* Audience */
	.amanah-audience {
		background:
			radial-gradient(circle at 100% 100%, rgba(155, 224, 143, 0.35), transparent 40%),
			linear-gradient(135deg, #f3edfd 0%, #eef8ec 100%);
	}

	@media (prefers-reduced-motion: reduce) {

		.amanah-float,
		.amanah-float-slow {
			animation: none;
		}
	}
</style>

<?php
get_footer();
