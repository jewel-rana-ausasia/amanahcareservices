<?php
/**
 * Template Name: Services
 *
 * All services on one page, each with its own anchor (/services/#slug).
 *
 * @package amanahcareservices
 */

get_header();

$services_contact = amanahcareservices_get_contact();
$services_phone   = amanahcareservices_get_primary_phone();
$services_list    = array_values( amanahcareservices_get_services() );
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

	<!-- Intro + quick links -->
	<section class="py-16 sm:py-20" aria-labelledby="services-intro-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid items-end gap-8 lg:grid-cols-2" data-reveal>
				<div>
					<p class="amanah-eyebrow"><?php esc_html_e( 'How we can help', 'amanahcareservices' ); ?></p>
					<h2 id="services-intro-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl">
						<?php esc_html_e( 'Choose the support', 'amanahcareservices' ); ?>
						<span class="text-primary"><?php esc_html_e( 'that fits your life.', 'amanahcareservices' ); ?></span>
					</h2>
				</div>
				<p class="text-lg leading-8 text-body"><?php esc_html_e( 'Every service is tailored to you. Tell us your goals and routines and we’ll build a support plan around them, with familiar, caring workers you can trust.', 'amanahcareservices' ); ?></p>
			</div>

			<nav class="mt-12 flex flex-wrap gap-3" aria-label="<?php esc_attr_e( 'Jump to a service', 'amanahcareservices' ); ?>" data-reveal>
				<?php foreach ( $services_list as $index => $service ) : ?>
					<a href="#<?php echo esc_attr( $service['slug'] ); ?>" class="group inline-flex items-center gap-2.5 rounded-full border border-[#e6def5] bg-white py-2 pl-2 pr-5 text-sm font-bold text-ink shadow-sm transition hover:-translate-y-0.5 hover:border-primary hover:text-primary hover:shadow-md">
						<span class="flex h-8 w-8 items-center justify-center rounded-full <?php echo 1 === $index % 2 ? 'bg-mint text-secondaryDark' : 'bg-soft text-primary'; ?> transition group-hover:bg-primary group-hover:text-white">
							<i class="fa-solid <?php echo esc_attr( $service['icon'] ); ?> text-xs" aria-hidden="true"></i>
						</span>
						<?php echo esc_html( $service['title'] ); ?>
					</a>
				<?php endforeach; ?>
			</nav>
		</div>
	</section>

	<!-- Service detail blocks -->
	<section class="bg-[#fbfafe] py-16 sm:py-20 lg:py-24" aria-label="<?php esc_attr_e( 'Service details', 'amanahcareservices' ); ?>">
		<div class="container mx-auto space-y-8 px-5 md:px-8 lg:space-y-10 lg:px-12">
			<?php foreach ( $services_list as $index => $service ) : ?>
				<?php $is_green = 1 === $index % 2; ?>
				<article id="<?php echo esc_attr( $service['slug'] ); ?>" class="group grid overflow-hidden rounded-[2rem] border border-[#ece6f6] bg-white shadow-[0_20px_50px_-30px_rgba(27,11,58,0.25)] transition duration-300 hover:shadow-[0_30px_70px_-30px_rgba(81,31,159,0.35)] lg:grid-cols-12" aria-labelledby="<?php echo esc_attr( $service['slug'] ); ?>-title" data-reveal>
					<div class="relative flex flex-col justify-between overflow-hidden p-8 text-white sm:p-10 lg:col-span-4 <?php echo $is_green ? 'bg-gradient-to-br from-secondary to-secondaryDark lg:order-2' : 'amanah-dark-card'; ?>">
						<span class="pointer-events-none absolute -bottom-16 -right-16 h-48 w-48 rounded-full border-[32px] border-white/[0.08]" aria-hidden="true"></span>
						<div class="flex items-start justify-between">
							<span class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/15 backdrop-blur transition duration-500 group-hover:rotate-3 group-hover:scale-110">
								<i class="fa-solid <?php echo esc_attr( $service['icon'] ); ?> text-2xl" aria-hidden="true"></i>
							</span>
							<span class="font-display text-5xl text-white/25"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						</div>
						<h2 id="<?php echo esc_attr( $service['slug'] ); ?>-title" class="relative mt-12 text-2xl font-extrabold leading-tight sm:text-3xl"><?php echo esc_html( $service['title'] ); ?></h2>
					</div>

					<div class="p-8 sm:p-10 lg:col-span-8 lg:p-12 <?php echo $is_green ? 'lg:order-1' : ''; ?>">
						<p class="text-lg leading-8 text-body"><?php echo esc_html( $service['description'] ); ?></p>

						<?php if ( ! empty( $service['includes'] ) ) : ?>
							<h3 class="mt-8 text-xs font-extrabold uppercase tracking-[0.2em] <?php echo $is_green ? 'text-secondaryDark' : 'text-primary'; ?>"><?php esc_html_e( 'This can include', 'amanahcareservices' ); ?></h3>
							<ul class="mt-5 grid gap-3 sm:grid-cols-2">
								<?php foreach ( $service['includes'] as $item ) : ?>
									<li class="flex items-start gap-3 rounded-xl bg-[#faf8fe] px-4 py-3 text-[15px] font-semibold text-ink">
										<i class="fa-solid fa-circle-check mt-1 <?php echo $is_green ? 'text-secondary' : 'text-primary'; ?>" aria-hidden="true"></i>
										<?php echo esc_html( $item ); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<div class="mt-9 flex flex-wrap items-center gap-4 border-t border-[#f0ebf8] pt-7">
							<a href="<?php echo esc_url( $services_contact['cta_url'] ); ?>" class="group/btn inline-flex items-center gap-3 rounded-full bg-gradient-to-r from-primary to-primaryDark py-2.5 pl-6 pr-2.5 text-[12px] font-extrabold uppercase tracking-[0.12em] text-white shadow-[0_12px_28px_rgba(81,31,159,0.25)] transition hover:-translate-y-0.5">
								<?php esc_html_e( 'Enquire about this service', 'amanahcareservices' ); ?>
								<span class="flex h-8 w-8 items-center justify-center rounded-full bg-secondary transition-transform group-hover/btn:translate-x-0.5"><i class="fa-solid fa-arrow-right text-[11px]" aria-hidden="true"></i></span>
							</a>
							<?php if ( $services_phone['label'] ) : ?>
								<a href="<?php echo esc_attr( $services_phone['uri'] ); ?>" class="inline-flex items-center gap-2 px-2 text-sm font-extrabold text-primary transition hover:text-secondaryDark">
									<i class="fa-solid fa-phone" aria-hidden="true"></i>
									<?php echo esc_html( $services_phone['label'] ); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
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
					<a href="<?php echo esc_url( home_url( '/ndis/' ) ); ?>" class="inline-flex items-center justify-center gap-2 rounded-full bg-ink px-7 py-4 text-[12px] font-extrabold uppercase tracking-[0.12em] text-white transition hover:-translate-y-0.5 hover:bg-primary">
						<?php esc_html_e( 'NDIS explained', 'amanahcareservices' ); ?>
						<i class="fa-solid fa-arrow-right text-[10px]" aria-hidden="true"></i>
					</a>
					<a href="<?php echo esc_url( $services_contact['referral_url'] ); ?>" class="inline-flex items-center justify-center gap-2 rounded-full border border-primary/25 bg-white px-7 py-4 text-[12px] font-extrabold uppercase tracking-[0.12em] text-primary transition hover:-translate-y-0.5 hover:border-primary">
						<?php esc_html_e( 'Make a Referral', 'amanahcareservices' ); ?>
					</a>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/content', 'page-extra' ); ?>
</main>

<?php
get_footer();
