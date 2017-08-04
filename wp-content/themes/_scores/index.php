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

<div class="jumbotron jumbotron__home">
	<div class="container">

		<div class="jumbotron__hed">
			<h1 class="animate-pop-in">From the aspirational to the affluent</h1>
			<h3 class="animate-pop-in">Contempo Media is speaking the language of Canada's premium and luxury market.</h3>
			<div class="cta animate-pop-in">
		   	<a class="btn btn-secondary__jumbo" href="contract.html" role="button">Contract Publishing</a>
		   	<a class="btn" href="case-studies.html" role="button">See Our Work</a>
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
			<h5>What We Do</h5>
			<h2 class="block-hed">Canada's leading content marketer for the premium & luxury market</h2>
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
				<svg xmlns="http://www.w3.org/2000/svg" width="75" height="68" viewBox="0 0 75 68"><title>  monitor</title><desc>  Created with Sketch.</desc><g style="fill:none;stroke-linejoin:round"><g style="stroke-width:2;stroke:#000"><rect x="1" y="1" width="72.6" height="50.8" rx="2"/><path d="M22.8 66.4L51.8 66.4"/><path d="M37.3 51.8L37.3 66.4"/></g></g></svg>
				<h4>Content</h4>
			</div>

			<div class="service" id="design">
				<svg xmlns="http://www.w3.org/2000/svg" width="72" height="71" viewBox="0 0 72 71"><title>  layers</title><desc>  Created with Sketch.</desc><g style="fill:none;stroke-linejoin:round"><g style="stroke-width:2;stroke:#000"><g transform="translate(-548 -1694)translate(0 906)translate(176 743)translate(280.297556 0)translate(47 0)translate(46 46)"><polygon points="34.5 0 0 17.3 34.5 34.5 69 17.3"/><polyline points="0 51.8 34.5 69 69 51.8"/><polyline points="0 34.5 34.5 51.8 69 34.5"/></g></g></g></svg>
				<h4>Design</h4>
			</div>

			<div class="service" id="mobile">
				<svg xmlns="http://www.w3.org/2000/svg" width="72" height="71" viewBox="0 0 72 71"><title>  message-square</title><desc>  Created with Sketch.</desc><g style="fill:none;stroke-linejoin:round"><g style="stroke-width:2;stroke:#000"><path d="M70.6 47C70.6 51.2 67.2 54.7 62.9 54.7L16.9 54.7 1.6 70 1.6 8.7C1.6 4.4 5 1 9.3 1L62.9 1C67.2 1 70.6 4.4 70.6 8.7L70.6 47Z"/></g></g></svg>
				<h4>Mobile</h4>
			</div>

			<div class="service" id="events">
				<svg xmlns="http://www.w3.org/2000/svg" width="65" height="71" viewBox="0 0 65 71"><title>  calendar</title><desc>  Created with Sketch.</desc><g style="fill:none;stroke-linejoin:round"><g style="stroke-width:2;stroke:#000"><rect x="1.9" y="7.9" width="62.1" height="62.1" rx="2"/><path d="M46.7 1L46.7 14.8"/><path d="M19.1 1L19.1 14.8"/><path d="M1.9 27.6L64 27.6"/></g></g></svg>
				<h4>Events</h4>
			</div>

			<div class="service" id="consumer">
				<svg xmlns="http://www.w3.org/2000/svg" width="87" height="72" viewBox="0 0 87 72"><title>  user-check</title><desc>  Created with Sketch.</desc><g style="fill:none;stroke-linejoin:round"><g style="stroke-width:2;stroke:#000"><g transform="translate(-272 -1971)translate(0 906)translate(176 743)translate(0 280.268861)translate(49 0)translate(48 43)"><path d="M57.5 69L57.5 61.3C57.5 52.9 50.6 46 42.2 46L15.3 46C6.9 46 0 52.9 0 61.3L0 69"/><circle cx="28.8" cy="15.3" r="15.3"/><polyline points="61.3 30.7 69 38.3 84.3 23"/></g></g></g></svg>
				<h4>Consumer</h4>
			</div>

			<div class="service" id="pr">
				<svg width="69px" height="68px" viewBox="0 0 69 68" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<!-- Generator: Sketch 43.2 (39069) - http://www.bohemiancoding.com/sketch -->
			    <title>at-sign</title>
			    <desc>Created with Sketch.</desc>
			    <defs></defs>
			    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
				    <g id="Homepage" transform="translate(-552.000000, -1975.000000)" stroke="#000000" stroke-width="2">
							<g id="Who-We-Are" transform="translate(0.000000, 906.000000)">
								<g id="Services" transform="translate(176.000000, 743.000000)">
									<g id="PR" transform="translate(280.297556, 280.268861)">
										<g id="at-sign" transform="translate(94.000000, 47.000000)">
											<circle id="Oval" cx="36.1428571" cy="32.8571429" r="13.1428571"></circle>
											<path d="M49.2857143,32.8571429 L49.2857143,36.1428571 C49.2857143,41.5868068 53.6989075,46 59.1428571,46 C64.5868068,46 69,41.5868068 69,36.1428571 L69,32.8571429 C68.9990385,17.588115 58.4795846,4.33193276 43.610098,0.86183471 C28.7406114,-2.60826334 13.4401538,4.62231582 6.68069804,18.3136624 C-0.0787576861,32.0050089 3.48433781,48.5485765 15.2806355,58.24345 C27.0769332,67.9383236 43.9973534,68.2292832 56.12,58.9457143" id="Shape"></path>
										</g>
									</g>
								</g>
	 						</g>
						</g>
					</g>
				</svg>
				<h4>PR</h4>
			</div>

			<div class="service" id="social">
				<svg xmlns="http://www.w3.org/2000/svg" width="71" height="72" viewBox="0 0 71 72"><title>  thumbs-up</title><desc>  Created with Sketch.</desc><g style="fill:none;stroke-linejoin:round"><g style="stroke-width:2;stroke:#000"><path d="M43 25.4L43 11.6C43 5.9 38.4 1.3 32.6 1.3L18.8 32.3 18.8 70.3 57.8 70.3C61.2 70.3 64.1 67.8 64.7 64.4L69.4 33.4C69.7 31.4 69.1 29.3 67.8 27.8 66.5 26.3 64.5 25.4 62.5 25.4L43 25.4ZM18.8 70.3L8.5 70.3C4.7 70.3 1.6 67.2 1.6 63.4L1.6 39.2C1.6 35.4 4.7 32.3 8.5 32.3L18.8 32.3 18.8 70.3Z"/></g></g></svg>
				<h4>Social</h4>
			</div>

			<div class="service" id="production">
				<svg xmlns="http://www.w3.org/2000/svg" width="57" height="71" viewBox="0 0 57 71"><title>  clipboard</title><desc>  Created with Sketch.</desc><g style="fill:none;stroke-linejoin:round"><g style="stroke-width:2;stroke:#000"><path d="M42.4 8.3L49.1 8.3C52.9 8.3 55.9 11.3 55.9 15.1L55.9 62.7C55.9 66.4 52.9 69.5 49.1 69.5L8.6 69.5C4.9 69.5 1.9 66.4 1.9 62.7L1.9 15.1C1.9 11.3 4.9 8.3 8.6 8.3L15.4 8.3"/><rect x="14.9" y="1.3" width="27" height="13.6" rx="1"/></g></g></svg>
				<h4>Production</h4>
			</div>
		</div>

		<a class="btn btn-secondary block-cta" href="#form">How Can We Help?</a>

	</div> <!-- end of .container -->
</div> <!-- end of .block .about-->

<?php require get_template_directory() . '/_partials/client-carousel.php'; ?>

<div class="block cases">
	<div class="cases__row cases__row--digital">
		<div class="container">

			<div class="cases-intro">
				<h2>Digital</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consequat eros non rutrum egestas. Fusce bibendum augue id metus vestibulum, sed mattis turpis congue. </p>
			</div>

			<?php
				$args = array(
					'post_type' => 'case_study',
				  'showposts' => 3,
					'cat' 			=> 'digital'
				);

				$posts = get_posts( $args );
				foreach( $posts as $post ){
					include( '_partials/posts-row.php' );
				}
			?>

		</div> <!-- end of .container -->
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
			'post_type' => 'brands'
			);

		$brands = get_posts( $brand_args );

		foreach( $brands as $brand ){
			include( '_partials/brands-jumbotron.php' );
		}
	?>
</div>

<?php
get_footer(); ?>
