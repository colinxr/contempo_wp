<?php
  $logo 					= wp_get_attachment_url( get_post_meta( get_the_ID(), '_brand_home_logo_id', 1), array('153', '60') );
  $jumbotron_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'jumbotron' );
  $slug =  $post->post_name;
?>

<div class="jumbotron jumbotron__home-brand jumbotron__home-brand--<?php echo $slug; ?> section" style="background-image: url(<?php echo $jumbotron_img[0]; ?>)">
  <div class="carousel-caption <?php echo $slug; ?> scroll">
    <a href="<?php echo get_permalink($post->ID); ?>"><img src="<?php echo $logo; ?>" class="logo logo__<?php echo $slug; ?>" /></a>
    <h3 class><?php echo $post->post_excerpt; ?></h3>
    <a class="btn btn-secondary carousel--btn"  href="<?php echo get_permalink($post->ID); ?>">See Inside</a>
  </div>
</div>
