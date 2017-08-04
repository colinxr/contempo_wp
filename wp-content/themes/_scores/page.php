<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package contempo
 */

get_header(); ?>

	<div class="wrapper">
		<?php
			while ( have_posts() ) : the_post();

				if ( is_page( 'contract-publishing' ) ) {

					get_template_part( 'template-parts/content', 'contract' );

				} else if ( is_page( 'contact' ) ) {

					get_template_part( 'template-parts/content', 'contact' );

				}

			endwhile; // End of the loop.
		?>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
