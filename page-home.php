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
$home_hero_id  = absint( get_theme_mod( 'amanahcareservices_hero_image', 0 ) );
$home_about_id = absint( get_theme_mod( 'amanahcareservices_about_image', 0 ) );

$home_values = array(
	array( 'icon' => 'fa-handshake-simple', 'title' => 'Trust & integrity', 'text' => 'We do what we say, every time.' ),
	array( 'icon' => 'fa-hands-holding-child', 'title' => 'Dignity & respect', 'text' => 'Your privacy and choices come first.' ),
	array( 'icon' => 'fa-compass', 'title' => 'Person-centred', 'text' => 'Support shaped around your goals.' ),
	array( 'icon' => 'fa-shield-heart', 'title' => 'Safe & reliable', 'text' => 'Consistent care you can count on.' ),
);

$home_steps = array(
	array( 'title' => 'Reach out', 'text' => 'Call, email or send a referral. We’ll get back to you quickly and answer your questions in plain language.' ),
	array( 'title' => 'Get to know you', 'text' => 'We meet with you, and anyone you’d like involved, to understand your goals, routines and preferences.' ),
	array( 'title' => 'Plan your support', 'text' => 'Together we agree on a support plan and match you with workers who suit your needs and personality.' ),
	array( 'title' => 'Start & review', 'text' => 'Support begins, and we check in regularly so it keeps working as your life and goals change.' ),
);

