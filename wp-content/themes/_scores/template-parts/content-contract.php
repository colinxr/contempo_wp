<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package contempo
 */

?>

<?php
	$hed 						 = get_post_meta( get_the_ID(), '_contract_page-hed', true );
	$dek 						 = get_post_meta( get_the_ID(), '_contract_page-dek', true );
	$jumbotron 			 = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_contract_jumbotron-page_id', 1), 'jumbotron-page' ); //uses attachment_image_src in order to use as inline CSS background-image url on line 66;?>

<div class="page-head page-head__contract">
	<div class="container inset">

		<h1 class="animate-pop-in"><?php echo esc_html( $hed ); ?></h1>
		<h3 class="animate-pop-in"><?php echo esc_html( $dek ); ?></h3>

	</div>
</div>
<?php if ( $jumbotron ) : ?>
<div class="screen">
	<?php echo '<div class="jumbotron jumbotron__page jumbotron__page--" style="
	background: url(' . $jumbotron[0] . ') center no-repeat; background-size: cover; ">
	</div>' ;?>
</div>
<?php endif; ?>


<div class="block context context__contract">
	<div class="container">

		<div class="inset">
			<h2>On Time, On Message, On Budget</h2>

			<div class="grid">
				<div class="box">
					<h3>High Level Executions</h3>
					<p>Our award-winning writers, designer, developers & videographers are continually crafting the ultimate in sophistication and luxury, for the country’s fastest growing lifestyle brands.</p>
				</div>

				<div class="box">
					<h3>Broad Capabilities</h3>
					<p>We’re crafting exclusive parties and events for Toronto’s most premium audiences. Activate your brand for 1000s of engaged visitors.</p>
				</div>

				<div class="box">
					<h3>Adaptive Process</h3>
					<p>Our custom content publications help brands like Audi & Volkswagen speak directly to their loyal and engaged audiences. We craft bespoke premium solutions for their custom content needs.</p>
				</div>

				<div class="box">
					<h3>Worldclass Digital Workflow</h3>
					<p>We’re crafting exclusive parties and events for Toronto’s most premium audiences. Activate your brand for 1000s of engaged visitors.</p>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="block cases cases--page">
	<div class="cases__row cases__row--page">
		<div class="container">
			<?php

				$brand = get_post_field( 'post_name', get_post() ); // get brand slug to match with case studies category, which are sorted by Brands.

				$args = array(
					'post_type' => 'case_study',
					'showposts' => 3,
					'category_name'	=> $brand, // only display case studies associated with this brand
							);

				$posts = get_posts( $args );
				foreach( $posts as $post ){
					include( get_template_directory() . '/_partials/posts-row.php' );
				}
			?>
		</div>
	</div>
</div>

<div class="block our-approach">
	<div class="container inset">

		<h2>How We Work</h2>

		<div class="grid grid--our-approach">
			<div class="our-approach__item">
				<h3>Understand Your Vision</h3>
				<p>We understand the HNW audience and customer. Difficult to market to, discerning, elusive and able to buy virtually anything they want, the HNW individual demands the very best. COntempo’s experience content team has a deep understanding of the brands and services that cater to these audiences.</p>
			</div>

			<div class="our-approach__item">
				<h3>Add Our Unique Expertise</h3>
				<p>We create more content for affluent readers than any other boutique publisher in Canada. Donec non bibendum magna, quis congue turpis. Etiam molestie turpis quis placerat iaculis. Donec non bibendum magna, quis congue turpis.</p>
			</div>

			<div class="our-approach__item">
				<h3>Execute at World-Class Level</h3>
				<p>Crafting a product that is credible as a luxury magazine enjoyable to read and effective as a marketing tool is challenging and requires a shared vision and high degree of trust. Our principals are driven by excellence and always available for consultation.</p>
			</div>

			<div class="our-approach__plus">
				<p>We create more content for affluent readers than any other boutique publisher in Canada.</p>
			</div>

			<div class="our-approach__plus">
				<p>We have 27 full-time employees concentrating on premium and luxury content and advertising.</p>
			</div>

			<div class="our-approach__plus">
				<p>Contempo Media is the recipient of numerous national magazine and custom publishing awards.</p>
			</div>
		</div>

	</div>
</div>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
