<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package contempo
 */

get_header(); ?>

<div class="page-head page-head__case-studies">
	<div class="container inset">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					$hed = contempo_get_option( 'case_study_hed' );
					$dek = contempo_get_option( 'case_study_dek' );
				?>
				<h1 class="page-title animate-pop-in"><?php echo esc_html($hed);?></h1>
				<h3 class="archive-description animate-pop-in"><?php echo esc_html($dek);?></h3>
			</header><!-- .page-header -->
		<? endif;?>
	</div><!-- .container -->
</div><!-- .page-head -->

<div class="block cases">
	<div class="cases__row cases__row--archive">
		<div class="container">

			<?php
				$args = array(
					'post_type' => 'case_study',
					'post__not_in' 	=> array(98, 100) // Excludes Custom Publishing Titles from case study array.
				);

				$query = new WP_Query( $args );

				if ( $query->have_posts() ) {

				/* Start the Loop */
				while ( $query->have_posts() ) : $query->the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( '_partials/posts-row', get_post_format() );

				endwhile;
				} else {
					get_template_part( 'template-parts/content', 'none' );
				}
			?>
		</div> <!-- end of .container -->
	</div> <!-- end of .cases__row--digital -->
</div> <!-- end of .block .case -->
<?php get_template_part('/_partials/word-carousel') ; ?>
<?php get_footer(); ?>
