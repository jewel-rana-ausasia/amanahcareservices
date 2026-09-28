<?php
/**
 * The header for the Amanah Care Services theme.
 *
 * @package amanahcareservices
 */

$amanah_contact = amanahcareservices_get_contact();
$amanah_phone   = amanahcareservices_get_primary_phone();
$amanah_socials = amanahcareservices_get_social_links();
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

	<script>
		tailwind.config = {
			theme: {
				// Full-width container (with the existing px-* gutters) below 1280px, so tablets
				// such as Surface Pro / iPad aren't capped at the previous breakpoint's width.
				container: {
					screens: {
						xl: '1280px',
						'2xl': '1536px'
					}
				},
				extend: {
					colors: {
						primary: '#511F9F',
						primaryDark: '#3A1575',
						ink: '#1B0B3A',
						soft: '#F6F2FD',
						lilac: '#C9B6F0',
						secondary: '#2EA22A',
						secondaryDark: '#248F20',
						mint: '#EEF8EC',
						leaf: '#9BE08F',
						body: '#524A63'
					},
					fontFamily: {
						sans: ['Plus Jakarta Sans', 'system-ui', 'sans-serif'],
						display: ['Marcellus', 'Georgia', 'serif']
					}
				}
			}
		};
	</script>

	<style>
		html {
			scroll-behavior: smooth;
		}

		#masthead.is-scrolled #main-header {
			box-shadow: 0 14px 40px rgba(27, 11, 58, 0.1);
		}

		/* Desktop navigation */
		.amanah-nav>ul {
			display: flex;
			align-items: center;
			gap: clamp(1rem, 1.7vw, 2rem);
			margin: 0;
			padding: 0;
			list-style: none;
		}

		.amanah-nav li {
			position: relative;
		}

		.amanah-nav>ul>li>a {
			position: relative;
			display: flex;
			align-items: center;
			min-height: 6.25rem;
			color: #2b2140;
			font-size: 0.8rem;
			font-weight: 700;
			letter-spacing: 0.02em;
			transition: color 0.25s ease;
		}

		.amanah-nav>ul>li.menu-item-has-children>a,
		.amanah-nav>ul>li.page_item_has_children>a {
			padding-right: 1.1rem;
		}

		.amanah-nav>ul>li.menu-item-has-children>a::before,
		.amanah-nav>ul>li.page_item_has_children>a::before {
			position: absolute;
			right: 0;
			content: "\f078";
			font-family: "Font Awesome 6 Free";
			font-size: 0.55rem;
			font-weight: 900;
			color: #511f9f;
			transition: transform 0.25s ease;
		}

		.amanah-nav>ul>li:hover>a::before,
		.amanah-nav>ul>li:focus-within>a::before {
			transform: rotate(180deg);
		}

		.amanah-nav>ul>li>a::after {
			position: absolute;
			right: 50%;
			bottom: 2rem;
			left: 50%;
			height: 3px;
			border-radius: 999px;
			background: linear-gradient(90deg, #511f9f, #2ea22a);
			content: "";
			opacity: 0;
			transition: left 0.3s ease, right 0.3s ease, opacity 0.3s ease;
		}

		.amanah-nav>ul>li>a:hover,
		.amanah-nav>ul>li.current-menu-item>a,
		.amanah-nav>ul>li.current_page_item>a,
		.amanah-nav>ul>li.current-menu-ancestor>a {
			color: #511f9f;
		}

		.amanah-nav>ul>li>a:hover::after,
		.amanah-nav>ul>li.current-menu-item>a::after,
		.amanah-nav>ul>li.current_page_item>a::after,
		.amanah-nav>ul>li.current-menu-ancestor>a::after {
			right: 0;
			left: 0;
			opacity: 1;
		}

		.amanah-nav .sub-menu,
		.amanah-nav .children {
			position: absolute;
			top: calc(100% - 0.75rem);
			left: 50%;
			z-index: 60;
			min-width: 16rem;
			margin: 0;
			padding: 0.6rem;
			border: 1px solid rgba(81, 31, 159, 0.1);
			border-radius: 1.1rem;
			background: #fff;
			box-shadow: 0 24px 60px rgba(27, 11, 58, 0.16);
			list-style: none;
			opacity: 0;
			visibility: hidden;
			pointer-events: none;
			transform: translate(-50%, 0.6rem);
			transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
		}

		.amanah-nav li:hover>.sub-menu,
		.amanah-nav li:focus-within>.sub-menu,
		.amanah-nav li:hover>.children,
		.amanah-nav li:focus-within>.children {
			opacity: 1;
			visibility: visible;
			pointer-events: auto;
			transform: translate(-50%, 0);
		}

		.amanah-nav .sub-menu a,
		.amanah-nav .children a {
			display: block;
			padding: 0.7rem 0.9rem;
			border-radius: 0.7rem;
			color: #2b2140;
			font-size: 0.85rem;
			font-weight: 600;
			transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
		}

		.amanah-nav .sub-menu a:hover,
		.amanah-nav .children a:hover {
			background: #f6f2fd;
			color: #511f9f;
			transform: translateX(0.2rem);
		}

		.amanah-nav .sub-menu .sub-menu {
			top: -0.6rem;
			left: calc(100% + 0.5rem);
			transform: translate(0.5rem, 0);
		}

		.amanah-nav .sub-menu li:hover>.sub-menu {
			transform: translate(0, 0);
		}

		/* Compact desktop header for tablets (iPad Pro portrait and up). */
		@media (min-width: 834px) and (max-width: 1279px) {
			.amanah-header-logo img {
				max-height: 46px;
			}

			.amanah-nav>ul {
				gap: clamp(0.9rem, 1.6vw, 1.5rem);
			}

			.amanah-nav>ul>li>a {
				font-size: 0.78rem;
				letter-spacing: 0.01em;
			}

			.amanah-header-actions>a:last-child {
				min-height: 44px;
				padding-right: 1rem;
				padding-left: 1rem;
				font-size: 10px;
				letter-spacing: 0.1em;
			}
		}

		/* Mobile navigation */
		.amanah-mobile-menu {
			max-height: calc(100vh - 88px);
			max-height: calc(100dvh - 88px);
			overflow-y: auto;
			overscroll-behavior: contain;
		}

		.amanah-mobile-menu:not(.hidden) {
			animation: amanahMenuIn 0.32s cubic-bezier(0.2, 0.8, 0.2, 1) both;
		}

		.amanah-mobile-menu:not(.hidden) #mobile-primary-menu>li {
			animation: amanahMenuItemIn 0.4s cubic-bezier(0.2, 0.8, 0.2, 1) both;
		}

		.amanah-mobile-menu #mobile-primary-menu>li:nth-child(2) { animation-delay: 0.04s; }
		.amanah-mobile-menu #mobile-primary-menu>li:nth-child(3) { animation-delay: 0.08s; }
		.amanah-mobile-menu #mobile-primary-menu>li:nth-child(4) { animation-delay: 0.12s; }
		.amanah-mobile-menu #mobile-primary-menu>li:nth-child(5) { animation-delay: 0.16s; }
		.amanah-mobile-menu #mobile-primary-menu>li:nth-child(n+6) { animation-delay: 0.2s; }

		@keyframes amanahMenuIn {
			from { opacity: 0; transform: translateY(-10px); }
			to { opacity: 1; transform: none; }
		}

		@keyframes amanahMenuItemIn {
			from { opacity: 0; transform: translateX(-12px); }
			to { opacity: 1; transform: none; }
		}

		.amanah-mobile-menu ul {
			margin: 0;
			padding: 0;
			list-style: none;
		}

		.amanah-mobile-menu #mobile-primary-menu>li+li {
			margin-top: 0.25rem;
		}

		.amanah-mobile-menu li {
			position: relative;
		}

		.amanah-mobile-menu #mobile-primary-menu>li>a {
			position: relative;
			display: flex;
			align-items: center;
			min-height: 3.35rem;
			padding: 0.85rem 3.25rem 0.85rem 1rem;
			border-radius: 0.9rem;
			color: #1b0b3a;
			font-size: 1.02rem;
			font-weight: 700;
			letter-spacing: -0.01em;
			transition: background-color 0.2s ease, color 0.2s ease;
		}

		/* Gradient accent bar on the current page. */
		.amanah-mobile-menu #mobile-primary-menu>li>a::before {
			position: absolute;
			top: 50%;
			left: 0;
			height: 0;
			width: 3px;
			border-radius: 999px;
			background: linear-gradient(180deg, #511f9f, #2ea22a);
			content: "";
			transform: translateY(-50%);
			transition: height 0.25s ease;
		}

		/* Chevron on links without a submenu toggle. */
		.amanah-mobile-menu #mobile-primary-menu>li:not(.menu-item-has-children):not(.page_item_has_children)>a::after {
			position: absolute;
			right: 1.1rem;
			content: "\f054";
			font-family: "Font Awesome 6 Free";
			font-size: 0.65rem;
			font-weight: 900;
			color: #bfb0dd;
			transition: color 0.2s ease, transform 0.2s ease;
		}

		.amanah-mobile-menu #mobile-primary-menu>li>a:hover,
		.amanah-mobile-menu #mobile-primary-menu>li.current-menu-item>a,
		.amanah-mobile-menu #mobile-primary-menu>li.current_page_item>a,
		.amanah-mobile-menu #mobile-primary-menu>li.current-menu-ancestor>a {
			background: #f6f2fd;
			color: #511f9f;
		}

		.amanah-mobile-menu #mobile-primary-menu>li.current-menu-item>a::before,
		.amanah-mobile-menu #mobile-primary-menu>li.current_page_item>a::before,
		.amanah-mobile-menu #mobile-primary-menu>li.current-menu-ancestor>a::before {
			height: 1.5rem;
		}

		.amanah-mobile-menu #mobile-primary-menu>li>a:hover::after,
		.amanah-mobile-menu #mobile-primary-menu>li.current-menu-item>a::after,
		.amanah-mobile-menu #mobile-primary-menu>li.current_page_item>a::after {
			color: #511f9f;
			transform: translateX(3px);
		}

		.amanah-mobile-menu .submenu-toggle {
			position: absolute;
			top: 0.45rem;
			right: 0.45rem;
			display: inline-flex;
			height: 2.45rem;
			width: 2.45rem;
			align-items: center;
			justify-content: center;
			border: 1px solid #e6def5;
			border-radius: 0.75rem;
			background: #fff;
			color: #511f9f;
			transition: background-color 0.2s ease, color 0.2s ease;
		}

		.amanah-mobile-menu .submenu-toggle::before {
			content: "\f078";
			font-family: "Font Awesome 6 Free";
			font-size: 0.65rem;
			font-weight: 900;
			transition: transform 0.25s ease;
		}

		.amanah-mobile-menu li.submenu-open>.submenu-toggle {
			background: #511f9f;
			color: #fff;
		}

		.amanah-mobile-menu li.submenu-open>.submenu-toggle::before {
			transform: rotate(180deg);
		}

		.amanah-mobile-menu .sub-menu,
		.amanah-mobile-menu .children {
			display: none;
			margin: 0.35rem 0 0.6rem 1.25rem;
			padding-left: 0.75rem;
			border-left: 2px solid rgba(46, 162, 42, 0.35);
		}

		.amanah-mobile-menu li.submenu-open>.sub-menu,
		.amanah-mobile-menu li.submenu-open>.children {
			display: block;
		}

		.amanah-mobile-menu .sub-menu a,
		.amanah-mobile-menu .children a {
			display: block;
			padding: 0.65rem 0.85rem;
			border-radius: 0.7rem;
			color: #524a63;
			font-size: 0.92rem;
			font-weight: 600;
			transition: background-color 0.2s ease, color 0.2s ease;
		}

		.amanah-mobile-menu .sub-menu a:hover,
		.amanah-mobile-menu .children a:hover,
		.amanah-mobile-menu .sub-menu .current-menu-item>a,
		.amanah-mobile-menu .children .current_page_item>a {
			background: #f6f2fd;
			color: #511f9f;
		}

		@media (prefers-reduced-motion: reduce) {
			html {
				scroll-behavior: auto;
			}

			*,
			*::before,
			*::after {
				animation-duration: 0.01ms !important;
				transition-duration: 0.01ms !important;
			}
		}
	</style>

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white font-sans text-body antialiased' ); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary">
			<?php esc_html_e( 'Skip to content', 'amanahcareservices' ); ?>
		</a>

		<!-- Top bar -->
		<div id="top-header" class="relative hidden bg-gradient-to-r from-ink via-[#2a0f5a] to-primaryDark text-white md:block">
			<span class="pointer-events-none absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-leaf/50 to-transparent" aria-hidden="true"></span>
			<div class="container mx-auto flex min-h-[42px] items-center justify-between gap-6 px-4 text-[12px] font-semibold md:px-6">
				<div class="flex items-center gap-5 lg:gap-7">
					<p class="flex items-center gap-2 text-white/90">
						<i class="fa-solid fa-heart text-[11px] text-secondaryDark" aria-hidden="true"></i>
						<span class="font-display text-[13px] tracking-wide"><?php esc_html_e( 'Amanah Means Trust. We Honour It.', 'amanahcareservices' ); ?></span>
					</p>
					<?php if ( $amanah_contact['service_area'] ) : ?>
						<p class="hidden items-center gap-2 border-l border-white/15 pl-5 text-white/80 lg:flex">
							<i class="fa-solid fa-location-dot text-[11px] text-secondaryDark" aria-hidden="true"></i>
							<?php echo esc_html( $amanah_contact['service_area'] ); ?>
						</p>
					<?php elseif ( $amanah_contact['business_hours'] ) : ?>
						<p class="hidden items-center gap-2 border-l border-white/15 pl-5 text-white/80 lg:flex">
							<i class="fa-regular fa-clock text-[11px] text-secondaryDark" aria-hidden="true"></i>
							<?php echo esc_html( strtok( $amanah_contact['business_hours'], "\n" ) ); ?>
						</p>
					<?php endif; ?>
				</div>

				<div class="flex items-center gap-5">
					<?php if ( $amanah_contact['email'] ) : ?>
						<a class="flex items-center gap-2 text-white/90 transition hover:text-secondaryDark" href="mailto:<?php echo esc_attr( antispambot( $amanah_contact['email'] ) ); ?>">
							<i class="fa-solid fa-envelope text-[11px] text-secondaryDark" aria-hidden="true"></i>
							<?php echo esc_html( antispambot( $amanah_contact['email'] ) ); ?>
						</a>
					<?php endif; ?>

					<?php if ( $amanah_phone['label'] ) : ?>
						<a class="flex items-center gap-2 text-white transition hover:text-secondaryDark" href="<?php echo esc_attr( $amanah_phone['uri'] ); ?>">
							<i class="fa-solid fa-phone text-[11px] text-secondaryDark" aria-hidden="true"></i>
							<?php echo esc_html( $amanah_phone['label'] ); ?>
						</a>
					<?php endif; ?>

					<?php if ( $amanah_socials ) : ?>
						<div class="flex items-center gap-2 border-l border-white/15 pl-5">
							<?php foreach ( $amanah_socials as $amanah_social ) : ?>
								<a class="flex h-7 w-7 items-center justify-center rounded-full border border-white/20 bg-white/[0.06] text-[11px] text-white transition duration-300 hover:-translate-y-0.5 hover:border-leaf hover:bg-leaf hover:text-ink"
									href="<?php echo esc_url( $amanah_social['url'] ); ?>"
									target="_blank"
									rel="noopener noreferrer"
									aria-label="<?php echo esc_attr( sprintf( /* translators: %s: social network. */ __( 'Follow us on %s (opens in a new tab)', 'amanahcareservices' ), $amanah_social['label'] ) ); ?>">
									<i class="fa-brands <?php echo esc_attr( $amanah_social['icon'] ); ?>" aria-hidden="true"></i>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<header id="masthead" class="site-header sticky top-0 z-50">
			<div id="main-header" class="border-b border-[#ece6f6] bg-white/95 backdrop-blur-xl transition-shadow duration-300">
				<div class="container mx-auto px-4 md:px-6">
					<div class="flex min-h-[88px] items-center justify-between gap-4 min-[834px]:min-h-[100px]">
						<a class="amanah-header-logo flex shrink-0 items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img
								src="<?php echo esc_url( amanahcareservices_get_logo_url( 'horizontal' ) ); ?>"
								alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
								width="816"
								height="250"
								class="h-auto max-h-[50px] w-auto sm:max-h-[58px] xl:max-h-[64px]"
								decoding="async">
						</a>

						<nav class="amanah-nav hidden flex-1 justify-center min-[834px]:flex" aria-label="<?php esc_attr_e( 'Primary navigation', 'amanahcareservices' ); ?>">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'container'      => false,
									'menu_id'        => 'primary-menu',
									'fallback_cb'    => 'amanahcareservices_primary_menu_fallback',
								)
							);
							?>
						</nav>

						<div class="amanah-header-actions hidden items-center gap-3 min-[834px]:flex">
							<?php if ( $amanah_phone['label'] ) : ?>
								<a href="<?php echo esc_attr( $amanah_phone['uri'] ); ?>" class="group hidden items-center gap-3 xl:flex">
									<span class="flex h-11 w-11 items-center justify-center rounded-full bg-mint text-secondaryDark transition group-hover:bg-secondary group-hover:text-white">
										<i class="fa-solid fa-phone-volume" aria-hidden="true"></i>
									</span>
									<span class="leading-tight">
										<span class="block text-[10px] font-bold uppercase tracking-[0.16em] text-body/80"><?php esc_html_e( 'Call us', 'amanahcareservices' ); ?></span>
										<span class="block text-sm font-extrabold text-ink transition group-hover:text-primary"><?php echo esc_html( $amanah_phone['label'] ); ?></span>
									</span>
								</a>
							<?php endif; ?>

							<a href="<?php echo esc_url( $amanah_contact['referral_url'] ); ?>"
								class="group relative inline-flex min-h-[50px] items-center justify-center overflow-hidden rounded-md bg-primary px-6 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_14px_32px_rgba(81,31,159,.28)] transition duration-300 hover:-translate-y-0.5 hover:bg-primaryDark hover:shadow-[0_18px_38px_rgba(81,31,159,.36)]">
								<span><?php esc_html_e( 'Make a Referral', 'amanahcareservices' ); ?></span>
								<span class="ml-3 flex items-center">
									<i class="fa-solid fa-arrow-right text-[12px] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
								</span>
								<span class="absolute inset-x-0 bottom-0 h-[3px] origin-left scale-x-0 bg-secondary transition-transform duration-300 group-hover:scale-x-100" aria-hidden="true"></span>
							</a>
						</div>

						<button id="mobile-menu-button"
							class="flex h-11 w-11 items-center justify-center rounded-xl border border-[#e6def5] bg-soft text-primary transition duration-300 hover:border-primary hover:bg-primary hover:text-white aria-expanded:border-primary aria-expanded:bg-primary aria-expanded:text-white aria-expanded:shadow-[0_10px_24px_rgba(81,31,159,.3)] min-[834px]:hidden"
							type="button"
							aria-controls="mobile-menu"
							aria-expanded="false"
							aria-label="<?php esc_attr_e( 'Open menu', 'amanahcareservices' ); ?>">
							<i id="menu-open" class="fa-solid fa-bars-staggered text-lg" aria-hidden="true"></i>
							<i id="menu-close" class="fa-solid fa-xmark hidden text-xl" aria-hidden="true"></i>
						</button>
					</div>
				</div>

				<div id="mobile-menu" class="amanah-mobile-menu hidden border-t border-[#efeaf7] bg-gradient-to-b from-white via-white to-soft shadow-[0_30px_60px_rgba(27,11,58,0.18)] min-[834px]:hidden">
					<div class="px-4 pb-6 pt-5 md:px-8">
						<p class="mb-3 flex items-center gap-3 px-4 text-[10px] font-extrabold uppercase tracking-[0.24em] text-primary/70">
							<span><?php esc_html_e( 'Menu', 'amanahcareservices' ); ?></span>
							<span class="h-px flex-1 bg-gradient-to-r from-lilac/70 to-transparent" aria-hidden="true"></span>
						</p>

						<nav aria-label="<?php esc_attr_e( 'Mobile navigation', 'amanahcareservices' ); ?>">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'container'      => false,
									'menu_id'        => 'mobile-primary-menu',
									'fallback_cb'    => 'amanahcareservices_primary_menu_fallback',
								)
							);
							?>
						</nav>

						<div class="mt-6 grid gap-3 sm:grid-cols-2">
							<a class="group relative flex min-h-[54px] items-center justify-center gap-3 overflow-hidden rounded-xl bg-primary px-6 text-[11px] font-extrabold uppercase tracking-[0.14em] text-white shadow-[0_14px_32px_rgba(81,31,159,.28)] transition duration-300 hover:bg-primaryDark"
								href="<?php echo esc_url( $amanah_contact['referral_url'] ); ?>">
								<?php esc_html_e( 'Make a Referral', 'amanahcareservices' ); ?>
								<i class="fa-solid fa-arrow-right text-[11px] transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
								<span class="absolute inset-x-0 bottom-0 h-[3px] bg-gradient-to-r from-secondary to-leaf" aria-hidden="true"></span>
							</a>
							<?php
							$amanah_call_href  = $amanah_phone['label'] ? $amanah_phone['uri'] : $amanah_contact['cta_url'];
							$amanah_call_icon  = $amanah_phone['label'] ? 'fa-phone-volume' : 'fa-comments';
							$amanah_call_eye   = $amanah_phone['label'] ? __( 'Talk to our team', 'amanahcareservices' ) : __( 'Get in touch', 'amanahcareservices' );
							$amanah_call_label = $amanah_phone['label'] ? $amanah_phone['label'] : __( 'Contact Us', 'amanahcareservices' );
							?>
							<a class="group flex min-h-[54px] items-center gap-3.5 rounded-xl border border-[#e6def5] bg-white py-2.5 pl-2.5 pr-4 shadow-[0_8px_24px_rgba(27,11,58,0.06)] transition duration-300 hover:border-secondary/40"
								href="<?php echo esc_attr( $amanah_call_href ); ?>">
								<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-mint text-secondaryDark transition duration-300 group-hover:bg-secondary group-hover:text-white">
									<i class="fa-solid <?php echo esc_attr( $amanah_call_icon ); ?>" aria-hidden="true"></i>
								</span>
								<span class="min-w-0 flex-1 leading-tight">
									<span class="block text-[10px] font-bold uppercase tracking-[0.16em] text-body/80"><?php echo esc_html( $amanah_call_eye ); ?></span>
									<span class="mt-0.5 block text-[15px] font-extrabold text-ink"><?php echo esc_html( $amanah_call_label ); ?></span>
								</span>
								<i class="fa-solid fa-chevron-right text-[10px] text-[#bfb0dd] transition group-hover:translate-x-0.5 group-hover:text-secondaryDark" aria-hidden="true"></i>
							</a>
						</div>

						<?php if ( $amanah_contact['email'] || $amanah_socials ) : ?>
							<div class="relative mt-5 overflow-hidden rounded-2xl bg-gradient-to-br from-ink via-[#2a0f5a] to-primaryDark p-5 text-white">
								<span class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-secondary/25 blur-3xl" aria-hidden="true"></span>
								<p class="relative flex items-center gap-2 font-display text-[15px] tracking-wide text-white/95">
									<i class="fa-solid fa-heart text-[11px] text-secondaryDark" aria-hidden="true"></i>
									<?php esc_html_e( 'Amanah Means Trust. We Honour It.', 'amanahcareservices' ); ?>
								</p>
								<?php if ( $amanah_contact['email'] ) : ?>
									<a class="relative mt-4 flex items-center gap-3 text-sm font-semibold text-white/85 transition hover:text-secondaryDark" href="mailto:<?php echo esc_attr( antispambot( $amanah_contact['email'] ) ); ?>">
										<span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white/10 text-secondaryDark">
											<i class="fa-solid fa-envelope text-[12px]" aria-hidden="true"></i>
										</span>
										<span class="min-w-0 break-all"><?php echo esc_html( antispambot( $amanah_contact['email'] ) ); ?></span>
									</a>
								<?php endif; ?>
								<?php if ( $amanah_socials ) : ?>
									<div class="relative mt-4 flex items-center gap-2 border-t border-white/10 pt-4">
										<span class="mr-auto text-[10px] font-bold uppercase tracking-[0.2em] text-white/60"><?php esc_html_e( 'Follow us', 'amanahcareservices' ); ?></span>
										<?php foreach ( $amanah_socials as $amanah_social ) : ?>
											<a class="flex h-9 w-9 items-center justify-center rounded-full border border-white/20 bg-white/[0.06] text-white transition duration-300 hover:border-leaf hover:bg-leaf hover:text-ink"
												href="<?php echo esc_url( $amanah_social['url'] ); ?>"
												target="_blank"
												rel="noopener noreferrer"
												aria-label="<?php echo esc_attr( sprintf( /* translators: %s: social network. */ __( 'Follow us on %s (opens in a new tab)', 'amanahcareservices' ), $amanah_social['label'] ) ); ?>">
												<i class="fa-brands <?php echo esc_attr( $amanah_social['icon'] ); ?> text-sm" aria-hidden="true"></i>
											</a>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</header>
