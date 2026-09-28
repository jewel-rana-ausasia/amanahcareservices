<?php
/**
 * Template Name: About Us
 *
 * @package amanahcareservices
 */

get_header();

$about_contact  = amanahcareservices_get_contact();
$about_image_id = absint( get_theme_mod( 'amanahcareservices_about_image', 0 ) );

$about_values = array(
	array( 'icon' => 'fa-handshake-simple', 'title' => 'Trust', 'text' => 'We keep our word, protect your privacy and treat your home and life with care.' ),
	array( 'icon' => 'fa-hands-holding-child', 'title' => 'Dignity', 'text' => 'Every person deserves to be treated with respect, patience and kindness.' ),
	array( 'icon' => 'fa-scale-balanced', 'title' => 'Integrity', 'text' => 'Honest communication, fair practices and doing the right thing, even when no one is watching.' ),
	array( 'icon' => 'fa-compass', 'title' => 'Choice & control', 'text' => 'You decide what support looks like. We listen, advise and follow your lead.' ),
	array( 'icon' => 'fa-earth-oceania', 'title' => 'Inclusion', 'text' => 'We welcome and respect people of every culture, faith, language and background.' ),
	array( 'icon' => 'fa-seedling', 'title' => 'Growth', 'text' => 'We celebrate progress and help you build confidence, skills and independence.' ),
);

$about_promises = array(
	array( 'icon' => 'fa-ear-listen', 'title' => 'We listen first', 'text' => 'Your goals sit at the centre of your support, and your voice guides every decision.' ),
	array( 'icon' => 'fa-people-arrows', 'title' => 'The right match', 'text' => 'Caring workers who suit your needs, interests and personality.' ),
	array( 'icon' => 'fa-user-shield', 'title' => 'Privacy & respect', 'text' => 'Your information stays private and your home is always respected.' ),
	array( 'icon' => 'fa-hands-praying', 'title' => 'Culture & faith', 'text' => 'We honour your culture, faith, language and family values.' ),
);
$about_phone = amanahcareservices_get_primary_phone();

$about_socials = amanahcareservices_get_social_links();

$about_faqs = array(
	array(
		'question' => 'What does “Amanah” mean?',
		'answer'   => 'In Arabic, “Amanah” means trust, honesty and a responsibility held with care. It is the promise behind everything we do, from the first conversation to every visit.',
	),
	array(
		'question' => 'Who do you support?',
		'answer'   => 'We provide disability and community support for NDIS participants, and we work closely with their families, carers and support coordinators so everyone feels informed and involved.',
	),
	array(
		'question' => 'How do you match me with a support worker?',
		'answer'   => 'We take time to understand your needs, interests and personality, then match you with caring workers who suit you. We aim to keep the same familiar faces with you over time.',
	),
	array(
		'question' => 'What makes your support different?',
		'answer'   => 'Your support is shaped around you, not the paperwork. We listen first, communicate in plain language and respect your culture, faith, language and family values.',
	),
	array(
		'question' => 'How can I give feedback about my support?',
		'answer'   => 'You can call, email or message us at any time. We welcome all feedback, positive or negative, and we act on it quickly and fairly.',
	),
);
?>

