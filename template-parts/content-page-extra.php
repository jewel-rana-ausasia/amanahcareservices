<?php
/**
 * Outputs any content added in the page editor below a designed template.
 *
 * @package amanahcareservices
 */

while ( have_posts() ) :
	the_post();

	if ( '' === trim( (string) get_the_content() ) ) {
		continue;
	}
	?>
	<section class="container mx-auto px-5 py-16 md:px-8 lg:px-12">
		<div class="entry-content mx-auto max-w-4xl text-lg leading-8 text-body">
			<?php the_content(); ?>
		</div>
	</section>
	<?php
endwhile;
