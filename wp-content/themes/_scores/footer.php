<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package contempo
 */

?>

<div class="block contact">
	<div class="container">

		<h2 class="block-hed">How Can We Help?</h2>

		<form role="form" id="contactForm" data-toggle="validator">
			<div class="form-group">
				<input type="text" class="form-control" id="formFirstName" placeholder="First Name" Required>
				<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
				<input type="text" class="form-control" id="formLastName" placeholder="Last Name" Required>
				<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
				<input type="text" class="form-control" id="formEmail" placeholder="Email" Required>
				<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
				<input type="text" class="form-control" id="formTitle2" placeholder="Title">
				<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
				<input type="text" class="form-control" id="formCompany" placeholder="Company" Required>
				<div class="help-block with-errors"></div>
			</div>

			<div class="form-group">
				<textarea rows="4" cols="50" class="form-control" id="formMessage" placeholder="Message"></textarea>
			</div>

			<a class="btn btn-secondary contact--btn" type="submit" id="form-submit" href="#">Submit</a>
			<div class="h3 text-center hidden" id="msgSubmit"></div>

		</form>

	</div> <!-- end of .container -->
</div> <!-- end of .block .contact -->


<footer class="block footer">
	<div class="container">

			<div class="footer-col">
				<strong>Navigation</strong>
				<?php wp_nav_menu( array(
					'menu' => 'footer-nav',
					'menu_class' => 'footer-ul',
					'theme_location' => 'footer-nav' ) ); ?>
			</div>

			<div class="footer-col">
				<strong>Our Brands</strong>
				<?php wp_nav_menu( array(
					'menu' => 'footer-brands',
					'menu_class' => 'footer-ul',
					'theme_location' => 'footer-brands' ) ); ?>
			</div>

			<div class="footer-col">
				<strong>Contact</strong>
				<ul class="footer-ul">
					<li>info@contempomedia.com</li>
					<li>111 - 372 Richmond St</br>
						Toronto, ON</br>
						M5V 1X6</li>
					<li>(416) 591-0093</li>
				</ul>
			</div>
		<div class="footer-col footerleft ">
			<div class="footer__brand">
				<svg class="icon contempo-media_white footer--brand__logo"><use xlink:href="#contempo-media_white"></use></svg>
			</div>
		</div>

	</div> <!-- end of .container -->
</footer> <!-- end of .block .brands -->

<?php wp_footer(); ?>

</body>
</html>
