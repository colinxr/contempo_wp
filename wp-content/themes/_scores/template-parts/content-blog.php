<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package contempo
 */

?>

<?php
	$link_checkbox = get_post_meta( get_the_ID(), '_post_link_checkbox', true );
	$link_url 		 = get_post_meta( get_the_ID(), '_post_url', true );
	?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php
			if ( is_single() ) : ?>
				<a href="<?php echo get_post_type_archive_link( get_post_type() ); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
				<?php the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				echo '<p class="post-meta">' . get_the_date() . '</p>';
				the_title( '<h2 class="entry-title'. ( $link_checkbox ? ' post-link' : '' ) .'"><a href="' . ( $link_checkbox && $link_url ? esc_html($link_url) . '" target="_blank"' : esc_url( get_permalink() ) ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
		<div class="entry-dek">
			<h3><?php echo get_the_excerpt(); ?></h3>
		</div><!-- .entry-dek -->
	</header><!-- .entry-header -->

	<?php if ( is_single() ) : ?>
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'contempo' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
<?php get_footer();?>
