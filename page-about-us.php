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
	'Listen to you and put your goals at the centre of your support',
	'Match you with caring workers who suit your needs and personality',
	'Keep your information private and your home respected',
	'Communicate clearly, on time and in plain language',
	'Respect your culture, faith, language and family values',
	'Review your support regularly and adapt as life changes',
	'Welcome your feedback and act on it quickly and fairly',
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
		<span class="pointer-events-none absolute -right-40 top-10 -z-10 h-[28rem] w-[28rem] rounded-full bg-soft blur-3xl" aria-hidden="true"></span>
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid items-center gap-16 lg:grid-cols-12 lg:gap-12 xl:gap-20">
				<div class="lg:col-span-7" data-reveal>
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

				<div class="relative lg:col-span-5" data-reveal>
					<span class="absolute -left-4 -top-4 h-28 w-28 rounded-[2rem] bg-secondary/15" aria-hidden="true"></span>
					<?php if ( $about_image_id ) : ?>
						<div class="relative overflow-hidden rounded-[2rem_2rem_6rem_2rem] shadow-[0_35px_80px_-25px_rgba(27,11,58,0.4)]">
							<?php echo wp_get_attachment_image( $about_image_id, 'large', false, array( 'class' => 'h-[480px] w-full object-cover', 'loading' => 'lazy' ) ); ?>
						</div>
					<?php else : ?>
						<div class="amanah-dark-card relative overflow-hidden rounded-[2rem_2rem_6rem_2rem] p-9 text-white shadow-[0_35px_80px_-25px_rgba(27,11,58,0.55)] sm:p-12">
							<p class="text-[11px] font-extrabold uppercase tracking-[0.24em] text-leaf"><?php esc_html_e( 'The meaning behind our name', 'amanahcareservices' ); ?></p>
							<p class="mt-8 font-display text-6xl leading-none sm:text-7xl" lang="ar" dir="rtl">أمانة</p>
							<p class="mt-6 font-display text-4xl tracking-wide sm:text-5xl"><?php esc_html_e( 'Amanah', 'amanahcareservices' ); ?></p>
							<p class="mt-6 border-t border-white/15 pt-6 text-[15px] leading-7 text-white/80"><?php esc_html_e( 'Trust placed in someone’s care, and the honesty and faithfulness to honour it.', 'amanahcareservices' ); ?></p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Mission & vision -->
	<section class="bg-[#fbfafe] py-20 sm:py-24" aria-label="<?php esc_attr_e( 'Mission and vision', 'amanahcareservices' ); ?>">
		<div class="container mx-auto grid gap-6 px-5 md:grid-cols-2 md:px-8 lg:px-12">
			<div class="group relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-primary to-primaryDark p-9 text-white shadow-[0_30px_60px_-25px_rgba(81,31,159,0.6)] sm:p-11" data-reveal>
				<span class="pointer-events-none absolute -right-12 -top-12 h-44 w-44 rounded-full border-[30px] border-white/[0.07]" aria-hidden="true"></span>
				<span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-leaf"><i class="fa-solid fa-bullseye text-xl" aria-hidden="true"></i></span>
				<h2 class="mt-7 text-2xl font-extrabold sm:text-3xl"><?php esc_html_e( 'Our mission', 'amanahcareservices' ); ?></h2>
				<p class="mt-4 text-lg leading-8 text-white/80"><?php esc_html_e( 'To deliver safe, respectful and person-centred support that helps people live with independence, dignity and confidence, and to be a provider families can trust completely.', 'amanahcareservices' ); ?></p>
			</div>
			<div class="group relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-secondary to-secondaryDark p-9 text-white shadow-[0_30px_60px_-25px_rgba(30,122,27,0.6)] sm:p-11" data-reveal>
				<span class="pointer-events-none absolute -right-12 -top-12 h-44 w-44 rounded-full border-[30px] border-white/[0.08]" aria-hidden="true"></span>
				<span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 text-white"><i class="fa-solid fa-eye text-xl" aria-hidden="true"></i></span>
				<h2 class="mt-7 text-2xl font-extrabold sm:text-3xl"><?php esc_html_e( 'Our vision', 'amanahcareservices' ); ?></h2>
				<p class="mt-4 text-lg leading-8 text-white/90"><?php esc_html_e( 'A community where every person, whatever their ability or background, is supported to live the life they choose, surrounded by people who genuinely care.', 'amanahcareservices' ); ?></p>
			</div>
		</div>
	</section>

	<!-- Values -->
	<section class="py-20 sm:py-24 lg:py-28" aria-labelledby="about-values-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="mx-auto max-w-3xl text-center" data-reveal>
				<p class="amanah-eyebrow justify-center"><?php esc_html_e( 'Our values', 'amanahcareservices' ); ?></p>
				<h2 id="about-values-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl"><?php esc_html_e( 'What guides everything we do.', 'amanahcareservices' ); ?></h2>
			</div>
			<div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
				<?php foreach ( $about_values as $index => $value ) : ?>
					<div class="group relative overflow-hidden rounded-[1.75rem] border border-[#ece6f6] bg-white p-8 transition duration-300 hover:-translate-y-1 hover:shadow-[0_24px_50px_-20px_rgba(27,11,58,0.2)]" data-reveal>
						<span class="absolute inset-x-0 top-0 h-1 origin-left scale-x-0 bg-gradient-to-r from-primary to-secondary transition-transform duration-500 group-hover:scale-x-100" aria-hidden="true"></span>
						<div class="flex items-center justify-between">
							<span class="flex h-14 w-14 items-center justify-center rounded-2xl <?php echo 0 === $index % 2 ? 'bg-soft text-primary' : 'bg-mint text-secondaryDark'; ?>"><i class="fa-solid <?php echo esc_attr( $value['icon'] ); ?> text-xl" aria-hidden="true"></i></span>
							<span class="font-display text-2xl text-[#d9cff0]"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						</div>
						<h3 class="mt-7 text-xl font-extrabold text-ink"><?php echo esc_html( $value['title'] ); ?></h3>
						<p class="mt-3 leading-7 text-body"><?php echo esc_html( $value['text'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Promise -->
	<section class="amanah-dark-section relative isolate overflow-hidden py-20 text-white sm:py-24 lg:py-28" aria-labelledby="about-promise-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid gap-14 lg:grid-cols-12 lg:gap-16">
				<div class="lg:col-span-5" data-reveal>
					<p class="amanah-eyebrow amanah-eyebrow--light"><?php esc_html_e( 'Our promise to you', 'amanahcareservices' ); ?></p>
					<h2 id="about-promise-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] md:text-5xl">
						<?php esc_html_e( 'What you can', 'amanahcareservices' ); ?>
						<span class="text-leaf"><?php esc_html_e( 'always expect.', 'amanahcareservices' ); ?></span>
					</h2>
					<p class="mt-6 text-lg leading-8 text-white/70"><?php esc_html_e( 'Trust is earned in the everyday. These are the standards we hold ourselves to, in every visit and every conversation.', 'amanahcareservices' ); ?></p>
					<a href="<?php echo esc_url( $about_contact['cta_url'] ); ?>" class="group mt-9 inline-flex items-center gap-3 rounded-full bg-white py-3 pl-7 pr-3 text-[12px] font-extrabold uppercase tracking-[0.14em] text-primary shadow-xl transition hover:-translate-y-0.5 hover:bg-mint">
						<?php esc_html_e( 'Talk to our team', 'amanahcareservices' ); ?>
						<span class="flex h-9 w-9 items-center justify-center rounded-full bg-secondary text-white transition-transform group-hover:translate-x-0.5"><i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></span>
					</a>
				</div>
				<ul class="grid gap-4 lg:col-span-7" data-reveal>
					<?php foreach ( $about_promises as $promise ) : ?>
						<li class="flex items-start gap-4 rounded-2xl border border-white/10 bg-white/[0.05] p-5 backdrop-blur transition hover:border-leaf/40 hover:bg-white/[0.08]">
							<span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-secondary text-white"><i class="fa-solid fa-check text-xs" aria-hidden="true"></i></span>
							<span class="pt-0.5 text-[15px] font-semibold leading-7 text-white/90"><?php echo esc_html( $promise ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/content', 'page-extra' ); ?>
</main>

<?php
get_footer();
