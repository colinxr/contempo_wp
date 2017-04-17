<div class="block cases">

	<div class="cases--row cases--row__digital">

		<div class="container">

			<section class="scroll">

				<div class="cases--row__col cases--intro">

					<h2>Digital</h2>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consequat eros non rutrum egestas. Fusce bibendum augue id metus vestibulum, sed mattis turpis congue. </p>

				</div>

				<?php
					query_posts(array(
						'post_type' => 'case_study',
						'showposts' => 3,
									'cat' => 'digital'
					) );
				?>

				<?php while (have_posts()) : the_post(); ?>

					<div class="cases--row__col card--inline card--case">
						<div class="card__header">

							<?php
								$image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_brand_print_media_kit_id', 1 ), 'medium' );
							?>
							<img src="<?php the_post_thumbnail(); ?>"
							     srcset="<?php the_post_thumbnail(); ?>"
							     sizes="(max-width: 50em) 87vw, 680px" class="card--case__img">
						</div>

						<div class="card--inline__info">
							<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							<?php
									$caseBrand = get_post_meta($post->ID,'_case_brand',true);

									echo "<h4>" . $caseBrand . "</h4>";
								?>
							<p><?php echo get_the_excerpt(); ?></p>
							<a href="<?php the_permalink() ?>">Read More</a>
						</div>
					</div>

				<?php
					endwhile;

					 wp_reset_query();
				?>

			</section> <!-- end of section -->

		</div> <!-- end of .container -->

	</div> <!-- end of .cases--row__digital -->

</div> <!-- end of .block .cases -->
