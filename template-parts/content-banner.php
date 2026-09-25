<?php
/**
 * Common inner-page banner.
 *
 * Usage: get_template_part( 'template-parts/content', 'banner', array(
 *     'eyebrow'     => 'Optional small label',
 *     'title'       => 'Defaults to the page title',
 *     'description' => 'Defaults to the page excerpt',
 * ) );
 *
 * The page's featured image, when set, is used as a subtle background photo.
 *
 * @package amanahcareservices
 */

$banner_args = wp_parse_args(
	isset( $args ) && is_array( $args ) ? $args : array(),
	array(
		'eyebrow'     => get_bloginfo( 'name' ),
		'title'       => '',
		'description' => '',
	)
);

if ( '' === $banner_args['title'] ) {
	if ( is_singular() ) {
		$banner_args['title'] = get_the_title();
	} elseif ( is_search() ) {
		/* translators: %s: search query. */
		$banner_args['title'] = sprintf( __( 'Search results for “%s”', 'amanahcareservices' ), get_search_query() );
	} elseif ( is_archive() ) {
		$banner_args['title'] = wp_strip_all_tags( get_the_archive_title() );
	} else {
		$banner_args['title'] = get_bloginfo( 'name' );
	}
}

if ( '' === $banner_args['description'] && is_singular() && has_excerpt() ) {
	$banner_args['description'] = get_the_excerpt();
}

$banner_image_id = is_singular() ? get_post_thumbnail_id() : 0;
$banner_parent   = is_page() ? wp_get_post_parent_id( get_the_ID() ) : 0;
?>

<section class="amanah-banner relative isolate overflow-hidden text-white" aria-labelledby="page-banner-title">
	<?php if ( $banner_image_id ) : ?>
		<div class="absolute inset-0 -z-20">
			<?php echo wp_get_attachment_image( $banner_image_id, 'full', false, array( 'class' => 'h-full w-full object-cover', 'loading' => 'eager', 'alt' => '' ) ); ?>
		</div>
		<span class="absolute inset-0 -z-10 bg-gradient-to-r from-ink/95 via-primaryDark/85 to-primary/50" aria-hidden="true"></span>
	<?php endif; ?>

	<div class="amanah-banner-art" aria-hidden="true">
		<span class="amanah-banner-art__grid"></span>
		<span class="amanah-banner-art__glow"></span>
		<span class="amanah-banner-art__ring amanah-banner-art__ring--one"></span>
		<span class="amanah-banner-art__ring amanah-banner-art__ring--two"></span>
		<img class="amanah-banner-art__mark" src="<?php echo esc_url( amanahcareservices_get_logo_url( 'mark' ) ); ?>" alt="" width="343" height="363">
	</div>

	<div class="container relative mx-auto px-5 pb-24 pt-16 md:px-8 lg:px-12 lg:pb-28 lg:pt-24">
		<nav class="mb-7" aria-label="<?php esc_attr_e( 'Breadcrumb', 'amanahcareservices' ); ?>">
			<ol class="inline-flex flex-wrap items-center gap-2 rounded-full border border-white/15 bg-white/[0.07] px-4 py-2 text-xs font-semibold text-white/75 backdrop-blur">
				<li>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 transition hover:text-leaf">
						<i class="fa-solid fa-house text-[10px] text-leaf" aria-hidden="true"></i>
						<?php esc_html_e( 'Home', 'amanahcareservices' ); ?>
					</a>
				</li>
				<?php if ( $banner_parent ) : ?>
					<li aria-hidden="true"><i class="fa-solid fa-chevron-right text-[8px] text-white/40"></i></li>
					<li><a href="<?php echo esc_url( get_permalink( $banner_parent ) ); ?>" class="transition hover:text-leaf"><?php echo esc_html( get_the_title( $banner_parent ) ); ?></a></li>
				<?php endif; ?>
				<li aria-hidden="true"><i class="fa-solid fa-chevron-right text-[8px] text-white/40"></i></li>
				<li class="text-white" aria-current="page"><?php echo esc_html( $banner_args['title'] ); ?></li>
			</ol>
		</nav>

		<div class="max-w-3xl">
			<?php if ( $banner_args['eyebrow'] ) : ?>
				<p class="amanah-eyebrow amanah-eyebrow--light"><?php echo esc_html( $banner_args['eyebrow'] ); ?></p>
			<?php endif; ?>
			<h1 id="page-banner-title" class="mt-5 text-4xl font-extrabold leading-[1.08] tracking-[-0.04em] sm:text-5xl lg:text-6xl">
				<?php echo esc_html( $banner_args['title'] ); ?>
			</h1>
			<?php if ( $banner_args['description'] ) : ?>
				<p class="mt-6 max-w-2xl text-lg leading-8 text-white/75"><?php echo esc_html( $banner_args['description'] ); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<svg class="absolute inset-x-0 bottom-0 h-10 w-full text-white sm:h-14" viewBox="0 0 1440 60" preserveAspectRatio="none" fill="currentColor" aria-hidden="true">
		<path d="M0 60h1440V20c-240 26-480 40-720 40S240 46 0 20z" />
	</svg>
</section>
