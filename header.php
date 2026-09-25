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
				extend: {
					colors: {
						primary: '#511F9F',
						primaryDark: '#3A1575',
						ink: '#1B0B3A',
						soft: '#F6F2FD',
						lilac: '#C9B6F0',
						secondary: '#2EA22A',
						secondaryDark: '#1E7A1B',
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

		/* Mobile navigation */
		.amanah-mobile-menu {
			max-height: calc(100vh - 5rem);
			overflow-y: auto;
			overscroll-behavior: contain;
		}

		.amanah-mobile-menu ul {
			margin: 0;
			padding: 0;
			list-style: none;
		}

		.amanah-mobile-menu #mobile-primary-menu>li+li {
			border-top: 1px solid #efeaf7;
		}

		.amanah-mobile-menu li {
			position: relative;
		}

		.amanah-mobile-menu li a {
			display: block;
			padding: 0.95rem 3.25rem 0.95rem 0.25rem;
			color: #1b0b3a;
			font-weight: 700;
			transition: color 0.2s ease, padding 0.2s ease;
		}

		.amanah-mobile-menu li a:hover,
		.amanah-mobile-menu li.current-menu-item>a,
		.amanah-mobile-menu li.current_page_item>a {
			padding-left: 0.6rem;
			color: #511f9f;
		}

		.amanah-mobile-menu .submenu-toggle {
			position: absolute;
			top: 0.5rem;
			right: 0;
			display: inline-flex;
			height: 2.5rem;
			width: 2.5rem;
			align-items: center;
			justify-content: center;
			border: 1px solid #e6def5;
			border-radius: 0.75rem;
			background: #f6f2fd;
			color: #511f9f;
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
			margin: 0 0 0.75rem 0.35rem;
			padding-left: 0.85rem;
			border-left: 2px solid rgba(46, 162, 42, 0.35);
		}

		.amanah-mobile-menu li.submenu-open>.sub-menu,
		.amanah-mobile-menu li.submenu-open>.children {
			display: block;
		}

		.amanah-mobile-menu .sub-menu a,
		.amanah-mobile-menu .children a {
			padding-top: 0.65rem;
			padding-bottom: 0.65rem;
			font-size: 0.92rem;
			font-weight: 600;
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
						<i class="fa-solid fa-heart text-[11px] text-leaf" aria-hidden="true"></i>
						<span class="font-display text-[13px] tracking-wide"><?php esc_html_e( 'Quality Care You Can Trust', 'amanahcareservices' ); ?></span>
					</p>
					<?php if ( $amanah_contact['service_area'] ) : ?>
						<p class="hidden items-center gap-2 border-l border-white/15 pl-5 text-white/80 lg:flex">
							<i class="fa-solid fa-location-dot text-[11px] text-leaf" aria-hidden="true"></i>
							<?php echo esc_html( $amanah_contact['service_area'] ); ?>
						</p>
					<?php elseif ( $amanah_contact['business_hours'] ) : ?>
						<p class="hidden items-center gap-2 border-l border-white/15 pl-5 text-white/80 lg:flex">
							<i class="fa-regular fa-clock text-[11px] text-leaf" aria-hidden="true"></i>
							<?php echo esc_html( strtok( $amanah_contact['business_hours'], "\n" ) ); ?>
						</p>
					<?php endif; ?>
				</div>

				<div class="flex items-center gap-5">
					<?php if ( $amanah_contact['email'] ) : ?>
						<a class="flex items-center gap-2 text-white/90 transition hover:text-leaf" href="mailto:<?php echo esc_attr( antispambot( $amanah_contact['email'] ) ); ?>">
							<i class="fa-solid fa-envelope text-[11px] text-leaf" aria-hidden="true"></i>
							<?php echo esc_html( antispambot( $amanah_contact['email'] ) ); ?>
						</a>
					<?php endif; ?>

					<?php if ( $amanah_phone['label'] ) : ?>
						<a class="flex items-center gap-2 text-white transition hover:text-leaf" href="<?php echo esc_attr( $amanah_phone['uri'] ); ?>">
							<i class="fa-solid fa-phone text-[11px] text-leaf" aria-hidden="true"></i>
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
					<div class="flex min-h-[88px] items-center justify-between gap-4 lg:min-h-[100px]">
						<a class="amanah-header-logo flex shrink-0 items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img
								src="<?php echo esc_url( amanahcareservices_get_logo_url( 'horizontal' ) ); ?>"
								alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
								width="816"
								height="250"
								class="h-auto max-h-[50px] w-auto sm:max-h-[58px] xl:max-h-[64px]"
								decoding="async">
						</a>

						<nav class="amanah-nav hidden flex-1 justify-center lg:flex" aria-label="<?php esc_attr_e( 'Primary navigation', 'amanahcareservices' ); ?>">
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

						<div class="hidden items-center gap-3 lg:flex">
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
							class="flex h-11 w-11 items-center justify-center rounded-xl border border-[#e6def5] bg-soft text-primary transition hover:bg-primary hover:text-white lg:hidden"
							type="button"
							aria-controls="mobile-menu"
							aria-expanded="false"
							aria-label="<?php esc_attr_e( 'Open menu', 'amanahcareservices' ); ?>">
							<i id="menu-open" class="fa-solid fa-bars-staggered text-lg" aria-hidden="true"></i>
							<i id="menu-close" class="fa-solid fa-xmark hidden text-xl" aria-hidden="true"></i>
						</button>
					</div>
				</div>

				<div id="mobile-menu" class="amanah-mobile-menu hidden border-t border-[#efeaf7] bg-white shadow-[0_24px_50px_rgba(27,11,58,0.14)] lg:hidden">
					<div class="space-y-6 px-5 py-6 md:px-8">
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

						<div class="grid gap-3 sm:grid-cols-2">
							<a class="flex min-h-[50px] items-center justify-center gap-3 rounded-md bg-primary text-[11px] font-extrabold uppercase tracking-[0.14em] text-white shadow-lg shadow-primary/20 transition hover:bg-primaryDark"
								href="<?php echo esc_url( $amanah_contact['referral_url'] ); ?>">
								<?php esc_html_e( 'Make a Referral', 'amanahcareservices' ); ?>
								<i class="fa-solid fa-arrow-right text-[10px]" aria-hidden="true"></i>
							</a>
							<?php if ( $amanah_phone['label'] ) : ?>
								<a class="flex items-center justify-center gap-3 rounded-full border border-secondary/30 bg-mint py-4 text-sm font-extrabold text-secondaryDark"
									href="<?php echo esc_attr( $amanah_phone['uri'] ); ?>">
									<i class="fa-solid fa-phone" aria-hidden="true"></i>
									<?php echo esc_html( $amanah_phone['label'] ); ?>
								</a>
							<?php else : ?>
								<a class="flex items-center justify-center gap-3 rounded-full border border-secondary/30 bg-mint py-4 text-sm font-extrabold text-secondaryDark"
									href="<?php echo esc_url( $amanah_contact['cta_url'] ); ?>">
									<i class="fa-solid fa-comments" aria-hidden="true"></i>
									<?php esc_html_e( 'Contact Us', 'amanahcareservices' ); ?>
								</a>
							<?php endif; ?>
						</div>

						<?php if ( $amanah_contact['email'] || $amanah_socials ) : ?>
							<div class="flex flex-wrap items-center justify-between gap-4 border-t border-[#efeaf7] pt-5">
								<?php if ( $amanah_contact['email'] ) : ?>
									<a class="flex items-center gap-2 text-sm font-semibold text-body" href="mailto:<?php echo esc_attr( antispambot( $amanah_contact['email'] ) ); ?>">
										<i class="fa-solid fa-envelope text-primary" aria-hidden="true"></i>
										<?php echo esc_html( antispambot( $amanah_contact['email'] ) ); ?>
									</a>
								<?php endif; ?>
								<?php if ( $amanah_socials ) : ?>
									<div class="flex gap-2">
										<?php foreach ( $amanah_socials as $amanah_social ) : ?>
											<a class="flex h-9 w-9 items-center justify-center rounded-full bg-soft text-primary transition hover:bg-primary hover:text-white"
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
