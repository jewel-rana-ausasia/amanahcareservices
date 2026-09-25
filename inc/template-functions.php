<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package amanahcareservices
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function amanahcareservices_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'amanahcareservices_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function amanahcareservices_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'amanahcareservices_pingback_header' );

/**
 * Default navigation links used until a menu is assigned to a location.
 *
 * @return array List of array( 'label', 'url' ).
 */
function amanahcareservices_default_nav_links() {
	return array(
		array( 'label' => __( 'Home', 'amanahcareservices' ), 'url' => home_url( '/' ) ),
		array( 'label' => __( 'About Us', 'amanahcareservices' ), 'url' => home_url( '/about-us/' ) ),
		array( 'label' => __( 'Services', 'amanahcareservices' ), 'url' => home_url( '/services/' ) ),
		array( 'label' => __( 'NDIS', 'amanahcareservices' ), 'url' => home_url( '/ndis/' ) ),
		array( 'label' => __( 'Contact Us', 'amanahcareservices' ), 'url' => amanahcareservices_get_contact()['cta_url'] ),
	);
}

/**
 * Primary menu fallback: prints the default links in the same markup as wp_nav_menu().
 *
 * @param array $args wp_nav_menu() arguments.
 */
function amanahcareservices_primary_menu_fallback( $args ) {
	$current = trailingslashit( home_url( add_query_arg( array(), $GLOBALS['wp']->request ) ) );

	printf( '<ul id="%s" class="menu">', esc_attr( $args['menu_id'] ) );

	foreach ( amanahcareservices_default_nav_links() as $link ) {
		$is_current = trailingslashit( $link['url'] ) === $current;
		printf(
			'<li class="menu-item%1$s"><a href="%2$s"%3$s>%4$s</a></li>',
			$is_current ? ' current-menu-item' : '',
			esc_url( $link['url'] ),
			$is_current ? ' aria-current="page"' : '',
			esc_html( $link['label'] )
		);
	}

	echo '</ul>';
}

/**
 * Top-level links from a menu location, falling back to a default list.
 *
 * @param string $location Menu location slug.
 * @param array  $fallback List of array( 'label', 'url' ).
 * @param int    $limit    Maximum links returned.
 * @return array
 */
function amanahcareservices_get_menu_links( $location, $fallback, $limit = 8 ) {
	$locations = get_nav_menu_locations();
	$links     = array();

	if ( ! empty( $locations[ $location ] ) ) {
		$items = wp_get_nav_menu_items( $locations[ $location ] );

		foreach ( (array) $items as $item ) {
			if ( '0' !== (string) $item->menu_item_parent ) {
				continue;
			}

			$links[] = array( 'label' => $item->title, 'url' => $item->url );
		}
	}

	return array_slice( $links ? $links : $fallback, 0, $limit );
}
