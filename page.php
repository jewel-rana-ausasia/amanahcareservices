<?php
/**
 * The template for displaying all pages.
 *
 * Uses the common page banner followed by the page content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amanahcareservices
 */

get_header();
?>

	<main id="primary" class="site-main bg-white">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'banner' );
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'container mx-auto px-5 py-16 md:px-8 lg:px-12 lg:py-24' ); ?>>
				<div class="entry-content mx-auto max-w-4xl text-lg leading-8 text-body">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'amanahcareservices' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			</article>

			<?php
			if ( comments_open() || get_comments_number() ) :
				echo '<div class="container mx-auto max-w-4xl px-5 pb-16">';
				comments_template();
				echo '</div>';
			endif;

		endwhile;
		?>

	</main><!-- #main -->

<?php
get_footer();
