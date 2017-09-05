<?php
/**
 * Template part for Brand Custom Post Type
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package contempo
*/


	global $post;
 	$slug 						 = $post->post_name;

	$hed 						   = get_post_meta( get_the_ID(), '_brand_page-hed', true );
	$dek 						   = get_post_meta( get_the_ID(), '_brand_page-dek', true );

	$audience_checkbox = get_post_meta ( get_the_ID(), '_brand_audience_checkbox', true );
	$uniques 				   = get_post_meta( get_the_ID(), '_brand_uniques', true );
	$pageviews 			   = get_post_meta( get_the_ID(), '_brand_pageviews', true );
	$social 				   = get_post_meta( get_the_ID(), '_brand_social-reach', true );
	$facebook 			   = get_post_meta( get_the_ID(), '_brand_facebook', true );
	$instagram 			   = get_post_meta( get_the_ID(), '_brand_instagram', true );
	$print 					   = get_post_meta( get_the_ID(), '_brand_print', true );
	$circulation 		   = get_post_meta( get_the_ID(), '_brand_circulation', true );

	$print_media_kit   = wp_get_attachment_url( get_post_meta( get_the_ID(), '_brand_print_media_kit_id', 1 ) );
	$digital_media_kit = wp_get_attachment_url( get_post_meta( get_the_ID(), '_brand_digital_media_kit_id', true ) );
	$special_media_kit = wp_get_attachment_url( get_post_meta( get_the_ID(), '_brand_special_media_kit_id', true ) );

	$carousel_checkbox = get_post_meta( get_the_ID(), '_brand_carousel_checkbox', true);
	$carousel_desc 		 = get_post_meta( get_the_ID(), '_brand_carousel_desc', true );
	$carousel2_desc 	 = get_post_meta( get_the_ID(), '_brand_carousel2_desc', true );

	$contact_ad_name	 = get_post_meta( get_the_ID(), '_brand_ad_name', true );
	$contact_ad_email	 = get_post_meta( get_the_ID(), '_brand_ad_email', true );
	$contact_ad_phone	 = get_post_meta( get_the_ID(), '_brand_ad_phone', true );
	$contact_ed_name 	 = get_post_meta( get_the_ID(), '_brand_ed_name', true );
	$contact_ed_email  = get_post_meta( get_the_ID(), '_brand_ed_email', true );
	$contact_email  	 = get_post_meta( get_the_ID(), '_brand_email', true );
	$contact_site		   = get_post_meta( get_the_ID(), '_brand_site_url', true );
	$contact_shop		   = get_post_meta( get_the_ID(), '_brand_shop_url', true );

	$logo 						 = wp_get_attachment_url( get_post_meta( get_the_ID(), '_brand_page-logo_id', 1), array('153', '60') );
	$carousel_bg 			 = wp_get_attachment_image( get_post_meta( get_the_ID(), '_brand_carousel_bg_id', 1 ), 'carousel' );
	$carousel_logo 		 = wp_get_attachment_image( get_post_meta( get_the_ID(), '_brand_carousel_logo_id', 1) ,  array('700', '600'), '', array( 'class' => 'logo' ) );
	$carousel2_bg 		 = wp_get_attachment_image( get_post_meta( get_the_ID(), '_brand_carousel2_bg_id', 1 ), 'carousel' );
	$carousel2_logo 	 = wp_get_attachment_image( get_post_meta( get_the_ID(), '_brand_carousel2_logo_id', 1) ,  array('700', '600'), '', array( 'class' => 'logo' ) );
	$contact_cover  	 = wp_get_attachment_image( get_post_meta( get_the_ID(), '_brand_footer_mag_cover_id', 1) ,  array('700', '600'), '', array( 'class' => 'edit-info--logo' ) );

	$jumbotron 			   = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_brand_jumbotron-page_id', 1), 'jumbotron-page' ); //uses attachment_image_src in order to use as inline CSS background-image url on line 66

?>

<div class="page-head page-head__<?php echo esc_html($slug);?>">
	<div class="container inset">

		<img src="<?php echo esc_html($logo); ?>" class="page-logo animate-pop-in"/>
		<h1 class="animate-pop-in"><?php echo esc_html( $hed ); ?></h1>
		<h3 class="animate-pop-in"><?php echo esc_html( $dek ); ?></h3>

	</div>
</div>
<?php if ( $jumbotron ) : ?>
<div class="screen">
	<?php echo '<div class="jumbotron jumbotron__page jumbotron__page--" style="
	background: url(' . $jumbotron[0] . ') top center no-repeat; background-size: cover; ">
	</div>' ;?>
</div>
<?php endif; ?>

