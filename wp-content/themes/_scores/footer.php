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

		<section>

			<h2 class="block-hed">How Can We Help?</h2>


			<form role="form" id="contactForm" data-toggle="validator">
				<div class="form-group">
					<label for="formFirstName">First Name</label>
					<input type="text" class="form-control" id="formFirstName" placeholder="First Name" Required>
					<div class="help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label for="formLastName">Last Name</label>
					<input type="text" class="form-control" id="formLastName" placeholder="Last Name" Required>
					<div class="help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label for="formEmail">Email</label>
					<input type="text" class="form-control" id="formEmail" placeholder="Email" Required>
					<div class="help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label for="formTitle">Title</label>
					<input type="text" class="form-control" id="formTitle2" placeholder="Title">
					<div class="help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label for="formCompany">Company</label>
					<input type="text" class="form-control" id="formCompany" placeholder="Company" Required>
					<div class="help-block with-errors"></div>
				</div>

				<div class="form-group">
					<label for="formMessage">Message</label>
					<input type="text" class="form-control" id="formMessage" placeholder="Message">
				</div>

				<section>

					<a class="btn btn-secondary contact--btn" type="submit" id="form-submit" href="#">Submit</a>
					<div class="h3 text-center hidden" id="msgSubmit"></div>

				</section> <!-- end of section -->

			</form>

		</section> <!-- end of section -->



	</div> <!-- end of .container -->

</div> <!-- end of .block .contact -->


<footer class="block">

	<div class="container">

		<section>

			<div class="footer-col paddingtop-bottom">

				<ul class="footer-ul">

					<li><strong>Navigation</strong></li>
					<li><a href="#">Brands</a></li>
					<li><a href="#">Content Solutions</a></li>
					<li><a href="#">Case Studies</a></li>
					<li><a href="#">Press</a></li>
					<li><a href="#">Contact</a></li>

				</ul>

			</div>

			<div class="footer-col paddingtop-bottom">

				<ul class="footer-ul">

					<li><strong>Our Brands</strong></li>
					<li><a href="#">Sharp</a></li>
					<li><a href="#">S/ magazine</a></li>

				</ul>

			</div>

			<div class="footer-col paddingtop-bottom">

				<ul class="footer-ul">

					<li><strong>Contact</strong></li>
					<li>info@contempomedia.com</li>
					<li>111 - 372 Richmond St</br>
						Toronto, ON</br>
						M5V 1X6</li>
					<li>(416) 591-0093</li>

				</ul>

			</div>

		<div class="footer-col footerleft ">

			<div class="footer--brand">
				<img src="imgs/contempo-media_white.svg" class="footer--brand__logo">
			</div>

		</div>

		</section <!-- end of row -->

	</div> <!-- end of .container -->

</footer> <!-- end of .block .brands -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/source/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/source/vendor/validator.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
