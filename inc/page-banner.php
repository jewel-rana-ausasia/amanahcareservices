<?php
/**
 * Per-page banner image.
 *
 * Adds a "Page Banner Image" box to the page editor so every page can have its
 * own banner photo. Falls back to the page's featured image when none is set.
 *
 * @package amanahcareservices
 */

/**
 * Meta key that stores the banner attachment ID.
 */
define( 'AMANAHCARESERVICES_BANNER_META', '_amanahcareservices_banner_image_id' );

/**
 * Get the banner image attachment ID for a post.
 *
 * @param int|null $post_id Post ID. Defaults to the current post.
 * @return int Attachment ID, or 0 when none.
 */
function amanahcareservices_get_banner_image_id( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : get_the_ID();

	if ( ! $post_id ) {
		return 0;
	}

	$image_id = (int) get_post_meta( $post_id, AMANAHCARESERVICES_BANNER_META, true );

	if ( $image_id && wp_attachment_is_image( $image_id ) ) {
		return $image_id;
	}

	return (int) get_post_thumbnail_id( $post_id );
}

/**
 * Register the banner meta box on pages and posts.
 */
function amanahcareservices_add_banner_meta_box() {
	add_meta_box(
		'amanahcareservices-page-banner',
		__( 'Page Banner Image', 'amanahcareservices' ),
		'amanahcareservices_render_banner_meta_box',
		array( 'page', 'post' ),
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'amanahcareservices_add_banner_meta_box' );

/**
 * Render the banner meta box.
 *
 * @param WP_Post $post Current post.
 */
function amanahcareservices_render_banner_meta_box( $post ) {
	wp_nonce_field( 'amanahcareservices_save_banner', 'amanahcareservices_banner_nonce' );

	$image_id = (int) get_post_meta( $post->ID, AMANAHCARESERVICES_BANNER_META, true );
	$preview  = $image_id ? wp_get_attachment_image_url( $image_id, 'medium' ) : '';
	?>
	<div class="amanah-banner-field">
		<input type="hidden" name="amanahcareservices_banner_image_id" class="amanah-banner-field__id" value="<?php echo esc_attr( $image_id ? $image_id : '' ); ?>">
		<div class="amanah-banner-field__preview" style="margin-bottom:10px;<?php echo $preview ? '' : 'display:none;'; ?>">
			<img src="<?php echo esc_url( $preview ); ?>" alt="" style="display:block;width:100%;height:auto;border-radius:4px;">
		</div>
		<p style="margin:0;">
			<button type="button" class="button amanah-banner-field__select">
				<?php echo $image_id ? esc_html__( 'Change banner image', 'amanahcareservices' ) : esc_html__( 'Set banner image', 'amanahcareservices' ); ?>
			</button>
			<button type="button" class="button-link amanah-banner-field__remove" style="margin-left:8px;color:#b32d2e;<?php echo $image_id ? '' : 'display:none;'; ?>">
				<?php esc_html_e( 'Remove', 'amanahcareservices' ); ?>
			</button>
		</p>
		<p class="description" style="margin-top:8px;">
			<?php esc_html_e( 'Shown behind the page title. Recommended size: 1920 × 500px. Larger images are cropped to fit. Falls back to the featured image when empty.', 'amanahcareservices' ); ?>
		</p>
	</div>
	<?php
}

/**
 * Save the banner image ID.
 *
 * @param int $post_id Post ID.
 */
function amanahcareservices_save_banner_meta( $post_id ) {
	if ( ! isset( $_POST['amanahcareservices_banner_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['amanahcareservices_banner_nonce'] ) ), 'amanahcareservices_save_banner' ) ) {
		return;
	}

	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$image_id = isset( $_POST['amanahcareservices_banner_image_id'] ) ? absint( $_POST['amanahcareservices_banner_image_id'] ) : 0;

	if ( $image_id && wp_attachment_is_image( $image_id ) ) {
		update_post_meta( $post_id, AMANAHCARESERVICES_BANNER_META, $image_id );
	} else {
		delete_post_meta( $post_id, AMANAHCARESERVICES_BANNER_META );
	}
}
add_action( 'save_post', 'amanahcareservices_save_banner_meta' );

/**
 * Load the media picker on the page/post editor.
 *
 * @param string $hook Current admin page.
 */
function amanahcareservices_banner_admin_scripts( $hook ) {
	if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || ! in_array( $screen->post_type, array( 'page', 'post' ), true ) ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_script(
		'amanahcareservices-banner-admin',
		get_template_directory_uri() . '/js/banner-admin.js',
		array( 'jquery' ),
		_S_VERSION,
		true
	);
	wp_localize_script(
		'amanahcareservices-banner-admin',
		'amanahBannerAdmin',
		array(
			'title'  => __( 'Select banner image', 'amanahcareservices' ),
			'button' => __( 'Use as banner', 'amanahcareservices' ),
			'set'    => __( 'Set banner image', 'amanahcareservices' ),
			'change' => __( 'Change banner image', 'amanahcareservices' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'amanahcareservices_banner_admin_scripts' );