<div class="context">
	<div class="container inset">

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'contempo' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
		<?php if ( $audience_checkbox ) : ?>
			<div class="grid box__brand grid__brand-info">
				<?php if ( $uniques ) : ?>
					<div class="box row-one">
						<h3>Monthly Uniques</h3>
						<h2><?php echo esc_html( $uniques ); ?></h2>
					</div>

					<div class="box box__brand row-one">
						<h3>Pageviews</h3>
						<h2><?php echo esc_html( $pageviews); ?></h2>
					</div>
				<?php endif; ?>

				<?php if ( $social ) : ?>
					<div class="box box__brand row-two">
						<h3>Social Reach</h3>
						<h2><?php echo esc_html( $social ); ?></h2>
					</div>

					<div class="box box__brand row-two">
						<h3>Facebook Fans</h3>
						<h2><?php echo esc_html( $facebook ); ?></h2>
					</div>

					<div class="box box__brand row-two">
						<h3>Instagram</h3>
						<h2><?php echo esc_html( $instagram ); ?></h2>
					</div>
				<?php endif; ?>

				<?php if ( $print ) : ?>
					<div class="box box__brand row-three">
						<h3>Print Readership</h3>
						<h2><?php echo esc_html( $print ); ?></h2>
					</div>

					<div class="box box__brand row-three">
						<h3>Circulation</h3>
						<h2><?php echo esc_html( $circulation ); ?></h2>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( $print_media_kit ) : ?>
			<a class="btn btn-secondary" href="<?php echo $print_media_kit; ?>">Download Media Kit</a>
		<?php endif; ?>
		<?php if ( $digital_media_kit ) : ?>
			<a class="btn btn-secondary btn-secondary__brand" href="<?php $digital_media_kit[0]; ?>">Digital Media Kit</a>
		<?php endif; ?>
	</div>
</div>

<div class="jumbotron brand-carousel">
	<div class="brand-slider">
		<div class="brand-col">
			<?php echo $carousel_bg; ?>
				<div class="carousel-content brand_slide_one">
	      	<?php echo $carousel_logo; ?>
	        <h4><?php echo esc_html( $carousel_desc ) ;?></h4>
					<a class="btn btn-secondary carousel--btn" type="submit" id="form-submit" href="<?php echo $special_media_kit; ?>">Download Media Kit</a>
	  	</div>
		</div>

	<?php if ( !$carousel_checkbox ) : // check for multiple carousel slides ?>

		</div> <!-- end of brand-slider -->

		<?php else : ?>
			<div class="brand-col">
				<?php echo $carousel2_bg; ?>
				<div class="carousel-content brand_slide_two">
					<?php echo $carousel2_logo; ?>
					<h4><?php echo esc_html( $carousel2_desc ) ;?></h4>
					<a class="btn btn-secondary carousel--btn" type="submit" id="form-submit" href="#">See Sharp Watch</a>
				</div>
			</div>

		</div> <!-- end of brand-slider -->
	<?php endif; ?>
</div>

<div class="block cases cases--page">
	<div class="cases__row cases__row--page">
		<h2 class="block-hed">Our Work<?php // echo esc_html($about_hed); ?></h2>
		<div class="container scroll">
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

<div class="block edit-info">
	<div class="container">

		<div class="edit-info--col">
    	<ul class="edit-list">
      	<li><strong>Editorial</strong></li>
					<li><?php echo esc_html( $contact_ed_name ) ;?></li>
					<li>Editor-in-Chief</li>
					<li><a href="mailto:<?php echo esc_html( $contact_ed_email ) ;?>">Send Email</a></li>
      </ul>
      <ul class="ad-list">
      	<li><strong>Advertising</strong></li>
				<li><?php echo esc_html( $contact_ad_name );?></li>
				<li>Director of Sales</li>
				<li><?php echo esc_html( $contact_ad_phone);?></li>
				<li><a href="mailto:<?php echo esc_html( $contact_ad_email ); ?>">Send Email</a></li>
      </ul>
		</div>

		<div class="edit-info--col">
      <ul class="contact-list">
        <li><strong>General Inquiries</strong></li>
				<li><a href="mailto:info@contempomedia.com">info@contempomedia.com</a></li>
      </ul>
			<ul class="link-list">
        <li><a href="<?php echo esc_html( $contact_site ); ?>">Visit Site</a></li>
        <li><a href="<?php echo esc_html( $contact_shop); ?>">Order Online</a></li>
				<li><a href="<?php echo $print_media_kit ;?>">Print Media Kit</a></li>
				<li><a href="<?php echo $digital_media_kit ;?>">Digital Media Kit</a></li>
        <li><a href="<?php echo $special_media_kit ;?>">Book For Men Media Kit</a></li>
			</ul>
      <ul class="social-list">
        <li><a href="http://www.facebook.com/sharpformen"><i class="fa fa-facebook"></i></a></li>
        <li><a href="http://www.twitter.com/sharpmagazine"><i class="fa fa-twitter"></i></a></li>
        <li><a href="http://www.instagram.com/sharpmagazine"><i class="fa fa-instagram"></i></a></li>
        <li><a href="http://www.youtube.com/tk-sharp"><i class="fa fa-youtube"></i></a></li>
      </ul>
		</div>

		<div class="edit-info--col">
			<?php echo $contact_cover; ?>
		</div>

	</div>
</div>

</article><!-- #post-## -->