<main id="primary" class="site-main overflow-hidden bg-white">
	<?php
	get_template_part(
		'template-parts/content',
		'banner',
		array(
			'eyebrow'     => __( 'About Us', 'amanahcareservices' ),
			'title'       => __( 'Care built on trust, delivered with heart.', 'amanahcareservices' ),
			'description' => __( 'Get to know the people, values and promise behind Amanah Care Services.', 'amanahcareservices' ),
		)
	);
	?>

	<!-- Story -->
	<section class="relative isolate py-20 sm:py-24 lg:py-28" aria-labelledby="about-story-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid items-center gap-16 lg:grid-cols-12 lg:gap-12 xl:gap-20">
				<div class="lg:col-span-6" data-reveal>
					<p class="amanah-eyebrow"><?php esc_html_e( 'Who we are', 'amanahcareservices' ); ?></p>
					<h2 id="about-story-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl">
						<?php esc_html_e( 'Support that feels personal,', 'amanahcareservices' ); ?>
						<span class="text-primary"><?php esc_html_e( 'because it is.', 'amanahcareservices' ); ?></span>
					</h2>
					<div class="mt-7 space-y-5 text-lg leading-8 text-body">
						<p><?php esc_html_e( 'Amanah Care Services was founded on a simple belief: everyone deserves care they can truly trust. In Arabic, “Amanah” means trust, honesty and a responsibility held with care. It is more than our name. It is the promise we make every time we walk through your door.', 'amanahcareservices' ); ?></p>
						<p><?php esc_html_e( 'We provide disability and community support that is shaped around the person, not the paperwork. Whether you need a little help around the house, support to get out into the community, or daily assistance to live independently, we take the time to understand what matters to you.', 'amanahcareservices' ); ?></p>
						<p><?php esc_html_e( 'Our team brings warmth, patience and consistency to every visit, and we work closely with families, carers and support coordinators so everyone feels informed and involved.', 'amanahcareservices' ); ?></p>
					</div>

					<?php if ( $about_contact['ndis_number'] ) : ?>
						<p class="mt-8 inline-flex items-center gap-3 rounded-2xl border border-secondary/25 bg-mint px-5 py-3 text-sm font-bold text-ink">
							<i class="fa-solid fa-shield-heart text-xl text-secondary" aria-hidden="true"></i>
							<span>
								<?php esc_html_e( 'Registered NDIS Provider', 'amanahcareservices' ); ?>
								<span class="block text-xs font-semibold text-body"><?php echo esc_html( sprintf( /* translators: %s: NDIS registration number. */ __( 'Registration No. %s', 'amanahcareservices' ), $about_contact['ndis_number'] ) ); ?></span>
							</span>
						</p>
					<?php endif; ?>
				</div>

				<div class="relative lg:col-span-6" data-reveal>
					<?php
					$about_image_class = 'h-[420px] w-full object-cover transition duration-700 group-hover:scale-[1.04] sm:h-[540px]';
					?>
					<div class="relative mx-auto max-w-lg lg:max-w-none">
						<!-- Decorative frame -->
						<span class="absolute -right-4 -top-4 bottom-10 left-10 rounded-[2rem] border-2 border-dashed border-primary/20" aria-hidden="true"></span>

						<!-- Photo -->
						<figure class="group relative overflow-hidden rounded-[2rem] shadow-[0_35px_80px_-25px_rgba(27,11,58,0.45)]">
							<?php
							if ( $about_image_id ) {
								echo wp_get_attachment_image( $about_image_id, 'large', false, array( 'class' => $about_image_class . ' object-center', 'loading' => 'lazy' ) );
							} else {
								// About page photo first, then the shared homepage About photo, then the hero.
								$about_image_file = 'hero/amanah-hero-bg.jpg';
								foreach ( array( 'about/amanah-about-page.jpg', 'about/amanah-about.jpg' ) as $about_candidate ) {
									if ( file_exists( get_template_directory() . '/assets/images/' . $about_candidate ) ) {
										$about_image_file = $about_candidate;
										break;
									}
								}
								$about_image_size = getimagesize( get_template_directory() . '/assets/images/' . $about_image_file );
								printf(
									'<img src="%1$s" alt="%2$s" class="%3$s" loading="lazy" width="%4$d" height="%5$d">',
									esc_url( get_template_directory_uri() . '/assets/images/' . $about_image_file ),
									esc_attr__( 'An Amanah Care Services support worker walking through a local park with a participant and his daughter', 'amanahcareservices' ),
									esc_attr( $about_image_class . ( 'hero/amanah-hero-bg.jpg' === $about_image_file ? ' object-[72%_center]' : ' object-center' ) ),
									$about_image_size ? (int) $about_image_size[0] : 1200,
									$about_image_size ? (int) $about_image_size[1] : 1000
								);
							}
							?>
							<span class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ink/20 via-transparent to-transparent" aria-hidden="true"></span>
						</figure>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Mission & vision -->
	<section class="relative border-y border-[#efeaf7] bg-[#fbfafe] py-20 sm:py-24" aria-label="<?php esc_attr_e( 'Mission and vision', 'amanahcareservices' ); ?>">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid gap-6 md:grid-cols-2 lg:gap-8">
				<?php
				$about_purpose = array(
					array(
						'label' => __( 'Our mission', 'amanahcareservices' ),
						'icon'  => 'fa-bullseye',
						'tone'  => 'primary',
						'text'  => __( 'To deliver safe, respectful and person-centred support that helps people live with independence, dignity and confidence, and to be a provider families can trust completely.', 'amanahcareservices' ),
					),
					array(
						'label' => __( 'Our vision', 'amanahcareservices' ),
						'icon'  => 'fa-eye',
						'tone'  => 'secondary',
						'text'  => __( 'A community where every person, whatever their ability or background, is supported to live the life they choose, surrounded by people who genuinely care.', 'amanahcareservices' ),
					),
				);

				foreach ( $about_purpose as $index => $purpose ) :
					$is_primary = 'primary' === $purpose['tone'];
					?>
					<article class="group relative isolate flex flex-col overflow-hidden rounded-[2rem] p-8 text-white ring-1 ring-inset ring-white/10 transition duration-500 hover:-translate-y-1.5 sm:p-11 <?php echo $is_primary ? 'bg-gradient-to-br from-[#6a2cc4] via-primary to-primaryDark shadow-[0_35px_70px_-30px_rgba(81,31,159,0.75)] hover:shadow-[0_45px_90px_-30px_rgba(81,31,159,0.85)]' : 'bg-gradient-to-br from-[#3cb737] via-secondary to-secondaryDark shadow-[0_35px_70px_-30px_rgba(30,122,27,0.7)] hover:shadow-[0_45px_90px_-30px_rgba(30,122,27,0.8)]'; ?>" data-reveal>
						<!-- Soft light wash and oversized watermark icon -->
						<span class="pointer-events-none absolute inset-0 -z-10 bg-[radial-gradient(120%_80%_at_0%_0%,rgba(255,255,255,0.16),transparent_55%)]" aria-hidden="true"></span>
						<i class="fa-solid <?php echo esc_attr( $purpose['icon'] ); ?> pointer-events-none absolute -bottom-8 -right-6 -z-10 text-[11rem] leading-none text-white/[0.07] transition duration-700 group-hover:-rotate-6 group-hover:scale-105" aria-hidden="true"></i>

						<div class="flex items-center justify-between">
							<span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 text-white ring-1 ring-inset ring-white/25 backdrop-blur">
								<i class="fa-solid <?php echo esc_attr( $purpose['icon'] ); ?> text-xl" aria-hidden="true"></i>
							</span>
							<span class="font-display text-4xl text-white/25"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						</div>

						<h2 class="mt-9 inline-flex items-center gap-3 text-xs font-extrabold uppercase tracking-[0.26em] <?php echo $is_primary ? 'text-leaf' : 'text-white'; ?>">
							<span class="h-px w-8 <?php echo $is_primary ? 'bg-leaf' : 'bg-white/70'; ?>" aria-hidden="true"></span>
							<?php echo esc_html( $purpose['label'] ); ?>
						</h2>
						<p class="mt-5 max-w-xl text-xl font-semibold leading-[1.65] tracking-[-0.01em] text-white sm:text-[1.4rem]"><?php echo esc_html( $purpose['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Values -->
	<section class="py-20 sm:py-24 lg:py-28" aria-labelledby="about-values-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid items-end gap-6 lg:grid-cols-12" data-reveal>
				<div class="lg:col-span-7">
					<p class="amanah-eyebrow"><?php esc_html_e( 'Our values', 'amanahcareservices' ); ?></p>
					<h2 id="about-values-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl"><?php esc_html_e( 'What guides everything we do.', 'amanahcareservices' ); ?></h2>
				</div>
				<p class="text-lg leading-8 text-body lg:col-span-5"><?php esc_html_e( 'Six values shape every visit, every conversation and every decision we make with you.', 'amanahcareservices' ); ?></p>
			</div>

			<div class="mt-14 overflow-hidden rounded-[2rem] border border-[#ece6f6] bg-[#ece6f6] shadow-[0_30px_70px_-40px_rgba(27,11,58,0.3)]" data-reveal>
				<ul class="grid gap-px sm:grid-cols-2 lg:grid-cols-3" role="list">
					<?php foreach ( $about_values as $index => $value ) : ?>
						<li class="group relative bg-white p-8 transition duration-300 hover:bg-soft/60 sm:p-10">
							<div class="flex items-start justify-between">
								<span class="flex h-14 w-14 items-center justify-center rounded-2xl border border-[#e6ddf6] bg-white text-primary transition duration-300 group-hover:border-transparent group-hover:bg-primary group-hover:text-white group-hover:shadow-lg group-hover:shadow-primary/25">
									<i class="fa-solid <?php echo esc_attr( $value['icon'] ); ?> text-xl" aria-hidden="true"></i>
								</span>
								<span class="text-xs font-extrabold tracking-[0.2em] text-[#b9acd3]"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
							</div>
							<h3 class="mt-8 text-xl font-extrabold text-ink"><?php echo esc_html( $value['title'] ); ?></h3>
							<p class="mt-3 leading-7 text-body"><?php echo esc_html( $value['text'] ); ?></p>
							<span class="absolute bottom-0 left-8 right-8 h-[2px] origin-left scale-x-0 bg-gradient-to-r from-primary to-secondary transition-transform duration-500 group-hover:scale-x-100 sm:left-10 sm:right-10" aria-hidden="true"></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<!-- Promise -->
	<section class="amanah-dark-section relative isolate overflow-hidden py-20 text-white sm:py-24 lg:py-28" aria-labelledby="about-promise-title">
		<!-- Soft glow -->
		<span class="pointer-events-none absolute -right-40 top-1/3 -z-10 h-[28rem] w-[28rem] rounded-full bg-secondary/20 blur-[120px]" aria-hidden="true"></span>

		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid gap-14 lg:grid-cols-12 lg:gap-12 xl:gap-16">
				<!-- Intro -->
				<div class="lg:col-span-5" data-reveal>
					<p class="amanah-eyebrow amanah-eyebrow--light !text-secondary"><?php esc_html_e( 'Our promise to you', 'amanahcareservices' ); ?></p>
					<h2 id="about-promise-title" class="mt-5 text-3xl font-extrabold leading-[1.1] tracking-[-0.035em] md:text-5xl">
						<?php esc_html_e( 'What you can', 'amanahcareservices' ); ?>
						<span class="text-secondary"><?php esc_html_e( 'always expect.', 'amanahcareservices' ); ?></span>
					</h2>
					<p class="mt-6 text-lg leading-8 text-white/70"><?php esc_html_e( 'Trust is earned in the everyday. These are the standards we hold ourselves to, in every visit and every conversation.', 'amanahcareservices' ); ?></p>

					<!-- Amanah seal card -->
					<figure class="relative mt-10 overflow-hidden rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.10] to-white/[0.02] p-7 shadow-[0_30px_60px_-30px_rgba(0,0,0,0.6)] backdrop-blur-md sm:p-8">
						<span class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-primary/40 blur-3xl" aria-hidden="true"></span>
						<div class="relative flex items-center gap-4">
							<span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-secondary to-secondaryDark text-xl text-white shadow-[0_15px_30px_-10px_rgba(46,162,42,0.7)] ring-1 ring-inset ring-white/20">
								<i class="fa-solid fa-shield-heart" aria-hidden="true"></i>
							</span>
							<div>
								<p class="text-[11px] font-extrabold uppercase tracking-[0.22em] text-secondary"><?php esc_html_e( 'Amanah', 'amanahcareservices' ); ?> <span lang="ar" class="ml-1 font-semibold tracking-normal text-white/60">أمانة</span></p>
								<p class="mt-1 text-lg font-extrabold leading-snug text-white"><?php esc_html_e( 'A trust, held with care.', 'amanahcareservices' ); ?></p>
							</div>
						</div>
						<blockquote class="relative mt-6 border-l-2 border-secondary pl-5 text-[15px] leading-7 text-white/75">
							<?php esc_html_e( 'Our name is our promise. Every visit, every conversation and every decision is guided by the trust you place in us.', 'amanahcareservices' ); ?>
						</blockquote>
					</figure>

					<div class="mt-9 flex flex-col gap-4 sm:flex-row sm:items-center">
						<a href="<?php echo esc_url( $about_contact['cta_url'] ); ?>"
							class="group relative inline-flex min-h-[50px] items-center justify-center overflow-hidden rounded-md bg-white px-7 text-[11px] font-extrabold uppercase tracking-[0.14em] text-primary shadow-[0_14px_32px_rgba(0,0,0,.25)] transition duration-300 hover:-translate-y-0.5 hover:bg-soft">
							<span><?php esc_html_e( 'Talk to our team', 'amanahcareservices' ); ?></span>
							<span class="ml-3 flex items-center">
								<i class="fa-solid fa-arrow-right text-[12px] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
							</span>
							<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
						</a>
						<?php if ( $about_phone['label'] ) : ?>
							<a href="<?php echo esc_attr( $about_phone['uri'] ); ?>"
								class="group relative inline-flex min-h-[50px] items-center justify-center gap-3 overflow-hidden rounded-md border border-white/25 px-7 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white transition duration-300 hover:-translate-y-0.5 hover:border-white/50 hover:bg-white/10">
								<i class="fa-solid fa-phone text-[12px] text-secondary" aria-hidden="true"></i>
								<span><?php echo esc_html( $about_phone['label'] ); ?></span>
								<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
							</a>
						<?php endif; ?>
					</div>
				</div>

				<!-- Promise cards -->
				<ol class="grid gap-5 self-center sm:grid-cols-2 lg:col-span-7" data-reveal>
					<?php foreach ( $about_promises as $promise ) : ?>
						<li class="group relative isolate overflow-hidden rounded-[1.5rem] border border-white/10 bg-white/[0.04] p-8 backdrop-blur-sm transition duration-500 hover:-translate-y-1 hover:border-secondary/50 hover:bg-white/[0.07] hover:shadow-[0_30px_60px_-30px_rgba(0,0,0,0.7)]">

							<span class="relative flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#7b4dd1] to-primaryDark text-lg text-secondary shadow-[0_12px_25px_-10px_rgba(0,0,0,0.6)] ring-1 ring-inset ring-white/15 transition duration-500 group-hover:from-secondary group-hover:to-secondaryDark group-hover:text-white">
								<i class="fa-solid <?php echo esc_attr( $promise['icon'] ); ?>" aria-hidden="true"></i>
							</span>
							<div class="relative mt-7">
								<h3 class="text-lg font-extrabold tracking-[-0.01em] text-white"><?php echo esc_html( $promise['title'] ); ?></h3>
								<p class="mt-2 text-[15px] leading-7 text-white/65"><?php echo esc_html( $promise['text'] ); ?></p>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</section>

	<!-- FAQ -->
	<section class="relative isolate overflow-hidden bg-[#fbfafe] py-20 sm:py-24 lg:py-28" aria-labelledby="about-faq-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
				<div class="lg:col-span-4" data-reveal>
					<p class="amanah-eyebrow"><?php esc_html_e( 'Helpful answers', 'amanahcareservices' ); ?></p>
					<h2 id="about-faq-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl"><?php esc_html_e( 'Questions are always welcome.', 'amanahcareservices' ); ?></h2>
					<p class="mt-6 leading-7 text-body"><?php esc_html_e( 'Can’t find what you’re looking for? Reach out and we’ll give you a straightforward answer.', 'amanahcareservices' ); ?></p>
					<a href="<?php echo esc_url( $about_contact['cta_url'] ); ?>" class="group mt-7 inline-flex items-center gap-3 text-sm font-extrabold text-primary">
						<?php esc_html_e( 'Ask us anything', 'amanahcareservices' ); ?>
						<span class="flex h-10 w-10 items-center justify-center rounded-full bg-soft transition group-hover:translate-x-1 group-hover:bg-primary group-hover:text-white"><i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></span>
					</a>

					<?php if ( $about_socials ) : ?>
						<div class="mt-10 border-t border-[#ece6f6] pt-7">
							<p class="text-[11px] font-extrabold uppercase tracking-[0.2em] text-body"><?php esc_html_e( 'Follow our journey', 'amanahcareservices' ); ?></p>
							<div class="mt-4 flex flex-wrap gap-2.5">
								<?php foreach ( $about_socials as $social ) : ?>
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
					<?php foreach ( $about_faqs as $index => $faq ) : ?>
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

	<?php get_template_part( 'template-parts/content', 'page-extra' ); ?>
</main>

<?php
get_footer();