$home_reasons = array(
	array( 'icon' => 'fa-user-group', 'title' => 'Familiar faces', 'text' => 'We aim to keep the same support workers with you, so trust can grow over time.' ),
	array( 'icon' => 'fa-comments', 'title' => 'Clear communication', 'text' => 'Honest updates and a team that picks up the phone when you need us.' ),
	array( 'icon' => 'fa-earth-oceania', 'title' => 'Culturally respectful', 'text' => 'We respect your faith, culture, language and family values in every visit.' ),
	array( 'icon' => 'fa-calendar-check', 'title' => 'Flexible scheduling', 'text' => 'Support arranged around your routine, not the other way around.' ),
	array( 'icon' => 'fa-people-roof', 'title' => 'Family involved', 'text' => 'With your consent, we work closely with family, carers and your support network.' ),
	array( 'icon' => 'fa-award', 'title' => 'Carefully selected team', 'text' => 'Caring, trained support workers who share our values of honesty and respect.' ),
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

	<!-- =========================================================
	     Hero
	     ========================================================= -->
	<section class="amanah-hero relative isolate overflow-hidden pb-28 pt-12 sm:pt-16 lg:pb-36 lg:pt-20" aria-labelledby="home-hero-title">
		<div class="amanah-hero-art" aria-hidden="true">
			<span class="amanah-hero-art__glow amanah-hero-art__glow--purple"></span>
			<span class="amanah-hero-art__glow amanah-hero-art__glow--green"></span>
			<span class="amanah-hero-art__grid"></span>
			<svg class="amanah-hero-art__heart" viewBox="0 0 200 180" fill="none">
				<path d="M100 170C60 135 10 105 10 58 10 30 32 10 58 10c18 0 32 10 42 24 10-14 24-24 42-24 26 0 48 20 48 48 0 47-50 77-90 112z" />
			</svg>
		</div>

		<div class="container relative mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid items-center gap-14 lg:grid-cols-12 lg:gap-10 xl:gap-16">
				<div class="lg:col-span-7" data-reveal>
					<p class="inline-flex items-center gap-3 rounded-full border border-primary/15 bg-white/80 py-1.5 pl-1.5 pr-4 text-[11px] font-extrabold uppercase tracking-[0.16em] text-primary shadow-[0_8px_24px_rgba(81,31,159,0.08)] backdrop-blur">
						<span class="flex h-7 w-7 items-center justify-center rounded-full bg-secondary text-white">
							<i class="fa-solid fa-heart text-[10px]" aria-hidden="true"></i>
						</span>
						<?php
						if ( $home_contact['ndis_number'] ) {
							esc_html_e( 'Registered NDIS Provider', 'amanahcareservices' );
						} else {
							esc_html_e( 'Disability & community support', 'amanahcareservices' );
						}
						?>
					</p>

					<h1 id="home-hero-title" class="mt-7 text-[2.6rem] font-extrabold leading-[1.05] tracking-[-0.04em] text-ink sm:text-6xl xl:text-[4.5rem]">
						<?php esc_html_e( 'Care built on trust,', 'amanahcareservices' ); ?>
						<span class="amanah-gradient-text block"><?php esc_html_e( 'delivered with heart.', 'amanahcareservices' ); ?></span>
					</h1>

					<p class="mt-7 max-w-xl text-lg leading-8 text-body">
						<?php esc_html_e( 'Amanah Care Services provides respectful, person-centred support that helps you live safely, build independence and stay connected to the people and community you love.', 'amanahcareservices' ); ?>
					</p>

					<div class="mt-10 flex flex-col gap-4 sm:flex-row sm:items-center">
						<a href="<?php echo esc_url( $home_contact['referral_url'] ); ?>"
							class="group relative inline-flex items-center justify-center gap-3 overflow-hidden rounded-full bg-gradient-to-r from-primary to-primaryDark py-3 pl-7 pr-3 text-[12px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_16px_36px_rgba(81,31,159,0.32)] transition duration-300 hover:-translate-y-0.5 hover:shadow-[0_20px_44px_rgba(81,31,159,0.4)]">
							<span class="relative z-10"><?php esc_html_e( 'Make a Referral', 'amanahcareservices' ); ?></span>
							<span class="relative z-10 flex h-9 w-9 items-center justify-center rounded-full bg-secondary transition-transform group-hover:translate-x-0.5">
								<i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
							</span>
							<span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-transform duration-1000 group-hover:translate-x-full" aria-hidden="true"></span>
						</a>

						<?php if ( $home_phone['label'] ) : ?>
							<a href="<?php echo esc_attr( $home_phone['uri'] ); ?>" class="group inline-flex items-center justify-center gap-3 rounded-full border border-[#e2d9f2] bg-white px-4 py-2.5 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-secondary/40 hover:shadow-lg">
								<span class="flex h-9 w-9 items-center justify-center rounded-full bg-mint text-secondaryDark transition group-hover:bg-secondary group-hover:text-white">
									<i class="fa-solid fa-phone" aria-hidden="true"></i>
								</span>
								<span class="pr-3 text-left leading-tight">
									<span class="block text-[10px] font-bold uppercase tracking-[0.16em] text-body/80"><?php esc_html_e( 'Talk to our team', 'amanahcareservices' ); ?></span>
									<span class="block text-[15px] font-extrabold text-ink"><?php echo esc_html( $home_phone['label'] ); ?></span>
								</span>
							</a>
						<?php else : ?>
							<a href="#services" class="group inline-flex items-center justify-center gap-3 rounded-full border border-[#e2d9f2] bg-white px-7 py-4 text-[12px] font-extrabold uppercase tracking-[0.14em] text-primary shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-primary/40 hover:shadow-lg">
								<?php esc_html_e( 'Explore Services', 'amanahcareservices' ); ?>
								<i class="fa-solid fa-arrow-down text-[11px] transition-transform group-hover:translate-y-0.5" aria-hidden="true"></i>
							</a>
						<?php endif; ?>
					</div>

					<ul class="mt-10 flex flex-wrap gap-x-7 gap-y-3 text-sm font-semibold text-ink/80">
						<li class="flex items-center gap-2.5"><i class="fa-solid fa-circle-check text-secondary" aria-hidden="true"></i><?php esc_html_e( 'Person-centred plans', 'amanahcareservices' ); ?></li>
						<li class="flex items-center gap-2.5"><i class="fa-solid fa-circle-check text-secondary" aria-hidden="true"></i><?php esc_html_e( 'Consistent support workers', 'amanahcareservices' ); ?></li>
						<li class="flex items-center gap-2.5"><i class="fa-solid fa-circle-check text-secondary" aria-hidden="true"></i><?php esc_html_e( 'Culturally respectful care', 'amanahcareservices' ); ?></li>
					</ul>
				</div>

				<!-- Hero visual -->
				<div class="relative mx-auto w-full max-w-[520px] lg:col-span-5 lg:max-w-none" data-reveal>
					<div class="relative aspect-[4/5] w-full">
						<span class="absolute -right-3 -top-3 h-full w-full rounded-t-[999px] rounded-b-[2.5rem] border-2 border-dashed border-secondary/30" aria-hidden="true"></span>

						<?php if ( $home_hero_id ) : ?>
							<div class="relative h-full w-full overflow-hidden rounded-t-[999px] rounded-b-[2.5rem] shadow-[0_40px_90px_-30px_rgba(27,11,58,0.5)]">
								<?php
								echo wp_get_attachment_image(
									$home_hero_id,
									'large',
									false,
									array(
										'class'         => 'h-full w-full object-cover',
										'loading'       => 'eager',
										'fetchpriority' => 'high',
									)
								);
								?>
								<span class="absolute inset-0 bg-gradient-to-t from-ink/40 via-transparent to-transparent" aria-hidden="true"></span>
							</div>
						<?php else : ?>
							<div class="amanah-hero-visual relative flex h-full w-full items-center justify-center overflow-hidden rounded-t-[999px] rounded-b-[2.5rem] shadow-[0_40px_90px_-30px_rgba(27,11,58,0.55)]">
								<span class="amanah-hero-visual__ring amanah-hero-visual__ring--one" aria-hidden="true"></span>
								<span class="amanah-hero-visual__ring amanah-hero-visual__ring--two" aria-hidden="true"></span>
								<span class="amanah-hero-visual__ring amanah-hero-visual__ring--three" aria-hidden="true"></span>
								<div class="relative flex h-[62%] w-[62%] items-center justify-center rounded-full bg-white shadow-[0_30px_70px_rgba(12,4,28,0.35)]">
									<img
										src="<?php echo esc_url( amanahcareservices_get_logo_url( 'mark' ) ); ?>"
										alt=""
										width="343"
										height="363"
										class="amanah-float h-auto w-[62%]"
										decoding="async">
								</div>
								<p class="absolute bottom-8 left-0 right-0 text-center font-display text-lg tracking-[0.3em] text-white/85"><?php esc_html_e( 'AMANAH', 'amanahcareservices' ); ?></p>
							</div>
						<?php endif; ?>

						<!-- Floating cards -->
						<div class="amanah-float-slow absolute -left-4 top-[18%] flex items-center gap-3 rounded-2xl border border-white/70 bg-white/90 p-3.5 pr-5 shadow-[0_20px_50px_rgba(27,11,58,0.16)] backdrop-blur sm:-left-10">
							<span class="flex h-11 w-11 items-center justify-center rounded-xl bg-soft text-primary"><i class="fa-solid fa-hand-holding-heart" aria-hidden="true"></i></span>
							<span class="leading-tight">
								<span class="block text-sm font-extrabold text-ink"><?php esc_html_e( 'Your plan, your pace', 'amanahcareservices' ); ?></span>
								<span class="block text-xs font-medium text-body"><?php esc_html_e( 'Support that fits your life', 'amanahcareservices' ); ?></span>
							</span>
						</div>

						<div class="amanah-float absolute -right-3 bottom-[14%] max-w-[230px] rounded-2xl border border-white/70 bg-white/95 p-4 shadow-[0_20px_50px_rgba(27,11,58,0.16)] backdrop-blur sm:-right-8">
							<p class="font-display text-2xl leading-none text-primary" lang="ar" dir="rtl">أمانة</p>
							<p class="mt-2 text-xs font-semibold leading-5 text-body">
								<span class="font-extrabold text-ink"><?php esc_html_e( 'Amanah', 'amanahcareservices' ); ?></span>
								<?php esc_html_e( '— trust, honesty and a responsibility held with care.', 'amanahcareservices' ); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- =========================================================
	     Values strip
	     ========================================================= -->
	<section class="relative z-10 -mt-16 px-5 md:px-8 lg:-mt-20 lg:px-12" aria-label="<?php esc_attr_e( 'Our values', 'amanahcareservices' ); ?>">
		<div class="container mx-auto">
			<ul class="grid overflow-hidden rounded-[2rem] border border-[#ece6f6] bg-white shadow-[0_30px_70px_-20px_rgba(27,11,58,0.18)] sm:grid-cols-2 lg:grid-cols-4" data-reveal>
				<?php foreach ( $home_values as $index => $value ) : ?>
					<li class="group flex items-start gap-4 border-[#f0ebf8] p-6 transition-colors hover:bg-soft/60 sm:p-7 <?php echo $index > 0 ? 'border-t sm:border-t-0' : ''; ?> <?php echo 1 === $index % 2 ? 'sm:border-l' : ''; ?> <?php echo $index > 1 ? 'sm:border-t lg:border-t-0' : ''; ?> <?php echo 2 === $index ? 'lg:border-l' : ''; ?>">
						<span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl <?php echo 0 === $index % 2 ? 'bg-soft text-primary' : 'bg-mint text-secondaryDark'; ?> transition duration-300 group-hover:scale-110">
							<i class="fa-solid <?php echo esc_attr( $value['icon'] ); ?> text-lg" aria-hidden="true"></i>
						</span>
						<span>
							<span class="block text-base font-extrabold text-ink"><?php echo esc_html( $value['title'] ); ?></span>
							<span class="mt-1 block text-sm leading-6 text-body"><?php echo esc_html( $value['text'] ); ?></span>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<!-- =========================================================
	     About / meaning of Amanah
	     ========================================================= -->
	<section id="about" class="relative isolate overflow-hidden py-20 sm:py-24 lg:py-32" aria-labelledby="home-about-title">
		<span class="pointer-events-none absolute -left-40 top-1/3 -z-10 h-[30rem] w-[30rem] rounded-full bg-soft blur-3xl" aria-hidden="true"></span>
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid items-center gap-16 lg:grid-cols-12 lg:gap-12 xl:gap-20">
				<div class="relative lg:col-span-5" data-reveal>
					<span class="absolute -left-4 -top-4 h-28 w-28 rounded-[2rem] bg-secondary/15" aria-hidden="true"></span>
					<span class="absolute -bottom-5 -right-5 h-40 w-40 rounded-full border-[18px] border-soft" aria-hidden="true"></span>

					<?php if ( $home_about_id ) : ?>
						<div class="relative overflow-hidden rounded-[2rem_2rem_6rem_2rem] shadow-[0_35px_80px_-25px_rgba(27,11,58,0.4)]">
							<?php echo wp_get_attachment_image( $home_about_id, 'large', false, array( 'class' => 'h-[460px] w-full object-cover sm:h-[540px]', 'loading' => 'lazy' ) ); ?>
						</div>
					<?php else : ?>
						<div class="amanah-meaning-card relative overflow-hidden rounded-[2rem_2rem_6rem_2rem] p-9 text-white shadow-[0_35px_80px_-25px_rgba(27,11,58,0.55)] sm:p-12">
							<span class="pointer-events-none absolute -right-16 -top-16 h-56 w-56 rounded-full border-[36px] border-white/[0.06]" aria-hidden="true"></span>
							<p class="text-[11px] font-extrabold uppercase tracking-[0.24em] text-leaf"><?php esc_html_e( 'The meaning behind our name', 'amanahcareservices' ); ?></p>
							<p class="mt-8 font-display text-6xl leading-none sm:text-7xl" lang="ar" dir="rtl">أمانة</p>
							<p class="mt-6 font-display text-4xl tracking-wide sm:text-5xl"><?php esc_html_e( 'Amanah', 'amanahcareservices' ); ?></p>
							<p class="mt-2 text-sm font-semibold italic text-white/70"><?php esc_html_e( 'noun · /a·maa·nah/', 'amanahcareservices' ); ?></p>
							<ol class="mt-8 space-y-4 border-t border-white/15 pt-8 text-[15px] leading-7 text-white/85">
								<li class="flex gap-4"><span class="font-display text-leaf">1.</span><?php esc_html_e( 'Trust placed in someone’s care.', 'amanahcareservices' ); ?></li>
								<li class="flex gap-4"><span class="font-display text-leaf">2.</span><?php esc_html_e( 'Honesty, integrity and faithfulness.', 'amanahcareservices' ); ?></li>
								<li class="flex gap-4"><span class="font-display text-leaf">3.</span><?php esc_html_e( 'A responsibility we hold with respect.', 'amanahcareservices' ); ?></li>
							</ol>
						</div>
					<?php endif; ?>

					<div class="absolute -bottom-8 left-6 flex items-center gap-3 rounded-2xl bg-white p-4 pr-6 shadow-[0_20px_50px_rgba(27,11,58,0.18)] sm:left-10">
						<span class="flex h-11 w-11 items-center justify-center rounded-xl bg-secondary text-white"><i class="fa-solid fa-quote-left" aria-hidden="true"></i></span>
						<span class="text-sm font-extrabold leading-snug text-ink"><?php esc_html_e( 'Quality care you can trust.', 'amanahcareservices' ); ?></span>
					</div>
				</div>

				<div class="lg:col-span-7" data-reveal>
					<p class="amanah-eyebrow"><?php esc_html_e( 'About Amanah Care Services', 'amanahcareservices' ); ?></p>
					<h2 id="home-about-title" class="mt-5 max-w-2xl text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl">
						<?php esc_html_e( 'A name that is also', 'amanahcareservices' ); ?>
						<span class="text-primary"><?php esc_html_e( 'our promise to you.', 'amanahcareservices' ); ?></span>
					</h2>
					<p class="mt-7 max-w-2xl text-lg leading-8 text-body">
						<?php esc_html_e( 'When you welcome us into your home and your life, you are trusting us with something precious. We take that seriously. Our team listens first, respects your choices and shows up with warmth, patience and consistency.', 'amanahcareservices' ); ?>
					</p>
					<p class="mt-5 max-w-2xl leading-8 text-body">
						<?php esc_html_e( 'Whether you need a little help around the house or daily support to live independently, we tailor every service around your goals, your culture and the way you like to live.', 'amanahcareservices' ); ?>
					</p>

					<div class="mt-10 grid gap-5 sm:grid-cols-2">
						<div class="group rounded-3xl border border-[#ece6f6] bg-white p-6 transition duration-300 hover:-translate-y-1 hover:border-primary/20 hover:shadow-[0_24px_50px_-20px_rgba(81,31,159,0.3)]">
							<span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-soft text-primary transition group-hover:bg-primary group-hover:text-white"><i class="fa-solid fa-ear-listen" aria-hidden="true"></i></span>
							<h3 class="mt-5 text-lg font-extrabold text-ink"><?php esc_html_e( 'We listen first', 'amanahcareservices' ); ?></h3>
							<p class="mt-2 text-sm leading-6 text-body"><?php esc_html_e( 'Your voice guides every decision about your support.', 'amanahcareservices' ); ?></p>
						</div>
						<div class="group rounded-3xl border border-[#ece6f6] bg-white p-6 transition duration-300 hover:-translate-y-1 hover:border-secondary/30 hover:shadow-[0_24px_50px_-20px_rgba(46,162,42,0.3)]">
							<span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-mint text-secondaryDark transition group-hover:bg-secondary group-hover:text-white"><i class="fa-solid fa-seedling" aria-hidden="true"></i></span>
							<h3 class="mt-5 text-lg font-extrabold text-ink"><?php esc_html_e( 'We build independence', 'amanahcareservices' ); ?></h3>
							<p class="mt-2 text-sm leading-6 text-body"><?php esc_html_e( 'Support that grows your confidence and skills over time.', 'amanahcareservices' ); ?></p>
						</div>
					</div>

					<div class="mt-10 flex flex-wrap items-center gap-6">
						<a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="group inline-flex items-center gap-3 text-sm font-extrabold text-primary">
							<?php esc_html_e( 'Learn more about us', 'amanahcareservices' ); ?>
							<span class="flex h-10 w-10 items-center justify-center rounded-full bg-soft transition group-hover:translate-x-1 group-hover:bg-primary group-hover:text-white">
								<i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
							</span>
						</a>
						<?php if ( $home_contact['ndis_number'] ) : ?>
							<span class="flex items-center gap-3 border-l border-[#e6def5] pl-6 text-sm font-bold text-ink">
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
		<div class="container relative mx-auto px-5 md:px-8 lg:px-12">
			<div class="mb-14 flex flex-col justify-between gap-7 lg:flex-row lg:items-end" data-reveal>
				<div class="max-w-2xl">
					<p class="amanah-eyebrow"><?php esc_html_e( 'How we can help', 'amanahcareservices' ); ?></p>
					<h2 id="home-services-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl">
						<?php esc_html_e( 'Support for everyday life,', 'amanahcareservices' ); ?>
						<span class="text-secondaryDark"><?php esc_html_e( 'shaped around you.', 'amanahcareservices' ); ?></span>
					</h2>
				</div>
				<p class="max-w-md text-base leading-7 text-body">
					<?php esc_html_e( 'Flexible services you can combine and adjust as your goals change, always delivered with patience, respect and care.', 'amanahcareservices' ); ?>
				</p>
			</div>

			<div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
				<?php foreach ( $home_services as $index => $service ) : ?>
					<?php $is_green = 1 === $index % 2; ?>
					<article class="amanah-service-card group relative flex flex-col overflow-hidden rounded-[1.75rem] border border-[#ece6f6] bg-white p-7 shadow-[0_12px_35px_-15px_rgba(27,11,58,0.12)] transition duration-500 hover:-translate-y-2 hover:border-transparent hover:shadow-[0_30px_60px_-20px_rgba(81,31,159,0.35)]" data-reveal>
						<span class="amanah-service-card__bg absolute inset-0 -z-0 opacity-0 transition-opacity duration-500 group-hover:opacity-100" aria-hidden="true"></span>
						<div class="relative flex items-start justify-between">
							<span class="flex h-14 w-14 items-center justify-center rounded-2xl <?php echo $is_green ? 'bg-mint text-secondaryDark' : 'bg-soft text-primary'; ?> transition duration-500 group-hover:rotate-3 group-hover:scale-110 group-hover:bg-white/15 group-hover:text-white">
								<i class="fa-solid <?php echo esc_attr( $service['icon'] ); ?> text-xl" aria-hidden="true"></i>
							</span>
							<span class="font-display text-2xl text-[#d9cff0] transition group-hover:text-white/40"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						</div>
						<h3 class="relative mt-7 text-xl font-extrabold text-ink transition group-hover:text-white">
							<a href="<?php echo esc_url( $service['url'] ); ?>" class="after:absolute after:inset-0 after:content-['']"><?php echo esc_html( $service['title'] ); ?></a>
						</h3>
						<p class="relative mt-3 flex-1 text-sm leading-7 text-body transition group-hover:text-white/80"><?php echo esc_html( $service['description'] ); ?></p>
						<span class="relative mt-6 inline-flex items-center gap-2 text-xs font-extrabold uppercase tracking-[0.14em] <?php echo $is_green ? 'text-secondaryDark' : 'text-primary'; ?> transition group-hover:text-leaf" aria-hidden="true">
							<?php esc_html_e( 'Learn more', 'amanahcareservices' ); ?>
							<i class="fa-solid fa-arrow-right transition-transform group-hover:translate-x-1"></i>
						</span>
					</article>
				<?php endforeach; ?>
			</div>

			<div class="mt-14 flex justify-center">
				<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"
					class="group inline-flex items-center gap-3 rounded-full bg-ink py-3 pl-7 pr-3 text-[12px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_16px_36px_rgba(27,11,58,0.25)] transition duration-300 hover:-translate-y-0.5 hover:bg-primary">
					<?php esc_html_e( 'View all services', 'amanahcareservices' ); ?>
					<span class="flex h-9 w-9 items-center justify-center rounded-full bg-secondary transition-transform group-hover:translate-x-0.5">
						<i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
					</span>
				</a>
			</div>
		</div>
	</section>

	<!-- =========================================================
	     Process
	     ========================================================= -->
	<section class="amanah-process relative isolate overflow-hidden py-20 text-white sm:py-24 lg:py-28" aria-labelledby="home-process-title">
		<div class="amanah-process-art" aria-hidden="true">
			<span class="amanah-process-art__ring amanah-process-art__ring--one"></span>
			<span class="amanah-process-art__ring amanah-process-art__ring--two"></span>
			<span class="amanah-process-art__dots"></span>
		</div>
		<div class="container relative mx-auto px-5 md:px-8 lg:px-12">
			<div class="mx-auto max-w-3xl text-center" data-reveal>
				<p class="amanah-eyebrow amanah-eyebrow--light justify-center"><?php esc_html_e( 'Getting started', 'amanahcareservices' ); ?></p>
				<h2 id="home-process-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] md:text-5xl">
					<?php esc_html_e( 'Starting support should feel', 'amanahcareservices' ); ?>
					<span class="text-leaf"><?php esc_html_e( 'simple and clear.', 'amanahcareservices' ); ?></span>
				</h2>
				<p class="mt-6 text-lg leading-8 text-white/70"><?php esc_html_e( 'Four friendly steps, with our team beside you the whole way.', 'amanahcareservices' ); ?></p>
			</div>

			<ol class="relative mt-16 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
				<span class="pointer-events-none absolute left-[12%] right-[12%] top-10 hidden h-px bg-gradient-to-r from-transparent via-white/25 to-transparent xl:block" aria-hidden="true"></span>
				<?php foreach ( $home_steps as $index => $step ) : ?>
					<li class="group relative rounded-[1.75rem] border border-white/10 bg-white/[0.05] p-7 backdrop-blur transition duration-300 hover:-translate-y-1 hover:border-leaf/40 hover:bg-white/[0.08]" data-reveal>
						<span class="relative z-10 flex h-14 w-14 items-center justify-center rounded-2xl font-display text-xl <?php echo 0 === $index % 2 ? 'bg-gradient-to-br from-[#7b4dd1] to-primary text-white' : 'bg-gradient-to-br from-leaf to-secondary text-ink'; ?> shadow-lg ring-8 ring-ink/40">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<h3 class="mt-7 text-xl font-extrabold"><?php echo esc_html( $step['title'] ); ?></h3>
						<p class="mt-3 text-[15px] leading-7 text-white/70"><?php echo esc_html( $step['text'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>

			<div class="mt-14 flex flex-col items-center justify-center gap-4 sm:flex-row" data-reveal>
				<a href="<?php echo esc_url( $home_contact['cta_url'] ); ?>" class="group inline-flex items-center gap-3 rounded-full bg-white py-3 pl-7 pr-3 text-[12px] font-extrabold uppercase tracking-[0.14em] text-primary shadow-xl transition duration-300 hover:-translate-y-0.5 hover:bg-mint">
					<?php esc_html_e( 'Start the conversation', 'amanahcareservices' ); ?>
					<span class="flex h-9 w-9 items-center justify-center rounded-full bg-secondary text-white transition-transform group-hover:translate-x-0.5"><i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></span>
				</a>
				<?php if ( $home_phone['label'] ) : ?>
					<a href="<?php echo esc_attr( $home_phone['uri'] ); ?>" class="inline-flex items-center gap-3 rounded-full border border-white/25 px-7 py-4 text-sm font-extrabold text-white transition hover:border-white hover:bg-white/10">
						<i class="fa-solid fa-phone text-leaf" aria-hidden="true"></i>
						<?php echo esc_html( $home_phone['label'] ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- =========================================================
	     Why choose us
	     ========================================================= -->
	<section class="relative isolate overflow-hidden bg-[#fbfafe] py-20 sm:py-24 lg:py-32" aria-labelledby="home-why-title">
		<span class="pointer-events-none absolute -right-40 top-10 -z-10 h-[28rem] w-[28rem] rounded-full bg-mint blur-3xl" aria-hidden="true"></span>
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
							<span class="pointer-events-none absolute -right-12 -top-12 h-40 w-40 rounded-full border-[28px] border-white/[0.07]" aria-hidden="true"></span>
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
							<span class="flex h-12 w-12 items-center justify-center rounded-2xl <?php echo in_array( $index, array( 0, 3, 4 ), true ) ? 'bg-soft text-primary' : 'bg-mint text-secondaryDark'; ?>">
								<i class="fa-solid <?php echo esc_attr( $reason['icon'] ); ?>" aria-hidden="true"></i>
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
	<section class="py-20 sm:py-24 lg:py-28" aria-labelledby="home-audience-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="amanah-audience relative overflow-hidden rounded-[2.5rem] px-6 py-14 sm:px-10 lg:px-16 lg:py-20" data-reveal>
				<span class="pointer-events-none absolute -right-24 -top-24 h-80 w-80 rounded-full border-[50px] border-primary/[0.06]" aria-hidden="true"></span>
				<div class="relative grid items-end gap-8 lg:grid-cols-2">
					<div>
						<p class="amanah-eyebrow"><?php esc_html_e( 'Who we support', 'amanahcareservices' ); ?></p>
						<h2 id="home-audience-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-[2.75rem]">
							<?php esc_html_e( 'Working together for', 'amanahcareservices' ); ?>
							<span class="text-primary"><?php esc_html_e( 'better outcomes.', 'amanahcareservices' ); ?></span>
						</h2>
					</div>
					<p class="text-base leading-7 text-body lg:justify-self-end lg:text-right">
						<?php esc_html_e( 'Referrals are welcome from participants, families, support coordinators, plan managers and health professionals.', 'amanahcareservices' ); ?>
					</p>
				</div>

				<div class="relative mt-12 grid gap-5 md:grid-cols-3">
					<?php foreach ( $home_audiences as $index => $audience ) : ?>
						<div class="rounded-[1.75rem] bg-white/90 p-7 shadow-[0_18px_40px_-20px_rgba(27,11,58,0.18)] backdrop-blur">
							<span class="flex h-14 w-14 items-center justify-center rounded-full <?php echo 1 === $index ? 'bg-secondary text-white' : 'bg-primary text-white'; ?> shadow-lg">
								<i class="fa-solid <?php echo esc_attr( $audience['icon'] ); ?> text-lg" aria-hidden="true"></i>
							</span>
							<h3 class="mt-6 text-lg font-extrabold text-ink"><?php echo esc_html( $audience['title'] ); ?></h3>
							<p class="mt-2 text-sm leading-7 text-body"><?php echo esc_html( $audience['text'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="relative mt-10 flex flex-wrap items-center gap-4">
					<a href="<?php echo esc_url( $home_contact['referral_url'] ); ?>" class="group inline-flex items-center gap-3 rounded-full bg-gradient-to-r from-primary to-primaryDark py-3 pl-7 pr-3 text-[12px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_16px_36px_rgba(81,31,159,0.3)] transition duration-300 hover:-translate-y-0.5">
						<?php esc_html_e( 'Make a Referral', 'amanahcareservices' ); ?>
						<span class="flex h-9 w-9 items-center justify-center rounded-full bg-secondary transition-transform group-hover:translate-x-0.5"><i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></span>
					</a>
					<a href="<?php echo esc_url( home_url( '/ndis/' ) ); ?>" class="inline-flex items-center gap-2 px-3 py-3 text-sm font-extrabold text-primary transition hover:text-secondaryDark">
						<?php esc_html_e( 'New to the NDIS? Start here', 'amanahcareservices' ); ?>
						<i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i>
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
	/* Hero */
	.amanah-hero {
		background:
			radial-gradient(circle at 85% 20%, rgba(155, 224, 143, 0.22), transparent 30%),
			radial-gradient(circle at 10% 10%, rgba(201, 182, 240, 0.45), transparent 35%),
			linear-gradient(180deg, #f8f5fe 0%, #ffffff 100%);
	}

	.amanah-hero-art {
		position: absolute;
		z-index: -1;
		inset: 0;
		overflow: hidden;
		pointer-events: none;
	}

	.amanah-hero-art>* {
		position: absolute;
		display: block;
	}

	.amanah-hero-art__glow {
		border-radius: 9999px;
		filter: blur(90px);
	}

	.amanah-hero-art__glow--purple {
		top: -8rem;
		right: 25%;
		width: 26rem;
		height: 26rem;
		background: rgba(124, 77, 206, 0.14);
	}

	.amanah-hero-art__glow--green {
		bottom: 0;
		left: -6rem;
		width: 20rem;
		height: 20rem;
		background: rgba(46, 162, 42, 0.09);
	}

	.amanah-hero-art__grid {
		inset: 0;
		background-image:
			linear-gradient(rgba(81, 31, 159, 0.05) 1px, transparent 1px),
			linear-gradient(90deg, rgba(81, 31, 159, 0.05) 1px, transparent 1px);
		background-size: 3.5rem 3.5rem;
		-webkit-mask-image: radial-gradient(ellipse at 30% 40%, #000 10%, transparent 65%);
		mask-image: radial-gradient(ellipse at 30% 40%, #000 10%, transparent 65%);
	}

	.amanah-hero-art__heart {
		bottom: 3rem;
		left: 44%;
		width: 9rem;
		stroke: rgba(46, 162, 42, 0.18);
		stroke-width: 2;
		stroke-dasharray: 6 8;
		transform: rotate(-12deg);
	}

	.amanah-hero-visual {
		background:
			radial-gradient(circle at 50% 42%, rgba(155, 224, 143, 0.35), transparent 45%),
			linear-gradient(160deg, #6a2fc4 0%, #511f9f 45%, #2a0f5a 100%);
	}

	.amanah-hero-visual__ring {
		position: absolute;
		top: 44%;
		left: 50%;
		border: 1px solid rgba(255, 255, 255, 0.14);
		border-radius: 9999px;
		transform: translate(-50%, -50%);
	}

	.amanah-hero-visual__ring--one {
		width: 78%;
		aspect-ratio: 1;
	}

	.amanah-hero-visual__ring--two {
		width: 98%;
		aspect-ratio: 1;
		border-style: dashed;
		border-color: rgba(155, 224, 143, 0.3);
		animation: amanahSpin 60s linear infinite;
	}

	.amanah-hero-visual__ring--three {
		width: 125%;
		aspect-ratio: 1;
		border-color: rgba(255, 255, 255, 0.08);
	}

	.amanah-hero-visual .rounded-full.bg-white {
		margin-top: -8%;
	}

	@keyframes amanahSpin {
		to {
			transform: translate(-50%, -50%) rotate(360deg);
		}
	}

	/* About */
	.amanah-meaning-card {
		background:
			radial-gradient(circle at 90% 100%, rgba(46, 162, 42, 0.35), transparent 40%),
			linear-gradient(155deg, #3a1575 0%, #1b0b3a 100%);
	}

	/* Services */
	.amanah-services {
		background:
			radial-gradient(circle at 0% 0%, rgba(201, 182, 240, 0.3), transparent 30%),
			radial-gradient(circle at 100% 100%, rgba(155, 224, 143, 0.2), transparent 30%),
			#fdfcff;
	}

	.amanah-service-card>* {
		position: relative;
		z-index: 1;
	}

	.amanah-service-card .amanah-service-card__bg {
		position: absolute;
		z-index: 0;
		background:
			radial-gradient(circle at 100% 0%, rgba(155, 224, 143, 0.35), transparent 45%),
			linear-gradient(150deg, #5d27b0 0%, #3a1575 60%, #1b0b3a 100%);
	}

	/* Process */
	.amanah-process {
		background:
			radial-gradient(circle at 15% 10%, rgba(123, 77, 209, 0.45), transparent 35%),
			radial-gradient(circle at 90% 90%, rgba(46, 162, 42, 0.2), transparent 30%),
			linear-gradient(160deg, #2a0f5a 0%, #1b0b3a 70%);
	}

	.amanah-process-art {
		position: absolute;
		z-index: -1;
		inset: 0;
		overflow: hidden;
		pointer-events: none;
	}

	.amanah-process-art>span {
		position: absolute;
		display: block;
	}

	.amanah-process-art__ring {
		border: 1px solid rgba(201, 182, 240, 0.12);
		border-radius: 50%;
	}

	.amanah-process-art__ring--one {
		top: -20rem;
		right: -14rem;
		width: 46rem;
		height: 40rem;
		transform: rotate(-14deg);
	}

	.amanah-process-art__ring--two {
		bottom: -22rem;
		left: -14rem;
		width: 44rem;
		height: 36rem;
		border-color: rgba(155, 224, 143, 0.1);
	}

	.amanah-process-art__dots {
		top: 3rem;
		left: 3rem;
		width: 10rem;
		height: 10rem;
		opacity: 0.25;
		background-image: radial-gradient(circle, #c9b6f0 1.4px, transparent 1.7px);
		background-size: 1.3rem 1.3rem;
		-webkit-mask-image: linear-gradient(135deg, #000, transparent 80%);
		mask-image: linear-gradient(135deg, #000, transparent 80%);
	}

	/* Audience */
	.amanah-audience {
		background:
			radial-gradient(circle at 100% 100%, rgba(155, 224, 143, 0.35), transparent 40%),
			linear-gradient(135deg, #f3edfd 0%, #eef8ec 100%);
	}

	@media (prefers-reduced-motion: reduce) {

		.amanah-float,
		.amanah-float-slow,
		.amanah-hero-visual__ring--two {
			animation: none;
		}
	}
</style>

<?php
get_footer();
