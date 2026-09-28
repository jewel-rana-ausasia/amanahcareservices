<?php
/**
 * Client testimonials slider.
 *
 * Testimonials come from Customizer → Theme Options → Homepage. Visitors only
 * see the section once at least one testimonial has been entered; logged-in
 * editors see a clearly labelled sample preview until then.
 *
 * @package amanahcareservices
 */

$testimonials = amanahcareservices_get_testimonials();
$is_preview   = false;

if ( ! $testimonials ) {
	if ( ! current_user_can( 'customize' ) ) {
		return;
	}

	$is_preview   = true;
	$testimonials = array(
		array(
			'quote' => __( 'Sample testimonial. Replace this with real words from a participant or family member, shared with their written permission.', 'amanahcareservices' ),
			'name'  => __( 'Participant name', 'amanahcareservices' ),
			'role'  => __( 'NDIS participant', 'amanahcareservices' ),
		),
		array(
			'quote' => __( 'Sample testimonial. Short, specific quotes about a real experience read best, for example how support helped with a goal or routine.', 'amanahcareservices' ),
			'name'  => __( 'Family member name', 'amanahcareservices' ),
			'role'  => __( 'Family member', 'amanahcareservices' ),
		),
		array(
			'quote' => __( 'Sample testimonial. Leave the name empty to show the quote anonymously, or use first name and initial only.', 'amanahcareservices' ),
			'name'  => '',
			'role'  => __( 'Support coordinator', 'amanahcareservices' ),
		),
	);
}

$testimonial_count = count( $testimonials );
$has_slider        = $testimonial_count > 1;
$testimonial_meta  = array();

foreach ( $testimonials as $index => $testimonial ) {
	$name                           = $testimonial['name'] ? $testimonial['name'] : __( 'Anonymous', 'amanahcareservices' );
	$testimonials[ $index ]['name'] = $name;
	$testimonial_meta[]             = array(
		'initial' => mb_strtoupper( mb_substr( $testimonial['name'] ? $testimonial['name'] : 'A', 0, 1 ) ),
		'name'    => $name,
	);
}
?>

<!-- =========================================================
     Testimonials
     ========================================================= -->
