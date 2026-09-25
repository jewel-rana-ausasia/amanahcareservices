<?php
/**
 * Template Name: NDIS
 *
 * Plain-language guide to the NDIS and how to use a plan with Amanah.
 *
 * @package amanahcareservices
 */

get_header();

$ndis_contact    = amanahcareservices_get_contact();
$ndis_phone      = amanahcareservices_get_primary_phone();
$ndis_registered = '' !== $ndis_contact['ndis_number'];

$ndis_eligibility = array(
	array( 'icon' => 'fa-cake-candles', 'text' => 'Be aged under 65 when you first apply' ),
	array( 'icon' => 'fa-passport', 'text' => 'Be an Australian citizen, permanent resident or hold a Protected Special Category visa' ),
	array( 'icon' => 'fa-universal-access', 'text' => 'Have a permanent and significant disability, or need early intervention support' ),
);

$ndis_budgets = array(
	array( 'icon' => 'fa-house-user', 'title' => 'Core Supports', 'text' => 'Everyday help such as personal care, household tasks, community participation and transport.', 'tone' => 'purple' ),
	array( 'icon' => 'fa-seedling', 'title' => 'Capacity Building', 'text' => 'Supports that build your skills and independence over time, such as life skills development.', 'tone' => 'green' ),
	array( 'icon' => 'fa-screwdriver-wrench', 'title' => 'Capital Supports', 'text' => 'Assistive technology, equipment and home or vehicle modifications.', 'tone' => 'purple' ),
);

$ndis_management = array(
	array( 'title' => 'Self-managed', 'text' => 'You manage your own funding, choose any provider and pay invoices directly.' ),
	array( 'title' => 'Plan-managed', 'text' => 'A plan manager pays providers on your behalf and helps you track your budget.' ),
	array( 'title' => 'NDIA-managed', 'text' => 'The NDIA pays providers directly. You can use NDIS registered providers only.' ),
);

$ndis_steps = array(
	array( 'title' => 'Share your plan goals', 'text' => 'Tell us what you’d like to achieve and which supports are in your plan.' ),
	array( 'title' => 'Build your support plan', 'text' => 'We work out the right services, hours and workers to suit you.' ),
	array( 'title' => 'Agree on a service agreement', 'text' => 'A clear, written agreement explains your supports, costs and rights.' ),
	array( 'title' => 'Start support & review', 'text' => 'We begin support and check in regularly, including before plan reviews.' ),
);

$ndis_faqs = array(
	array( 'question' => 'Do I need an NDIS plan to receive support?', 'answer' => 'Many of our services are funded through the NDIS, but you don’t need to have everything sorted before you contact us. Get in touch and we’ll talk through your situation and options.' ),
	array( 'question' => 'What if I’m still waiting for my plan?', 'answer' => 'That’s okay. We can have an initial conversation now, so we’re ready to start as soon as your plan is approved.' ),
	array( 'question' => 'Can you help me prepare for a plan review?', 'answer' => 'Yes. We can share progress notes and observations about how your supports are working, to help you prepare for your review.' ),
	array( 'question' => 'Which plan management types can you support?', 'answer' => $ndis_registered ? 'As a registered NDIS provider, we can support participants who are self-managed, plan-managed or NDIA-managed.' : 'Get in touch and we’ll confirm how we can work with your plan based on how it is managed.' ),
);
?>

