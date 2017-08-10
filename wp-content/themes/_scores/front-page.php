<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package contempo
 */

get_header(); ?>

<?php
	$hed = contempo_get_option( 'home_jumbotron_hed' );
	$dek = contempo_get_option( 'home_jumbotron_dek' );
	$img = contempo_get_option( 'home_jumbotron_img' );
?>

<div class="jumbotron jumbotron__home" style="background: url('<?php echo esc_html($img); ?>') no-repeat center;">

	<div class="container">
		<div class="jumbotron__hed">
			<h1 class="animate-pop-in"><?php echo esc_html($hed); ?></h1>
			<h3 class="animate-pop-in"><?php echo esc_html($dek); ?></h3>
			<div class="cta animate-pop-in">
		   	<a class="btn btn-secondary__jumbo" href="http://contempomedia.wpengine.com/contract-publishing/" role="button">Contract Publishing</a>
		   	<a class="btn" href="https://contempomedia.wpengine.com/case-studies/" role="button">See Our Work</a>
		  </div>
		</div>

  </div>

  <div class="arrow bounce">
  	<i class="fa fa-arrow-down fa-2x" href="#"></i>
	</div>

</div>

<div class="block about">
	<div class="container">

		<div class="about__hed scroll">
			<?php
				$about_hed = contempo_get_option( 'home_about-us_hed' );
				?>
			<h5>What We Do</h5>
			<h2 class="block-hed"><?php echo esc_html($about_hed); ?></h2>
		</div>

		<div class="about__copy scroll">
			<div class="about__copy-item">
				<strong>Consumer</strong>
				<p>Our award-winning writers, designers & videographers are continually crafting the ultimate in sophistication and luxury, for the country’s fastest growing lifestyle brands. </p>
			</div>

			<div class="about__copy-item">
				<strong>Custom Content</strong>
				<p>Our custom content publications help brands speak directly to their loyal and engaged audiences. We craft bespoke premium solutions for their custom content needs.</p>
			</div>

			<div class="about__copy-item">
				<strong>Event Management</strong>
				<p>We’re crafting exclusive parties and events for Toronto’s most premium audiences. Activate your brand for 1000s of engaged visitors.</p>
			</div>
		</div>

		<div class="services scroll">

			<div class="service" id="content">
				<svg class="icon monitor"><use xlink:href="#monitor"></use></svg>
				<h4>Content</h4>
			</div>

			<div class="service" id="design">
				<svg class="icon layers"><use xlink:href="#layers"></use></svg>
				<h4>Design</h4>
			</div>

			<div class="service" id="mobile">
				<svg class="icon message-square"><use xlink:href="#message-square"></use></svg>
				<h4>Mobile</h4>
			</div>

			<div class="service" id="events">
				<svg class="icon calendar"><use xlink:href="#calendar"></use></svg>
				<h4>Events</h4>
			</div>

			<div class="service" id="consumer">
				<svg class="icon user-check"><use xlink:href="#user-check"></use></svg>
				<h4>Consumer</h4>
			</div>

			<div class="service" id="pr">
				<svg class="icon at-sign"><use xlink:href="#at-sign"></use></svg>
				<h4>PR</h4>
			</div>

			<div class="service" id="social">
				<svg class="icon thumbs-up"><use xlink:href="#thumbs-up"></use></svg>
				<h4>Social</h4>
			</div>

			<div class="service" id="production">
				<svg class="icon clipboard"><use xlink:href="#clipboard"></use></svg>
				<h4>Production</h4>
			</div>

			<div class="service" id="events">
				<svg class="icon calendar"><use xlink:href="#calendar"></use></svg>
				<h4>Events</h4>
			</div>

			<div class="service" id="consumer">
				<svg class="icon user-check"><use xlink:href="#user-check"></use></svg>
				<h4>Consumer</h4>
			</div>
		</div>

		<a class="btn btn-secondary block-cta" href="#contactForm">How Can We Help?</a>

	</div> <!-- end of .container -->
</div> <!-- end of .block .about-->

<?php require get_template_directory() . '/_partials/word-carousel.php'; ?>

<div class="block cases">
	<div class="cases__row cases__row--home">
		<h2 class="block-hed">Our Work<?php // echo esc_html($about_hed); ?></h2>
		<div class="container">

			<!--<div class="cases-intro">
				<h2>Digital</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consequat eros non rutrum egestas. Fusce bibendum augue id metus vestibulum, sed mattis turpis congue. </p>
			</div>-->

			<?php
				$args = array(
					'post_type' => 'case_study',
				  'showposts' => 3,
					'exclude' 	=> [98, 100] // excludes Contract Publishing brands from case studies
					/*'tax_query' => array(
				    array(
				      'taxonomy' => 'platforms',
							'field'		 => 'slug',
							'terms'		 => 'digital',
					) )*/
				);

				$posts = get_posts( $args );
				foreach( $posts as $post ){
					include( '_partials/posts-row.php' );
				}
			?>
		</div> <!-- end of .container -->

		<a class="btn btn-secondary block-cta" href="contempo/case-studies">See More Work</a>

	</div> <!-- end of .cases-row__digital -->
</div> <!-- end of .block .cases -->
<div class="block brands">
	<?php
		// get post object for contract publishing page
		$post = get_post(31);
	?>

	<div class="jumbotron jumbotron__home-brand jumbotron__home-brand--custom section" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'carousel'); ?>)">
		<div class="carousel-caption custom scroll animate-scroll-pop">
			<h2 class="logo"><?php echo get_the_title($post->ID); ?></h2>
			<h3 class><?php the_excerpt($post->ID); ?></h3>
			<a class="btn btn-secondary carousel--btn"  href="<?php the_permalink($post->ID); ?>">See Inside</a>
		</div>
	</div>

	<?php
		$brand_args = array(
			'post_type' => 'brand',
			'showposts' => 2
		);

		$posts = get_posts( $brand_args );
		foreach( $posts as $post ){
			include( '_partials/brands-jumbotron.php' );
		}?>
</div>

<?php
get_footer(); ?>
