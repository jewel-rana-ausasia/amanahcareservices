<?php
/**
 * Template Name: NDIS
 *
 * NDIS overview with the official "What is the NDIS?" video.
 *
 * @package amanahcareservices
 */

get_header();

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
	<section class="amanah-ndis-intro relative isolate overflow-hidden py-20 sm:py-24 lg:py-28" aria-labelledby="ndis-what-title">
		<span class="amanah-ndis-intro__glow amanah-ndis-intro__glow--purple" aria-hidden="true"></span>
		<span class="amanah-ndis-intro__glow amanah-ndis-intro__glow--green" aria-hidden="true"></span>

		<div class="container relative mx-auto px-5 md:px-8 lg:px-12">
			<div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
				<div class="lg:col-span-6" data-reveal>
					<p class="inline-flex items-center gap-2.5 rounded-full border border-primary/15 bg-white/80 py-2 pl-2 pr-4 shadow-[0_8px_24px_-12px_rgba(81,31,159,0.35)] backdrop-blur">
						<span class="flex h-6 w-6 items-center justify-center rounded-full bg-soft text-primary"><i class="fa-solid fa-circle-info text-[10px]" aria-hidden="true"></i></span>
						<span class="text-[11px] font-extrabold uppercase tracking-[0.22em] text-primary"><?php esc_html_e( 'NDIS Overview', 'amanahcareservices' ); ?></span>
					</p>
					<h2 id="ndis-what-title" class="mt-6 text-3xl font-extrabold leading-[1.1] tracking-[-0.035em] text-ink sm:text-4xl md:text-5xl">
						<?php esc_html_e( 'What is the', 'amanahcareservices' ); ?>
						<span class="bg-gradient-to-r from-primary to-[#7b4dd1] bg-clip-text text-transparent"><?php esc_html_e( 'National Disability Insurance Scheme?', 'amanahcareservices' ); ?></span>
					</h2>

					<div class="relative mt-8 overflow-hidden rounded-[1.75rem] border border-[#ece6f6] bg-white/90 p-6 shadow-[0_24px_60px_-35px_rgba(27,11,58,0.35)] backdrop-blur sm:p-8">
						<span class="absolute inset-y-0 left-0 w-1 bg-gradient-to-b from-primary via-[#7b4dd1] to-secondary" aria-hidden="true"></span>
						<p class="text-lg font-bold leading-8 text-ink"><?php esc_html_e( 'The National Disability Insurance Scheme (NDIS) is a significant social reform in Australia that provides support and services to eligible people with disability.', 'amanahcareservices' ); ?></p>
						<p class="mt-5 leading-8 text-body"><?php esc_html_e( 'It is designed to give people with disability greater choice and control over their own lives. The NDIS provides funding for reasonable and necessary supports related to a person’s disability, individual circumstances and goals.', 'amanahcareservices' ); ?></p>
						<p class="mt-4 leading-8 text-body"><?php esc_html_e( 'By focusing on individual needs and aspirations, the NDIS can support greater independence, community participation, skill development and an improved quality of life.', 'amanahcareservices' ); ?></p>
					</div>

					<a href="https://www.ndis.gov.au/" target="_blank" rel="noopener noreferrer" class="group relative mt-8 inline-flex min-h-[50px] items-center justify-center overflow-hidden rounded-md bg-primary px-7 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_14px_32px_rgba(81,31,159,.28)] transition duration-300 hover:-translate-y-0.5 hover:bg-primaryDark hover:shadow-[0_18px_38px_rgba(81,31,159,.36)]">
						<span><?php esc_html_e( 'Visit the official NDIS website', 'amanahcareservices' ); ?></span>
						<span class="ml-3 flex items-center"><i class="fa-solid fa-arrow-up-right-from-square text-[11px] transition-transform duration-300 group-hover:-translate-y-0.5 group-hover:translate-x-0.5" aria-hidden="true"></i></span>
						<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'amanahcareservices' ); ?></span>
						<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
					</a>
				</div>

				<div class="lg:col-span-6" data-reveal>
					<div class="relative">

						<div class="relative overflow-hidden rounded-[2rem] border-[6px] border-white bg-white shadow-[0_40px_90px_-35px_rgba(27,11,58,0.55)] sm:border-[10px] lg:rounded-[2.5rem]">
							<div class="flex items-center justify-between gap-3 border-b border-[#ece6f6] bg-gradient-to-r from-soft via-white to-mint/60 px-4 py-3.5 sm:px-5 sm:py-4">
								<div class="flex items-center gap-3">
									<span class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-primary to-primaryDark text-white shadow-md shadow-primary/25"><i class="fa-solid fa-play text-[10px]" aria-hidden="true"></i></span>
									<div>
										<p class="text-[9px] font-extrabold uppercase tracking-[0.2em] text-primary"><?php esc_html_e( 'Official NDIS video', 'amanahcareservices' ); ?></p>
										<h3 class="mt-0.5 text-sm font-extrabold text-ink"><?php esc_html_e( 'What is the NDIS?', 'amanahcareservices' ); ?></h3>
									</div>
								</div>
								<span class="hidden rounded-full bg-mint px-3 py-1 text-[9px] font-extrabold uppercase tracking-[0.14em] text-secondaryDark sm:inline-flex"><?php esc_html_e( 'NDIS Australia', 'amanahcareservices' ); ?></span>
							</div>
							<iframe
								class="block aspect-video w-full bg-ink"
								src="https://www.youtube-nocookie.com/embed/qZOjPBJiBPg?rel=0"
								title="<?php esc_attr_e( 'What is the NDIS? - NDIS Australia', 'amanahcareservices' ); ?>"
								loading="lazy"
								referrerpolicy="strict-origin-when-cross-origin"
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
								allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<style>
		.amanah-ndis-intro {
			background: linear-gradient(180deg, #ffffff 0%, #fbf9fe 100%);
		}

		.amanah-ndis-intro__glow {
			position: absolute;
			z-index: -1;
			border-radius: 999px;
			filter: blur(80px);
			pointer-events: none;
		}

		.amanah-ndis-intro__glow--purple {
			top: 12rem;
			left: -12rem;
			width: 30rem;
			height: 30rem;
			background: rgba(201, 182, 240, 0.45);
		}

		.amanah-ndis-intro__glow--green {
			right: -10rem;
			bottom: -8rem;
			width: 28rem;
			height: 28rem;
			background: rgba(155, 224, 143, 0.3);
		}
	</style>

	<?php get_template_part( 'template-parts/content', 'page-extra' ); ?>
</main>

<?php
get_footer();
