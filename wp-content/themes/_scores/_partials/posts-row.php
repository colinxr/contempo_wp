<div class="card-inline <?php echo ( is_front_page() ? 'card__case' : 'card__case--page' );?> ">
	<div class="card__header">
		<a href="<?php the_permalink() ?>">
			<?php the_post_thumbnail( ' medium '); ?>
		</a>
	</div>

	<div class="card-inline__info">
		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<?php
			$categories = get_the_category();

			if ( ! empty( $categories ) ) {
				if( in_category('sharp-magazine') && in_category('s-magazine') ){
					echo "<h4>S/ & Sharp Magazine</h4>";
				} else {
					echo "<h4>" . esc_html( $categories[0]->name ) . "</h4>";
				}
			}
		?>
		<p><?php echo get_the_excerpt(); ?></p>
		<a href="<?php the_permalink() ?>">Read More</a>
	</div>
</div>