<section class="amanah-testimonials relative isolate overflow-hidden py-20 text-white sm:py-24 lg:py-32" aria-labelledby="testimonials-title">
	<span class="amanah-testimonials__grid pointer-events-none absolute inset-0 -z-10" aria-hidden="true"></span>
	<span class="pointer-events-none absolute -left-6 top-10 -z-10 select-none font-display text-[18rem] leading-none text-white/[0.035] sm:text-[24rem]" aria-hidden="true">&ldquo;</span>

	<div class="container relative mx-auto px-5 md:px-8 lg:px-12">

		<?php if ( $is_preview ) : ?>
			<div class="mb-10 flex items-start gap-3 rounded-2xl border border-amber-300/40 bg-amber-300/10 p-4 text-sm leading-6 text-amber-100" role="note">
				<i class="fa-solid fa-eye mt-1 text-amber-300" aria-hidden="true"></i>
				<p>
					<strong class="font-extrabold text-white"><?php esc_html_e( 'Preview only, visitors can’t see this section yet.', 'amanahcareservices' ); ?></strong>
					<?php esc_html_e( 'Add real testimonials (with written permission) in Appearance → Customize → Theme Options → Homepage and this sample content will be replaced.', 'amanahcareservices' ); ?>
				</p>
			</div>
		<?php endif; ?>

		<div class="grid items-center gap-14 lg:grid-cols-12 lg:gap-12 xl:gap-20">

			<!-- Intro -->
			<div class="lg:col-span-5" data-reveal>
				<p class="amanah-eyebrow amanah-eyebrow--light"><?php esc_html_e( 'Client testimonials', 'amanahcareservices' ); ?></p>
				<h2 id="testimonials-title" class="mt-5 text-3xl font-extrabold leading-[1.12] tracking-[-0.035em] md:text-5xl">
					<?php esc_html_e( 'Kind words from the people', 'amanahcareservices' ); ?>
					<span class="text-secondaryDark"><?php esc_html_e( 'we support.', 'amanahcareservices' ); ?></span>
				</h2>
				<p class="mt-6 max-w-xl text-lg leading-8 text-white/70">
					<?php esc_html_e( 'Participants, families and coordinators sharing what support with Amanah feels like, in their own words.', 'amanahcareservices' ); ?>
				</p>

				<ul class="mt-9 grid gap-3 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
					<li class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/[0.04] px-4 py-3.5 backdrop-blur">
						<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#3cb838] to-secondaryDark text-white shadow-[0_10px_24px_-8px_rgba(46,162,42,0.6)]"><i class="fa-solid fa-file-signature text-sm" aria-hidden="true"></i></span>
						<span class="text-sm font-bold leading-snug text-white/85"><?php esc_html_e( 'Shared with written permission', 'amanahcareservices' ); ?></span>
					</li>
					<li class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/[0.04] px-4 py-3.5 backdrop-blur">
						<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#6d2fc6] to-primaryDark text-white shadow-[0_10px_24px_-8px_rgba(81,31,159,0.6)]"><i class="fa-solid fa-user-shield text-sm" aria-hidden="true"></i></span>
						<span class="text-sm font-bold leading-snug text-white/85"><?php esc_html_e( 'Privacy respected, always', 'amanahcareservices' ); ?></span>
					</li>
				</ul>

				<?php if ( $has_slider ) : ?>
					<div class="mt-10 hidden items-center gap-5 lg:flex">
						<button type="button" class="amanah-testimonials-prev amanah-testimonials-btn" aria-label="<?php esc_attr_e( 'Previous testimonial', 'amanahcareservices' ); ?>">
							<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
						</button>
						<button type="button" class="amanah-testimonials-next amanah-testimonials-btn" aria-label="<?php esc_attr_e( 'Next testimonial', 'amanahcareservices' ); ?>">
							<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
						</button>
						<p class="ml-2 font-display text-lg tracking-[0.08em] text-white/50" aria-hidden="true">
							<span class="amanah-testimonials-current text-2xl text-white">01</span>
							<span class="mx-1.5">/</span>
							<span><?php echo esc_html( sprintf( '%02d', $testimonial_count ) ); ?></span>
						</p>
					</div>
				<?php endif; ?>
			</div>

			<!-- Quote card -->
			<div class="relative lg:col-span-7" data-reveal>
				<?php if ( $has_slider ) : ?>
					<span class="pointer-events-none absolute inset-x-10 -bottom-4 top-6 rounded-[2.25rem] bg-white/[0.07] ring-1 ring-white/10" aria-hidden="true"></span>
					<span class="pointer-events-none absolute inset-x-20 -bottom-8 top-12 rounded-[2.25rem] bg-white/[0.04] ring-1 ring-white/5" aria-hidden="true"></span>
				<?php endif; ?>

				<div class="amanah-testimonials-card relative rounded-[2.25rem] bg-white p-7 text-ink shadow-[0_40px_90px_-30px_rgba(0,0,0,0.55)] sm:p-10 lg:p-12">
					<span class="absolute -top-7 left-7 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-secondary to-secondaryDark text-white shadow-[0_18px_36px_-12px_rgba(46,162,42,0.7)] sm:left-10 lg:left-12" aria-hidden="true">
						<i class="fa-solid fa-quote-left text-xl"></i>
					</span>

					<div class="amanah-testimonials-slider <?php echo $has_slider ? 'swiper' : ''; ?>" data-testimonials="<?php echo esc_attr( wp_json_encode( $testimonial_meta ) ); ?>">
						<div class="<?php echo $has_slider ? 'swiper-wrapper' : ''; ?>">
							<?php foreach ( $testimonials as $index => $testimonial ) : ?>
								<figure class="<?php echo $has_slider ? 'swiper-slide' : ''; ?> !h-auto bg-white pt-6">
									<span class="flex gap-1.5 text-[13px] text-secondaryDark" aria-hidden="true">
										<i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i>
									</span>

									<blockquote class="mt-6">
										<p class="font-display text-lg leading-[1.7] text-ink sm:text-xl lg:text-[1.35rem]">
											&ldquo;<?php echo esc_html( $testimonial['quote'] ); ?>&rdquo;
										</p>
									</blockquote>

									<figcaption class="mt-9 flex items-center gap-4 border-t border-[#efeaf7] pt-7">
										<span class="amanah-testimonials-avatar" aria-hidden="true"><?php echo esc_html( $testimonial_meta[ $index ]['initial'] ); ?></span>
										<span class="min-w-0">
											<strong class="block text-base font-extrabold text-ink"><?php echo esc_html( $testimonial['name'] ); ?></strong>
											<?php if ( $testimonial['role'] ) : ?>
												<span class="mt-0.5 block text-[11px] font-bold uppercase tracking-[0.16em] text-primary/80"><?php echo esc_html( $testimonial['role'] ); ?></span>
											<?php endif; ?>
										</span>
									</figcaption>
								</figure>
							<?php endforeach; ?>
						</div>
					</div>

					<?php if ( $has_slider ) : ?>
						<div class="mt-8 flex flex-wrap items-center justify-between gap-5">
							<div class="amanah-testimonials-pagination flex flex-wrap items-center gap-2.5"></div>

							<div class="flex items-center gap-3 lg:hidden">
								<button type="button" class="amanah-testimonials-prev amanah-testimonials-btn is-light" aria-label="<?php esc_attr_e( 'Previous testimonial', 'amanahcareservices' ); ?>">
									<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
								</button>
								<button type="button" class="amanah-testimonials-next amanah-testimonials-btn is-light" aria-label="<?php esc_attr_e( 'Next testimonial', 'amanahcareservices' ); ?>">
									<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
								</button>
							</div>
						</div>

						<span class="amanah-testimonials-progress" aria-hidden="true"><span></span></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
	.amanah-testimonials {
		background:
			radial-gradient(circle at 85% 15%, rgba(123, 77, 209, 0.45), transparent 38%),
			radial-gradient(circle at 10% 95%, rgba(46, 162, 42, 0.22), transparent 32%),
			linear-gradient(160deg, #2a0f5a 0%, #1b0b3a 72%);
	}

	.amanah-testimonials__grid {
		background-image:
			linear-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px),
			linear-gradient(90deg, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
		background-size: 56px 56px;
		-webkit-mask-image: radial-gradient(ellipse at 70% 40%, #000 10%, transparent 70%);
		mask-image: radial-gradient(ellipse at 70% 40%, #000 10%, transparent 70%);
	}

	.amanah-testimonials-avatar {
		display: flex;
		flex-shrink: 0;
		align-items: center;
		justify-content: center;
		width: 3.25rem;
		height: 3.25rem;
		border-radius: 999px;
		background: linear-gradient(135deg, #6d2fc6, #3a1575);
		box-shadow: 0 0 0 4px #ffffff, 0 0 0 6px rgba(81, 31, 159, 0.18), 0 14px 28px -10px rgba(81, 31, 159, 0.6);
		color: #ffffff;
		font-weight: 800;
		font-size: 1.1rem;
	}

	.amanah-testimonials-btn {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: 3.25rem;
		height: 3.25rem;
		border: 1px solid rgba(255, 255, 255, 0.2);
		border-radius: 999px;
		color: #ffffff;
		font-size: 0.85rem;
		transition: transform 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
	}

	.amanah-testimonials-btn:hover {
		border-color: #ffffff;
		background: #ffffff;
		color: #511f9f;
		transform: translateY(-2px);
	}

	.amanah-testimonials-btn.is-light {
		width: 2.75rem;
		height: 2.75rem;
		border-color: #e6def5;
		color: #511f9f;
	}

	.amanah-testimonials-btn.is-light:hover {
		border-color: #511f9f;
		background: #511f9f;
		color: #ffffff;
	}

	.amanah-testimonials-btn:focus-visible,
	.amanah-testimonials-bullet:focus-visible {
		outline: 3px solid #9be08f;
		outline-offset: 3px;
	}

	.amanah-testimonials-bullet {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: 2.5rem;
		height: 2.5rem;
		border: 1px solid #e6def5;
		border-radius: 999px;
		background: #f6f2fd;
		color: #511f9f;
		font-size: 0.8rem;
		font-weight: 800;
		opacity: 0.75;
		cursor: pointer;
		transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
	}

	.amanah-testimonials-bullet:hover {
		opacity: 1;
		border-color: #c9b6f0;
	}

	.amanah-testimonials-bullet.is-active {
		border-color: transparent;
		background: linear-gradient(135deg, #511f9f, #3a1575);
		color: #ffffff;
		opacity: 1;
		box-shadow: 0 0 0 3px #ffffff, 0 0 0 5px rgba(81, 31, 159, 0.25);
	}

	.amanah-testimonials-progress {
		position: absolute;
		right: 2.25rem;
		bottom: 0;
		left: 2.25rem;
		height: 3px;
		overflow: hidden;
		border-radius: 999px 999px 0 0;
		background: #f1ecfa;
	}

	.amanah-testimonials-progress > span {
		display: block;
		width: 100%;
		height: 100%;
		background: linear-gradient(90deg, #511f9f, #2ea22a);
		transform: scaleX(0);
		transform-origin: left;
	}

	@media (prefers-reduced-motion: reduce) {
		.amanah-testimonials-btn,
		.amanah-testimonials-bullet {
			transition: none;
		}

		.amanah-testimonials-progress {
			display: none;
		}
	}
</style>
