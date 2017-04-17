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



<div class="jumbotron">

	<div class="container">

		<div class="jumbotron--hed">

			<h1 class="animate-pop-in">From the aspirational to the affluent</h1>

			<h3 class="animate-pop-in">Contempo Media is speaking the language of Canada's premium and luxury market.</h3>

			<div class="cta animate-pop-in">

		   	<a class="btn btn-secondary__jumbo" href="#" role="button">Contract Publishing</a>
		   	<a class="btn" href="#" role="button">See Our Work</a>

		  </div>

		</div>

  	</div>

  	<div class="arrow bounce">
  		<i class="fa fa-arrow-down fa-2x" href="#"></i>
	</div>

</div>

<div class="block clients">

	<div class="container">

		<section>

			<h2 class="block-hed">We work with the biggest brands in luxury.</h2>

		</section>

		<section>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/LVMH.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/coach.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/gucci.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/chanel.png" class="clients--logo">
			</div>

		</section>

		<section>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/Audi.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/bacardi.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/burberry.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/thomas-sabo.png" class="clients--logo">
			</div>

		</section>

		<section>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/glenfiddich.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/tiger-of-sweden.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/givenchy.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/cadillac.png" class="clients--logo">
			</div>

		</section>

		<section>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/breitling.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/Berluti.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/emporio-armani.png" class="clients--logo">
			</div>

			 <div class="col-sm-3 col-xs-6 clients--brand">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/clients/grey/600/patek-philippe.png" class="clients--logo">
			</div>

			<!-- <div class="col-sm-2 clients--brand">
				<img src="imgs/clients/grey/600/Tiffany_Co.png" class="clients--logo">
			</div> -->

		</section>

		<!-- <section>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="imgs/clients/grey/600/Audi.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="imgs/clients/grey/600/bacardi.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="imgs/clients/grey/600/burberry.png" class="clients--logo">
			</div>

			<div class="col-sm-3 col-xs-6 clients--brand">
				<img src="imgs/clients/grey/600/thomas-sabo.png" class="clients--logo">
			</div>

		</section>-->

	</div>

</div> <!-- end of .clients block -->

<div class="block about">

	<div class="container">

		<section>

			<div class="about--hed scroll">
				<h5>What We Do</h5>

				<h2>Canada's leading content marketer for the premium & luxury market.</h2>

			</div>

			<div class="about--copy scroll">

				<div class="about--wrapper">

					<div class="about--copy__item">
						<strong>Consumer</strong>
						<p>Our award-winning writers, designers & videographers are continually crafting the ultimate in sophistication and luxury, for the country’s fastest growing lifestyle brands. </p>
					</div>

					<div class="about--copy__item">
						<strong>Custom Content</strong>
						<p>Our custom content publications help brands speak directly to their loyal and engaged audiences. We craft bespoke premium solutions for their custom content needs.</p>
					</div>

					<div class="about--copy__item">
						<strong>Event Management</strong>
						<p>We’re crafting exclusive parties and events for Toronto’s most premium audiences. Activate your brand for 1000s of engaged visitors.</p>
					</div>

				</div>

			</div>

		</section> <!-- end of .row -->

		<section class="services scroll">

			<div class="services--row">

				<div class="service" id="content">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/services/content.png">
					<h6>Content</h6>
				</div>

				<div class="service" id="design">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/services/design.png">
					<h6>Design</h6>
				</div>

				<div class="service" id="mobile">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/services/mobile.png">
					<h6>Mobile</h6>
				</div>

				<div class="service" id="events">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/services/events.png">
					<h6>Events</h6>
				</div>

			</div>

			<div class="services--row">

				<div class="service" id="consumer">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/services/consumer.png">
					<h6>Consumer</h6>
				</div>

				<div class="service" id="pr">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/services/pr.png">
					<h6>PR</h6>
				</div>

				<div class="service" id="social">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/services/social.png">
					<h6>Social</h6>
				</div>

				<div class="service" id="production">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/imgs/services/production.png">
					<h6>Production</h6>
				</div>

			</div>

			<section>

				<a class="btn btn-secondary block-cta" href="#form">How Can We Help?</a>

			</section>

		</section><!-- end of .row -->

	</div> <!-- end of .container -->

</div> <!-- end of .block .about-->

<?php require get_template_directory() . '/inc/case-studies.php'; ?>


<?php
get_footer();
