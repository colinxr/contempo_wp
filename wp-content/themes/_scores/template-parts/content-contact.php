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
	$hed 						 = get_post_meta( get_the_ID(), '_contact_page-hed', true );
	$dek 						 = get_post_meta( get_the_ID(), '_contact_page-dek', true );
	$pub_name				 = get_post_meta( get_the_ID(), '_contact_pub_name', true );
	$pub_bio				 = get_post_meta( get_the_ID(), '_contact_pub_bio', true );
	//$pub_img				 = get_post_meta( get_the_ID(), '_contact_pub_img', true );
	$pub_email			 = get_post_meta( get_the_ID(), '_contact_pub_email', true );

	$cd_name				 = get_post_meta( get_the_ID(), '_contact_cd_name', true );
	$cd_bio					 = get_post_meta( get_the_ID(), '_contact_cd_bio', true );
	// $cd_img				= get_post_meta( get_the_ID(), '_contact_cd_img', true );
	$cd_email				 = get_post_meta( get_the_ID(), '_contact_cd_email', true );

	$sharp_eic_name  = get_post_meta( get_the_ID(), '_contact_sharp_eic_name', true );
	$sharp_eic_img   = get_post_meta( get_the_ID(), '_contact_sharp_eic_img', true );
	$sharp_eic_email = get_post_meta( get_the_ID(), '_contact_sharp_eic_email', true );

	$smag_eic_name   = get_post_meta( get_the_ID(), '_contact_smag_eic_name', true );
	$smag_eic_img    = get_post_meta( get_the_ID(), '_contact_smag_eic_img', true );
	$smag_eic_email  = get_post_meta( get_the_ID(), '_contact_smag_eic_email', true );

	$art_name  			 = get_post_meta( get_the_ID(), '_contact_art_name', true );
	$art_img   			 = get_post_meta( get_the_ID(), '_contact_art_img', true );
	$art_email 			 = get_post_meta( get_the_ID(), '_contact_art_email', true );

	$company_info 	 = get_post_meta( get_the_ID(), '_contact_address_info', true );
	$sales 	 				 = get_post_meta( get_the_ID(), '_contact_sales', true );
	$editorial 	 		 = get_post_meta( get_the_ID(), '_contact_edit', true );


	?>

<div class="page-head page-head__contract">
	<div class="container inset">

		<h1 class="animate-pop-in"><?php echo esc_html( $hed ); ?></h1>
		<h3 class="animate-pop-in"><?php echo esc_html( $dek ); ?></h3>

	</div>
</div>

<div class="block contact__row">
  <div class="container">

      <div class="card-inline card-contact">
        <div class="card__header">
          <img src="imgs/placeholder.jpg" class="card-contact__img">
        </div>

        <div class="card-inline__info">
          <h3><?php echo esc_html( $sharp_eic_name ); ?></h3>
          <h4>Editor-in-Chief, Sharp Magazine</h4>
          <a href="mailto:<?php echo esc_html( $sharp_eic_email ); ?>">Email Peter</a>
        </div>
      </div>

      <div class="card-inline card-contact">
        <div class="card__header">
          <img src="imgs/placeholder.jpg" class="card-contact__img">
        </div>

        <div class="card-inline__info">
          <h3><?php echo esc_html( $smag_eic_name ); ?></h3>
          <h4>Editor-in-Chief, S/ magazine</h4>
          <a href="mailto:<?php echo esc_html( $smag_eic_email ); ?>">Email Sahar</a>
        </div>
      </div>

      <div class="card-inline card-contact">
        <div class="card__header">
          <img src="imgs/placeholder.jpg" class="card-contact__img">
        </div>

        <div class="card-inline__info">
          <h3><?php echo esc_html( $art_name ); ?></h3>
          <h4>Art Director, Contempo Media</h4>
          <a href="mailto:<?php echo esc_html( $art_email ); ?>">Email Evan</a>
        </div>
      </div>

  </div> <!-- end of .container -->
</div>

<div class="block contact__main michael">
	<div class="container inset">
    <img src="<?php echo get_template_directory_uri() ;?>/assets/imgs/contact/michael-lafave.jpg" class="main-photo michael">

    <div class="main-bio michael">
      <h3><strong><?php echo esc_html( $cd_name ); ?></strong></h3>
      <h3>Editorial and Creative Director</h3>
			<p><?php echo esc_html( $cd_bio ); ?>
      <h4><a href="mailto:<?php echo esc_html( $cd_email ); ?>">Email Michael</a></h4>
    </div>
	</div> <!-- end of .container -->
</div> <!-- end of .block .--info -->

<div class="block contact__main">
	<div class="container inset">
  	<div class="main-bio">
      <h3><strong><?php echo esc_html( $pub_name ); ?></strong></h3>
      <h3>Publisher</h3>
			<p><?php echo esc_html( $pub_bio ); ?>
      <h4><a href="mailto:<?php echo esc_html( $pub_email ); ?>">Email John</a></h4>
    </div>

    <img src="<?php echo get_template_directory_uri() ;?>/assets/imgs/contact/john-mcgouran.jpg" class="main-photo">
	</div> <!-- end of .container -->
</div> <!-- end of .block .--info -->

<div class="block contact-staff">
	<div class="container">

    <div class="contact-col">

      <h3>Contact</h3>

      <?php echo $company_info; ?>

    </div>

		<div class="contact-col">

      <h3>Advertising</h3>

      <?php echo $sales; ?>

		</div>

		<div class="contact-col">

      <h3>Editorial</h3>

      <?php echo $editorial; ?>

		</div>

	</div> <!-- end of .container -->
</div> <!-- end of .block .edit-info -->


<?php get_footer(); ?>
