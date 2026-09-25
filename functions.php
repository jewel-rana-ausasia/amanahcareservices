<?php
/**
 * amanahcareservices functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package amanahcareservices
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function amanahcareservices_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on amanahcareservices, use a find and replace
		* to change 'amanahcareservices' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'amanahcareservices', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1'             => esc_html__( 'Primary', 'amanahcareservices' ),
			'footer-quick-links' => esc_html__( 'Footer Quick Links', 'amanahcareservices' ),
			'footer-services'    => esc_html__( 'Footer Services', 'amanahcareservices' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'amanahcareservices_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'amanahcareservices_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function amanahcareservices_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'amanahcareservices_content_width', 640 );
}
add_action( 'after_setup_theme', 'amanahcareservices_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function amanahcareservices_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'amanahcareservices' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'amanahcareservices' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'amanahcareservices_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function amanahcareservices_scripts() {
	wp_enqueue_style( 'amanahcareservices-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'amanahcareservices-style', 'rtl', 'replace' );

	$site_script = get_template_directory() . '/js/site.js';
	wp_enqueue_script(
		'amanahcareservices-site',
		get_template_directory_uri() . '/js/site.js',
		array(),
		file_exists( $site_script ) ? (string) filemtime( $site_script ) : _S_VERSION,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'amanahcareservices_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
/**
 * Contact, social, logo and service data shared by all templates.
 */
require get_template_directory() . '/inc/theme-data.php';

/**
 * Built-in Contact Us form handler.
 */
require get_template_directory() . '/inc/contact-form.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Use the brand heart mark as the favicon until a Site Icon is uploaded.
 */
function amanahcareservices_fallback_favicon() {
	if ( has_site_icon() ) {
		return;
	}

	printf( '<link rel="icon" type="image/png" href="%s">' . "\n", esc_url( amanahcareservices_get_logo_url( 'mark' ) ) );
}
add_action( 'wp_head', 'amanahcareservices_fallback_favicon', 2 );

/**
 * On theme activation, make sure a "Home" page using the Home template exists
 * and is set as the static front page. Existing front-page settings are kept.
 */
function amanahcareservices_setup_front_page() {
	if ( 'page' === get_option( 'show_on_front' ) && get_option( 'page_on_front' ) ) {
		return;
	}

	$home = get_page_by_path( 'home' );

	if ( ! $home instanceof WP_Post ) {
		$home_id = wp_insert_post(
			array(
				'post_title'  => 'Home',
				'post_name'   => 'home',
				'post_type'   => 'page',
				'post_status' => 'publish',
			)
		);
	} else {
		$home_id = $home->ID;
	}

	if ( ! $home_id || is_wp_error( $home_id ) ) {
		return;
	}

	update_post_meta( $home_id, '_wp_page_template', 'page-home.php' );
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', (int) $home_id );
}
add_action( 'after_switch_theme', 'amanahcareservices_setup_front_page' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