<main id="primary" class="site-main overflow-hidden bg-white">
	<?php
	get_template_part(
		'template-parts/content',
		'banner',
		array(
			'eyebrow'     => __( 'NDIS', 'amanahcareservices' ),
			'title'       => __( 'The NDIS, explained in plain language.', 'amanahcareservices' ),
			'description' => __( 'Understand how the NDIS works and how to use your plan for support with Amanah Care Services.', 'amanahcareservices' ),
		)
	);
	?>

	<!-- What is the NDIS -->
	<section class="py-20 sm:py-24 lg:py-28" aria-labelledby="ndis-what-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid items-center gap-14 lg:grid-cols-12 lg:gap-16">
				<div class="lg:col-span-7" data-reveal>
					<p class="amanah-eyebrow"><?php esc_html_e( 'What is the NDIS?', 'amanahcareservices' ); ?></p>
					<h2 id="ndis-what-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl">
						<?php esc_html_e( 'Funding for the support', 'amanahcareservices' ); ?>
						<span class="text-primary"><?php esc_html_e( 'you need to live well.', 'amanahcareservices' ); ?></span>
					</h2>
					<div class="mt-7 space-y-5 text-lg leading-8 text-body">
						<p><?php esc_html_e( 'The National Disability Insurance Scheme (NDIS) provides funding to eligible Australians with disability for the reasonable and necessary supports they need to pursue their goals and take part in everyday life.', 'amanahcareservices' ); ?></p>
						<p><?php esc_html_e( 'The scheme is run by the National Disability Insurance Agency (NDIA). Each participant receives a personalised plan, and you choose the providers who deliver your supports.', 'amanahcareservices' ); ?></p>
					</div>
					<a href="https://www.ndis.gov.au/" target="_blank" rel="noopener noreferrer" class="group mt-8 inline-flex items-center gap-3 text-sm font-extrabold text-primary">
						<?php esc_html_e( 'Visit the official NDIS website', 'amanahcareservices' ); ?>
						<span class="flex h-10 w-10 items-center justify-center rounded-full bg-soft transition group-hover:bg-primary group-hover:text-white"><i class="fa-solid fa-arrow-up-right-from-square text-xs" aria-hidden="true"></i></span>
						<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'amanahcareservices' ); ?></span>
					</a>
				</div>

				<div class="lg:col-span-5" data-reveal>
					<div class="amanah-dark-card relative overflow-hidden rounded-[2rem] p-8 text-white shadow-[0_35px_80px_-25px_rgba(27,11,58,0.55)] sm:p-10">
						<span class="pointer-events-none absolute -right-14 -top-14 h-48 w-48 rounded-full border-[32px] border-white/[0.06]" aria-hidden="true"></span>
						<p class="text-[11px] font-extrabold uppercase tracking-[0.22em] text-leaf"><?php esc_html_e( 'Who is eligible?', 'amanahcareservices' ); ?></p>
						<p class="mt-3 text-xl font-extrabold"><?php esc_html_e( 'To access the NDIS, you generally need to:', 'amanahcareservices' ); ?></p>
						<ul class="mt-7 space-y-4">
							<?php foreach ( $ndis_eligibility as $item ) : ?>
								<li class="flex items-start gap-4">
									<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/10 text-leaf"><i class="fa-solid <?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i></span>
									<span class="pt-1.5 text-[15px] leading-7 text-white/85"><?php echo esc_html( $item['text'] ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
						<p class="mt-7 border-t border-white/15 pt-5 text-xs leading-6 text-white/60"><?php esc_html_e( 'Eligibility is decided by the NDIA. Check the NDIS website for current requirements.', 'amanahcareservices' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Budgets -->
	<section class="bg-[#fbfafe] py-20 sm:py-24" aria-labelledby="ndis-budgets-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="mx-auto max-w-3xl text-center" data-reveal>
				<p class="amanah-eyebrow justify-center"><?php esc_html_e( 'Understanding your plan', 'amanahcareservices' ); ?></p>
				<h2 id="ndis-budgets-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl"><?php esc_html_e( 'The three NDIS support budgets.', 'amanahcareservices' ); ?></h2>
				<p class="mt-6 text-lg leading-8 text-body"><?php esc_html_e( 'Your plan funding is grouped into budgets. Most of our services are funded from Core Supports and Capacity Building.', 'amanahcareservices' ); ?></p>
			</div>
			<div class="mt-14 grid gap-5 md:grid-cols-3">
				<?php foreach ( $ndis_budgets as $budget ) : ?>
					<div class="group rounded-[1.75rem] border border-[#ece6f6] bg-white p-8 transition duration-300 hover:-translate-y-1 hover:shadow-[0_24px_50px_-20px_rgba(27,11,58,0.2)]" data-reveal>
						<span class="flex h-14 w-14 items-center justify-center rounded-2xl <?php echo 'green' === $budget['tone'] ? 'bg-mint text-secondaryDark' : 'bg-soft text-primary'; ?>"><i class="fa-solid <?php echo esc_attr( $budget['icon'] ); ?> text-xl" aria-hidden="true"></i></span>
						<h3 class="mt-7 text-xl font-extrabold text-ink"><?php echo esc_html( $budget['title'] ); ?></h3>
						<p class="mt-3 leading-7 text-body"><?php echo esc_html( $budget['text'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Plan management -->
	<section class="py-20 sm:py-24" aria-labelledby="ndis-manage-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
				<div class="lg:col-span-5" data-reveal>
					<p class="amanah-eyebrow"><?php esc_html_e( 'Plan management', 'amanahcareservices' ); ?></p>
					<h2 id="ndis-manage-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl"><?php esc_html_e( 'How your funding is managed.', 'amanahcareservices' ); ?></h2>
					<p class="mt-6 text-lg leading-8 text-body"><?php esc_html_e( 'How your plan is managed affects which providers you can use and how invoices are paid.', 'amanahcareservices' ); ?></p>
					<?php if ( $ndis_registered ) : ?>
						<p class="mt-7 flex items-center gap-3 rounded-2xl border border-secondary/25 bg-mint px-5 py-4 text-sm font-bold text-ink">
							<i class="fa-solid fa-shield-heart text-2xl text-secondary" aria-hidden="true"></i>
							<?php esc_html_e( 'As a registered NDIS provider, we can support all three plan management types.', 'amanahcareservices' ); ?>
						</p>
					<?php endif; ?>
				</div>
				<ol class="grid gap-4 lg:col-span-7" data-reveal>
					<?php foreach ( $ndis_management as $index => $type ) : ?>
						<li class="flex items-start gap-5 rounded-[1.5rem] border border-[#ece6f6] bg-white p-6 transition hover:border-primary/25 hover:shadow-[0_20px_45px_-20px_rgba(27,11,58,0.2)] sm:p-7">
							<span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-primary to-primaryDark font-display text-lg text-white"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
							<span>
								<span class="block text-lg font-extrabold text-ink"><?php echo esc_html( $type['title'] ); ?></span>
								<span class="mt-1 block leading-7 text-body"><?php echo esc_html( $type['text'] ); ?></span>
							</span>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</section>

	<!-- Using your plan with Amanah -->
	<section class="amanah-dark-section relative isolate overflow-hidden py-20 text-white sm:py-24 lg:py-28" aria-labelledby="ndis-steps-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="mx-auto max-w-3xl text-center" data-reveal>
				<p class="amanah-eyebrow amanah-eyebrow--light justify-center"><?php esc_html_e( 'Using your plan with us', 'amanahcareservices' ); ?></p>
				<h2 id="ndis-steps-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] md:text-5xl">
					<?php esc_html_e( 'Four simple steps to', 'amanahcareservices' ); ?>
					<span class="text-leaf"><?php esc_html_e( 'getting started.', 'amanahcareservices' ); ?></span>
				</h2>
			</div>
			<ol class="mt-14 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
				<?php foreach ( $ndis_steps as $index => $step ) : ?>
					<li class="rounded-[1.75rem] border border-white/10 bg-white/[0.05] p-7 backdrop-blur transition hover:-translate-y-1 hover:border-leaf/40" data-reveal>
						<span class="flex h-14 w-14 items-center justify-center rounded-2xl font-display text-xl <?php echo 0 === $index % 2 ? 'bg-gradient-to-br from-[#7b4dd1] to-primary text-white' : 'bg-gradient-to-br from-leaf to-secondary text-ink'; ?>"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3 class="mt-7 text-xl font-extrabold"><?php echo esc_html( $step['title'] ); ?></h3>
						<p class="mt-3 text-[15px] leading-7 text-white/70"><?php echo esc_html( $step['text'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>
			<div class="mt-14 flex flex-col items-center justify-center gap-4 sm:flex-row" data-reveal>
				<a href="<?php echo esc_url( $ndis_contact['referral_url'] ); ?>" class="group inline-flex items-center gap-3 rounded-full bg-white py-3 pl-7 pr-3 text-[12px] font-extrabold uppercase tracking-[0.14em] text-primary shadow-xl transition hover:-translate-y-0.5 hover:bg-mint">
					<?php esc_html_e( 'Make a Referral', 'amanahcareservices' ); ?>
					<span class="flex h-9 w-9 items-center justify-center rounded-full bg-secondary text-white transition-transform group-hover:translate-x-0.5"><i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></span>
				</a>
				<?php if ( $ndis_phone['label'] ) : ?>
					<a href="<?php echo esc_attr( $ndis_phone['uri'] ); ?>" class="inline-flex items-center gap-3 rounded-full border border-white/25 px-7 py-4 text-sm font-extrabold transition hover:border-white hover:bg-white/10">
						<i class="fa-solid fa-phone text-leaf" aria-hidden="true"></i>
						<?php echo esc_html( $ndis_phone['label'] ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- FAQ -->
	<section class="bg-[#fbfafe] py-20 sm:py-24" aria-labelledby="ndis-faq-title">
		<div class="container mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
				<div class="lg:col-span-4" data-reveal>
					<p class="amanah-eyebrow"><?php esc_html_e( 'NDIS questions', 'amanahcareservices' ); ?></p>
					<h2 id="ndis-faq-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] text-ink md:text-5xl"><?php esc_html_e( 'Common questions, clear answers.', 'amanahcareservices' ); ?></h2>
					<a href="<?php echo esc_url( $ndis_contact['cta_url'] ); ?>" class="group mt-7 inline-flex items-center gap-3 text-sm font-extrabold text-primary">
						<?php esc_html_e( 'Ask us a question', 'amanahcareservices' ); ?>
						<span class="flex h-10 w-10 items-center justify-center rounded-full bg-soft transition group-hover:bg-primary group-hover:text-white"><i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></span>
					</a>
				</div>
				<div class="space-y-4 lg:col-span-8" data-reveal>
					<?php foreach ( $ndis_faqs as $index => $faq ) : ?>
						<details class="amanah-faq group rounded-[1.5rem] border border-[#ece6f6] bg-white px-6 transition-shadow open:shadow-[0_20px_45px_-20px_rgba(27,11,58,0.18)] sm:px-8" <?php echo 0 === $index ? 'open' : ''; ?>>
							<summary class="flex cursor-pointer list-none items-center justify-between gap-5 py-6">
								<span class="text-base font-extrabold text-ink sm:text-lg"><?php echo esc_html( $faq['question'] ); ?></span>
								<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-soft text-primary transition duration-300 group-open:rotate-45 group-open:bg-primary group-open:text-white"><i class="fa-solid fa-plus text-sm" aria-hidden="true"></i></span>
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
