<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package contempo
 */

get_header(); ?>

<div class="container inset">
  <div class="page-head page-head__blog">
    <?php
      $hed = contempo_get_option( 'press_page_hed' );
      $dek = contempo_get_option( 'press_page_dek' );
    ?>

  	<h1 class="page-title  animate-pop-in"><?php echo esc_html($hed); ?></h1>
    <h3 class="archive-description animate-pop-in"><?php echo esc_html($dek); ?></h3>

  </div>

  <?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'blog' );

		endwhile; // End of the loop.
	?>

</div>

<?php get_footer(); ?>
