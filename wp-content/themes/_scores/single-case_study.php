<?php
/**
 * Template Name: Single Case Studies
 * Template Post Type: case_study
 *
 * @package contempo
 */

get_header(); ?>

<div class="post post__single">
	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_format() );

	endwhile; // End of the loop.
	?>
</div>
<?php if ( is_single() ) : ?>

	<?php cmb2_output_images( '_case_file_list', 'case-study' ); ?>

	<div class="block cases cases--page">
		<div class="cases__row cases__row--page">
			<div class="container">
				<?php
					$args = array(
						'post_type' => 'case_study',
						'showposts' => 3,
						'orderby'		=> 'rand',
						'exclude'		=> [$post->ID, 100, 98] // excludes current post + the two Contract Publishing Case Studies
								);

					$posts = get_posts( $args );
					foreach( $posts as $post ){
						include( get_template_directory() . '/_partials/posts-row.php' );
					}
				?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php

get_footer();
